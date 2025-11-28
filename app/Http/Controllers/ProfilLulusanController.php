<?php

namespace App\Http\Controllers;

use App\Models\ProfilLulusan;
use App\Models\ProfilProdi;
use Illuminate\Http\Request;

class ProfilLulusanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profilProdi = ProfilProdi::first();
        if (!$profilProdi) {
            return redirect()->route('admin.profil.index')->with('error', 'Harap buat profil program studi terlebih dahulu.');
        }
        
        return view('halaman-admin.profil-lulusan.create', compact('profilProdi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profilProdi = ProfilProdi::first();
        if (!$profilProdi) {
            return redirect()->route('admin.profil.index')->with('error', 'Harap buat profil program studi terlebih dahulu.');
        }

        $data = $request->validate([
            'peran' => 'required|string|max:255',
            'deskripsi_kemampuan' => 'required|string',
        ]);

        $data['profil_prodi_id'] = $profilProdi->id_profil_prodi;

        $profilLulusan = ProfilLulusan::create($data);

        if ($profilLulusan) {
            $this->logActivity('menambah data profil lulusan', 'Profil Lulusan: ' . $data['peran']);
            return redirect()->route('admin.profil.index')->with('success', 'Profil Lulusan berhasil dibuat.');
        }

        return back()->withInput()->with('error', 'Gagal membuat profil lulusan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilLulusan $profilLulusan)
    {
        $profilLulusan->load('profilProdi');
        return view('halaman-admin.profil-lulusan.edit', compact('profilLulusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilLulusan $profilLulusan)
    {
        $data = $request->validate([
            'peran' => 'required|string|max:255',
            'deskripsi_kemampuan' => 'required|string',
        ]);

        if ($profilLulusan->update($data)) {
            $this->logActivity('mengedit data profil lulusan', 'Profil Lulusan: ' . $data['peran']);
            return redirect()->route('admin.profil.index')->with('success', 'Profil Lulusan berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui profil lulusan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilLulusan $profilLulusan)
    {
        $peranLulusan = $profilLulusan->peran;
        if ($profilLulusan->delete()) {
            $this->logActivity('menghapus data profil lulusan', 'Profil Lulusan: ' . $peranLulusan);
            return redirect()->route('admin.profil.index')->with('success', 'Profil Lulusan berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus profil lulusan.');
    }
}

