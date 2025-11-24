<?php

namespace App\Http\Controllers;

use App\Models\JenisKarya;
use Illuminate\Http\Request;

class JenisKaryaController extends Controller
{
    public function create()
    {
        return view('halaman-admin.dosen.jenis-karya.create');
    }

    public function edit(JenisKarya $jenisKarya)
    {
        return view('halaman-admin.dosen.jenis-karya.edit', compact('jenisKarya'));
    }

    public function store(Request $request, JenisKarya $jenisKarya)
    {
        $data = $request->validate([
            'j_karya' => 'required|string|max:255',
        ]);

        if (JenisKarya::create($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan jenis karya.');
    }

    public function update(Request $request, JenisKarya $jenisKarya)
    {
        $data = $request->validate([
            'j_karya' => 'required|string|max:255',
        ]);

        if ($jenisKarya->update($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui jenis karya.');
    }

    public function destroy(JenisKarya $jenisKarya)
    {
        if ($jenisKarya->delete()) {
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus jenis karya.');
    }
}

