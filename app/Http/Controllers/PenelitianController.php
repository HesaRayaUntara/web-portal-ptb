<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function create()
    {
        $data = [
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.penelitian.create', $data);
    }

    public function edit(Penelitian $penelitian)
    {
        $data = [
            'penelitian' => $penelitian,
            'dosen' => Dosen::orderBy('nama', 'asc')->get(),
        ];
        return view('halaman-admin.dosen.penelitian.edit', $data);
    }

    public function store(Request $request, Penelitian $penelitian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_penelitian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($penelitian = Penelitian::create($data)) {
            $this->logActivity('menambah data penelitian', 'Penelitian: ' . $data['judul_penelitian']);
            return redirect()->route('admin.dosen.index')->with('success', 'Penelitian berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan penelitian.');
    }

    public function update(Request $request, Penelitian $penelitian)
    {
        $data = $request->validate([
            'dosen_id' => 'nullable|exists:dosen,id_dosen',
            'judul_penelitian' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        if ($penelitian->update($data)) {
            $this->logActivity('mengedit data penelitian', 'Penelitian: ' . $data['judul_penelitian']);
            return redirect()->route('admin.dosen.index')->with('success', 'Penelitian berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui penelitian.');
    }

    public function destroy(Penelitian $penelitian)
    {
        $judulPenelitian = $penelitian->judul_penelitian;
        if ($penelitian->delete()) {
            $this->logActivity('menghapus data penelitian', 'Penelitian: ' . $judulPenelitian);
            return redirect()->route('admin.dosen.index')->with('success', 'Penelitian berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus penelitian.');
    }
}

