<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JenisKarya;
use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function create()
    {
        $data = [
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
            'jenisKarya' => JenisKarya::orderBy('j_karya', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.publikasi.create', $data);
    }

    public function edit(Publikasi $publikasi)
    {
        $data = [
            'publikasi' => $publikasi,
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
            'jenisKarya' => JenisKarya::orderBy('j_karya', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.publikasi.edit', $data);
    }

    public function store(Request $request, Publikasi $publikasi)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_karya' => 'required|string|max:255',
            'jenis_karya' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($publikasi = Publikasi::create($data)) {
            $this->logActivity('menambah data publikasi karya', 'Publikasi: ' . $data['judul_karya']);
            return redirect()->route('admin.dosen.index')->with('success', 'Publikasi karya berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan publikasi karya.');
    }

    public function update(Request $request, Publikasi $publikasi)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_karya' => 'required|string|max:255',
            'jenis_karya' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($publikasi->update($data)) {
            $this->logActivity('mengedit data publikasi karya', 'Publikasi: ' . $data['judul_karya']);
            return redirect()->route('admin.dosen.index')->with('success', 'Publikasi karya berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui publikasi karya.');
    }

    public function destroy(Publikasi $publikasi)
    {
        $judulPublikasi = $publikasi->judul_karya;
        if ($publikasi->delete()) {
            $this->logActivity('menghapus data publikasi karya', 'Publikasi: ' . $judulPublikasi);
            return redirect()->route('admin.dosen.index')->with('success', 'Publikasi karya berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus publikasi karya.');
    }
}

