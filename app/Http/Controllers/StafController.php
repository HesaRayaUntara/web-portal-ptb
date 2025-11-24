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
    public function store(Request $request, Staf $staf)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:staf,nama',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'nama.unique' => 'Nama staf sudah ada dalam database.',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('staf', $filename, 'public');
            $data['foto'] = $path;
        }

        if (Staf::create($data)) {
            return redirect()->route('admin.staf.index')->with('success', 'Staf berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan staf.');
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
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:staf,nama,' . $staf->id_staf . ',id_staf',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'nama.unique' => 'Nama staf sudah ada dalam database.',
        ]);

        if ($request->hasFile('foto')) {
            if ($staf->foto && Storage::disk('public')->exists($staf->foto)) {
                Storage::disk('public')->delete($staf->foto);
            }
            
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('staf', $filename, 'public');
            $data['foto'] = $path;
        } else {
            $data['foto'] = $staf->foto;
        }

        if ($staf->update($data)) {
            return redirect()->route('admin.staf.index')->with('success', 'Staf berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui staf.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staf $staf)
    {
        if ($staf->foto && Storage::disk('public')->exists($staf->foto)) {
            Storage::disk('public')->delete($staf->foto);
        }
        
        if ($staf->delete()) {
            return redirect()->route('admin.staf.index')->with('success', 'Staf berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus staf.');
    }
}
