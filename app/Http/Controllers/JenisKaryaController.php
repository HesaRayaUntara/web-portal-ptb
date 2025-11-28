<?php

namespace App\Http\Controllers;

use App\Models\JenisKarya;
use Illuminate\Http\Request;

class JenisKaryaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'j_karya' => 'required|string|max:255',
        ]);

        if ($jenisKarya = JenisKarya::create($data)) {
            $this->logActivity('menambah data jenis karya', 'Jenis Karya: ' . $data['j_karya']);
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan jenis karya.');
    }

    public function destroy(JenisKarya $jenisKarya)
    {
        $namaJenisKarya = $jenisKarya->j_karya;
        if ($jenisKarya->delete()) {
            $this->logActivity('menghapus data jenis karya', 'Jenis Karya: ' . $namaJenisKarya);
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus jenis karya.');
    }
}

