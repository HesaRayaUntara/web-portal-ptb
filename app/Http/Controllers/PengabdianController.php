<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function create(Dosen $dosen)
    {
        $data = [
            'dosen' => $dosen->orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.pengabdian.create', $data);
    }

    public function edit(Pengabdian $pengabdian, Dosen $dosen)
    {
        $data = [
            'pengabdian' => $pengabdian,
            'dosen' => $dosen->orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.pengabdian.edit', $data);
    }

    public function store(Request $request, Pengabdian $pengabdian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id',
            'judul_pengabdian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if (Pengabdian::create($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan pengabdian masyarakat.');
    }

    public function update(Request $request, Pengabdian $pengabdian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id',
            'judul_pengabdian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($pengabdian->update($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui pengabdian masyarakat.');
    }

    public function destroy(Pengabdian $pengabdian)
    {
        if ($pengabdian->delete()) {
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus pengabdian masyarakat.');
    }
}

