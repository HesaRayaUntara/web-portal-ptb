<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\LogActivity;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (session('is_admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('halaman-admin.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cari admin berdasarkan username dari database
        $admin = Admin::where('username', $credentials['username'])->first();

        // Validasi username dan password
        if (! $admin || ! Hash::check($credentials['password'], $admin->password)) {
            return back()
                ->withErrors(['username' => 'Username atau password salah.'])
                ->withInput($request->except('password'));
        }

        Session::put('is_admin', true);
        Session::put('admin_id', $admin->id);

        // Log aktivitas login
        LogActivity::create([
            'nama_admin' => $admin->username,
            'aktivitas' => $admin->username . ' melakukan login',
            'data_yang_diubah' => null,
            'waktu' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Selamat datang kembali!');
    }

    public function showRegisterForm()
    {
        // Hanya bisa diakses jika sudah login sebagai admin
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        return view('halaman-admin.admin-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:255', 'unique:auth,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 4 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Buat admin baru (password akan di-hash otomatis oleh mutator)
        $newAdmin = Admin::create([
            'username' => $validated['username'],
            'password' => $validated['password'],
        ]);

        // Log aktivitas tambah admin
        $currentAdmin = Admin::find(session('admin_id'));
        if ($currentAdmin) {
            LogActivity::create([
                'nama_admin' => $currentAdmin->username,
                'aktivitas' => $currentAdmin->username . ' menambah data admin',
                'data_yang_diubah' => 'Admin: ' . $validated['username'],
                'waktu' => now(),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('status', 'Admin baru berhasil ditambahkan!');
    }

    public function showEditForm($id)
    {
        // Hanya bisa diakses jika sudah login sebagai admin
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        $admin = Admin::findOrFail($id);
        
        return view('halaman-admin.admin-edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:255', 'unique:auth,username,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 4 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $oldUsername = $admin->username;
        
        // Update username
        $admin->username = $validated['username'];

        // Update password jika diisi
        if (!empty($validated['password'])) {
            $admin->password = $validated['password']; // Akan di-hash oleh mutator
        }

        $admin->save();

        // Log aktivitas edit admin
        $currentAdmin = Admin::find(session('admin_id'));
        if ($currentAdmin) {
            $dataChanged = 'Username: ' . $oldUsername . ' → ' . $validated['username'];
            if (!empty($validated['password'])) {
                $dataChanged .= ', Password diubah';
            }
            
            LogActivity::create([
                'nama_admin' => $currentAdmin->username,
                'aktivitas' => $currentAdmin->username . ' mengedit data admin',
                'data_yang_diubah' => $dataChanged,
                'waktu' => now(),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('status', 'Admin berhasil diperbarui!');
    }

    public function logout()
    {
        // Log aktivitas logout sebelum session dihapus
        $adminId = session('admin_id');
        if ($adminId) {
            $admin = Admin::find($adminId);
            if ($admin) {
                LogActivity::create([
                    'nama_admin' => $admin->username,
                    'aktivitas' => $admin->username . ' melakukan logout',
                    'data_yang_diubah' => null,
                    'waktu' => now(),
                ]);
            }
        }

        Session::forget('is_admin');
        Session::forget('admin_id');

        return redirect()->route('admin.login')->with('status', 'Anda telah logout.');
    }

    public function getLogActivities()
    {
        $logs = LogActivity::orderBy('waktu', 'desc')
            ->limit(50)
            ->get()
            ->map(function ($log) {
                return [
                    'aktivitas' => $log->aktivitas,
                    'waktu' => $log->waktu,
                ];
            });

        return response()->json($logs);
    }
}

