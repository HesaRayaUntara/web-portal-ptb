<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of admins.
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->get();
        return response()->json($admins);
    }

    /**
     * Store a newly created admin.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => ['required', 'string', 'min:3', 'max:255', 'unique:auth,username'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ], [
                'username.required' => 'Username wajib diisi.',
                'username.min' => 'Username minimal 3 karakter.',
                'username.unique' => 'Username sudah digunakan.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);

            // Buat admin baru (password akan di-hash otomatis oleh mutator)
            $admin = Admin::create([
                'username' => $validated['username'],
                'password' => $validated['password'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Admin berhasil ditambahkan.',
                'admin' => $admin
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update the specified admin.
     */
    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::findOrFail($id);

            $validated = $request->validate([
                'username' => ['required', 'string', 'min:3', 'max:255', 'unique:auth,username,' . $id],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            ], [
                'username.required' => 'Username wajib diisi.',
                'username.min' => 'Username minimal 3 karakter.',
                'username.unique' => 'Username sudah digunakan.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);

            // Update username
            $admin->username = $validated['username'];

            // Update password jika diisi
            if (!empty($validated['password'])) {
                // Bypass mutator dengan update langsung ke database
                DB::table('auth')
                    ->where('id', $admin->id)
                    ->update(['password' => Hash::make($validated['password'])]);
            }

            $admin->save();

            return response()->json([
                'success' => true,
                'message' => 'Admin berhasil diperbarui.',
                'admin' => $admin->fresh()
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified admin.
     */
    public function destroy($id)
    {
        // Cegah menghapus admin yang sedang login
        if ($id == session('admin_id')) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat menghapus akun yang sedang digunakan.'
            ], 422);
        }

        $admin = Admin::findOrFail($id);
        $deletedUsername = $admin->username;
        
        $admin->delete();

        // Log aktivitas hapus admin
        $currentAdminId = session('admin_id');
        if ($currentAdminId) {
            $currentAdmin = Admin::find($currentAdminId);
            if ($currentAdmin) {
                LogActivity::create([
                    'nama_admin' => $currentAdmin->username,
                    'aktivitas' => $currentAdmin->username . ' menghapus data admin',
                    'data_yang_diubah' => 'Admin: ' . $deletedUsername,
                    'waktu' => now(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dihapus.'
        ]);
    }
}

