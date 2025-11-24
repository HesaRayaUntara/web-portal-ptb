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

        if (JenisKarya::create($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan jenis karya.');
    }

    public function destroy(JenisKarya $jenisKarya)
    {
        if ($jenisKarya->delete()) {
            return redirect()->route('admin.dosen.index')->with('success', 'Jenis karya berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus jenis karya.');
    }
}

