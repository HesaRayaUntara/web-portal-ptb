<?php

namespace App\Http\Controllers;

use App\Models\ProfilProdi;
use App\Models\ProfilLulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilProdi = ProfilProdi::first();
        $profilLulusan = ProfilLulusan::orderBy('created_at', 'desc')->get();
        $mitra = \App\Models\Mitra::orderBy('created_at', 'desc')->get();
        return view('halaman-admin.profil.index', compact('profilProdi', 'profilLulusan', 'mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingProfil = ProfilProdi::first();
        if ($existingProfil) {
            return redirect()->route('admin.profil.edit', $existingProfil)->with('error', 'Profil Program Studi sudah ada. Hanya boleh ada 1 data profil prodi.');
        }
        
        return view('halaman-admin.profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingProfil = ProfilProdi::first();
        if ($existingProfil) {
            return redirect()->route('admin.profil.edit', $existingProfil)->with('error', 'Profil Program Studi sudah ada. Hanya boleh ada 1 data profil prodi.');
        }

        $data = $request->validate([
            'deskripsi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'tujuan' => 'required|string',
            'lama_studi' => 'required|string|max:255',
            'gelar_lulusan' => 'required|string|max:255',
            'kepanjangan_gelar' => 'required|string|max:255',
            'snbp_pelamar' => 'required|integer|min:0',
            'snbp_diterima' => 'required|integer|min:1',
            'snbt_pelamar' => 'required|integer|min:0',
            'snbt_diterima' => 'required|integer|min:1',
            'akreditasi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'foto_akreditasi' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'industri_tempat_bekerja' => 'required|string',
            'mitra_logo' => 'nullable|array',
            'mitra_logo.*' => 'image|mimes:jpeg,jpg,png|max:5120',
        ]);

        if (isset($data['snbp_pelamar']) && isset($data['snbp_diterima']) && $data['snbp_diterima'] > 0) {
            $data['snbp_keketatan'] = round($data['snbp_pelamar'] / $data['snbp_diterima'], 2);
        } else {
            $data['snbp_keketatan'] = 0.00;
        }

        if (isset($data['snbt_pelamar']) && isset($data['snbt_diterima']) && $data['snbt_diterima'] > 0) {
            $data['snbt_keketatan'] = round($data['snbt_pelamar'] / $data['snbt_diterima'], 2);
        } else {
            $data['snbt_keketatan'] = 0.00;
        }

        if ($request->hasFile('foto_akreditasi')) {
            $file = $request->file('foto_akreditasi');
            $filename = 'akreditasi_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profil-prodi', $filename, 'public');
            $data['foto_akreditasi'] = $path;
        }

        $profilProdi = ProfilProdi::create($data);

        if ($profilProdi) {
            return redirect()->route('admin.profil.index')->with('success', 'Profil Program Studi berhasil dibuat.');
        }

        return back()->withInput()->with('error', 'Gagal membuat profil program studi.');
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
    public function edit(ProfilProdi $profilProdi)
    {
        return view('halaman-admin.profil.edit', compact('profilProdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilProdi $profilProdi)
    {
        $data = $request->validate([
            'deskripsi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'tujuan' => 'required|string',
            'lama_studi' => 'required|string|max:255',
            'gelar_lulusan' => 'required|string|max:255',
            'kepanjangan_gelar' => 'required|string|max:255',
            'snbp_pelamar' => 'required|integer|min:0',
            'snbp_diterima' => 'required|integer|min:1',
            'snbt_pelamar' => 'required|integer|min:0',
            'snbt_diterima' => 'required|integer|min:1',
            'akreditasi' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'foto_akreditasi' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'industri_tempat_bekerja' => 'required|string',
        ]);

        if (isset($data['snbp_pelamar']) && isset($data['snbp_diterima']) && $data['snbp_diterima'] > 0) {
            $data['snbp_keketatan'] = round($data['snbp_pelamar'] / $data['snbp_diterima'], 2);
        } else {
            $data['snbp_keketatan'] = $profilProdi->snbp_keketatan ?? 0.00;
        }

        if (isset($data['snbt_pelamar']) && isset($data['snbt_diterima']) && $data['snbt_diterima'] > 0) {
            $data['snbt_keketatan'] = round($data['snbt_pelamar'] / $data['snbt_diterima'], 2);
        } else {
            $data['snbt_keketatan'] = $profilProdi->snbt_keketatan ?? 0.00;
        }

        if ($request->hasFile('foto_akreditasi')) {
            if ($profilProdi->foto_akreditasi && Storage::disk('public')->exists($profilProdi->foto_akreditasi)) {
                Storage::disk('public')->delete($profilProdi->foto_akreditasi);
            }

            $file = $request->file('foto_akreditasi');
            $filename = 'akreditasi_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profil-prodi', $filename, 'public');
            $data['foto_akreditasi'] = $path;
        }

        if ($profilProdi->update($data)) {
            return redirect()->route('admin.profil.index')->with('success', 'Profil Program Studi berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui profil program studi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilProdi $profilProdi)
    {
        if ($profilProdi->foto_akreditasi && Storage::disk('public')->exists($profilProdi->foto_akreditasi)) {
            Storage::disk('public')->delete($profilProdi->foto_akreditasi);
        }

        if ($profilProdi->delete()) {
            return redirect()->route('admin.profil.index')->with('success', 'Profil Program Studi berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus profil program studi.');
    }
}
