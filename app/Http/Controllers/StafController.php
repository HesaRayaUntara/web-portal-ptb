<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staf = Staf::orderBy('created_at', 'asc')->get();
        return view('halaman-admin.staf.index', compact('staf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman-admin.staf.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:staf,nama',
                'jabatan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            ], [
                'nama.unique' => 'Nama staf sudah ada dalam database.',
            ]);

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('staf', $filename, 'public');
                $validated['foto'] = $path;
            }

            Staf::create($validated);

            return redirect()->route('admin.staf.index')
                ->with('success', 'Staf berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan staf: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staf $staf)
    {
        return view('halaman-admin.staf.edit', compact('staf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staf $staf)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:staf,nama,' . $staf->id,
                'jabatan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            ], [
                'nama.unique' => 'Nama staf sudah ada dalam database.',
            ]);

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Delete old foto
                if ($staf->foto && Storage::disk('public')->exists($staf->foto)) {
                    Storage::disk('public')->delete($staf->foto);
                }
                
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('staf', $filename, 'public');
                $validated['foto'] = $path;
            } else {
                // Keep existing foto if no new file uploaded
                $validated['foto'] = $staf->foto;
            }

            $staf->update($validated);

            return redirect()->route('admin.staf.index')
                ->with('success', 'Staf berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui staf: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staf $staf)
    {
        try {
            // Delete foto
            if ($staf->foto && Storage::disk('public')->exists($staf->foto)) {
                Storage::disk('public')->delete($staf->foto);
            }
            
            $staf->delete();

            return redirect()->route('admin.staf.index')
                ->with('success', 'Staf berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus staf: ' . $e->getMessage());
        }
    }
}
