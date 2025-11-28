<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function create()
    {
        $data = [
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.pengabdian.create', $data);
    }

    public function edit(Pengabdian $pengabdian)
    {
        $data = [
            'pengabdian' => $pengabdian,
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.pengabdian.edit', $data);
    }

    public function store(Request $request, Pengabdian $pengabdian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_pengabdian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($pengabdian = Pengabdian::create($data)) {
            $this->logActivity('menambah data pengabdian masyarakat', 'Pengabdian: ' . $data['judul_pengabdian']);
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan pengabdian masyarakat.');
    }

    public function update(Request $request, Pengabdian $pengabdian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_pengabdian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($pengabdian->update($data)) {
            $this->logActivity('mengedit data pengabdian masyarakat', 'Pengabdian: ' . $data['judul_pengabdian']);
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui pengabdian masyarakat.');
    }

    public function destroy(Pengabdian $pengabdian)
    {
        $judulPengabdian = $pengabdian->judul_pengabdian;
        if ($pengabdian->delete()) {
            $this->logActivity('menghapus data pengabdian masyarakat', 'Pengabdian: ' . $judulPengabdian);
            return redirect()->route('admin.dosen.index')->with('success', 'Pengabdian masyarakat berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus pengabdian masyarakat.');
    }
}

