<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Hki;
use App\Models\JenisKarya;
use Illuminate\Http\Request;

class HkiController extends Controller
{
    public function create(Dosen $dosen, JenisKarya $jenisKarya)
    {
        $data = [
            'dosen' => $dosen->orderBy('nama', 'asc')->get(),
            'jenisKarya' => $jenisKarya->orderBy('j_karya', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.hki.create', $data);
    }

    public function edit(Hki $hki, Dosen $dosen, JenisKarya $jenisKarya)
    {
        $data = [
            'hki' => $hki,
            'dosen' => $dosen->orderBy('nama', 'asc')->get(),
            'jenisKarya' => $jenisKarya->orderBy('j_karya', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.hki.edit', $data);
    }

    public function store(Request $request, Hki $hki)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id',
            'judul_karya' => 'required|string|max:255',
            'jenis_karya' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if (Hki::create($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'HKI/Paten berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan HKI/Paten.');
    }

    public function update(Request $request, Hki $hki)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id',
            'judul_karya' => 'required|string|max:255',
            'jenis_karya' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($hki->update($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'HKI/Paten berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui HKI/Paten.');
    }

    public function destroy(Hki $hki)
    {
        if ($hki->delete()) {
            return redirect()->route('admin.dosen.index')->with('success', 'HKI/Paten berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus HKI/Paten.');
    }
}

