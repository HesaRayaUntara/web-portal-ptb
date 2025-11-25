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
        return view('halaman-admin.profil.index', compact('profilProdi'));
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
            'profil_lulusan' => 'nullable|array',
            'profil_lulusan.*.peran' => 'required_with:profil_lulusan|string|max:255',
            'profil_lulusan.*.deskripsi_kemampuan' => 'required_with:profil_lulusan|string',
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

        if ($request->hasFile('mitra_logo')) {
            $mitraLogos = [];
            foreach ($request->file('mitra_logo') as $file) {
                $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profil-prodi/mitra', $filename, 'public');
                $mitraLogos[] = $path;
            }
            $data['mitra_logo'] = $mitraLogos;
        }

        $profilProdi = ProfilProdi::create($data);

        if ($request->has('profil_lulusan') && is_array($request->profil_lulusan)) {
            foreach ($request->profil_lulusan as $lulusan) {
                if (!empty($lulusan['peran']) && !empty($lulusan['deskripsi_kemampuan'])) {
                    ProfilLulusan::create([
                        'profil_prodi_id' => $profilProdi->id_profil_prodi,
                        'peran' => $lulusan['peran'],
                        'deskripsi_kemampuan' => $lulusan['deskripsi_kemampuan'],
                    ]);
                }
            }
        }

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
        $profilProdi->load('profilLulusan');
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
            'mitra_logo' => 'nullable|array',
            'mitra_logo.*' => 'image|mimes:jpeg,jpg,png|max:5120',
            'profil_lulusan' => 'nullable|array',
            'profil_lulusan.*.id_profil_lulusan' => 'nullable|exists:profil_lulusan,id_profil_lulusan',
            'profil_lulusan.*.peran' => 'required|string|max:255',
            'profil_lulusan.*.deskripsi_kemampuan' => 'required|string',
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

        if ($request->hasFile('mitra_logo')) {
            $existingLogos = $profilProdi->mitra_logo ?? [];
            
            foreach ($request->file('mitra_logo') as $file) {
                $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profil-prodi/mitra', $filename, 'public');
                $existingLogos[] = $path;
            }
            $data['mitra_logo'] = $existingLogos;
        }

        if ($profilProdi->update($data)) {
            if ($request->has('profil_lulusan') && is_array($request->profil_lulusan)) {
                $existingIds = collect($request->profil_lulusan)->pluck('id_profil_lulusan')->filter()->toArray();
                
                ProfilLulusan::where('profil_prodi_id', $profilProdi->id_profil_prodi)
                    ->whereNotIn('id_profil_lulusan', $existingIds)
                    ->delete();

                foreach ($request->profil_lulusan as $lulusan) {
                    if (!empty($lulusan['peran']) && !empty($lulusan['deskripsi_kemampuan'])) {
                        if (isset($lulusan['id_profil_lulusan']) && $lulusan['id_profil_lulusan']) {
                            ProfilLulusan::where('id_profil_lulusan', $lulusan['id_profil_lulusan'])
                                ->where('profil_prodi_id', $profilProdi->id_profil_prodi)
                                ->update([
                                    'peran' => $lulusan['peran'],
                                    'deskripsi_kemampuan' => $lulusan['deskripsi_kemampuan'],
                                ]);
                        } else {
                            ProfilLulusan::create([
                                'profil_prodi_id' => $profilProdi->id_profil_prodi,
                                'peran' => $lulusan['peran'],
                                'deskripsi_kemampuan' => $lulusan['deskripsi_kemampuan'],
                            ]);
                        }
                    }
                }
            } else {
                ProfilLulusan::where('profil_prodi_id', $profilProdi->id_profil_prodi)->delete();
            }

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

        if ($profilProdi->mitra_logo && is_array($profilProdi->mitra_logo)) {
            foreach ($profilProdi->mitra_logo as $logo) {
                if (Storage::disk('public')->exists($logo)) {
                    Storage::disk('public')->delete($logo);
                }
            }
        }

        if ($profilProdi->delete()) {
            return redirect()->route('admin.profil.index')->with('success', 'Profil Program Studi berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus profil program studi.');
    }
}
