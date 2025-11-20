<?php

namespace App\Http\Controllers;

use App\Models\ProfilProdi;
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
        
        if (!$profilProdi) {
            return redirect()->route('admin.profil.create');
        }

        return redirect()->route('admin.profil.edit', $profilProdi->id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.admin-profil-prodi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'deskripsi' => 'required|string',
                'visi' => 'required|string',
                'misi' => 'required|string',
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
                'posisi_banyak_dicari' => 'required|string',
                'nilai_etika' => 'required|string',
                'pendekatan_pembelajaran' => 'required|string',
                'kompetensi_lulusan' => 'required|string',
                'mitra_logo' => 'nullable|array',
                'mitra_logo.*' => 'image|mimes:jpeg,jpg,png|max:5120',
            ]);

            // Calculate keketatan automatically
            // Rumus: (pelamar / diterima) × 100 / 100 = pelamar / diterima
            if (isset($validated['snbp_pelamar']) && isset($validated['snbp_diterima']) && $validated['snbp_diterima'] > 0) {
                $validated['snbp_keketatan'] = round($validated['snbp_pelamar'] / $validated['snbp_diterima'], 2);
            } else {
                $validated['snbp_keketatan'] = 0.00;
            }

            if (isset($validated['snbt_pelamar']) && isset($validated['snbt_diterima']) && $validated['snbt_diterima'] > 0) {
                $validated['snbt_keketatan'] = round($validated['snbt_pelamar'] / $validated['snbt_diterima'], 2);
            } else {
                $validated['snbt_keketatan'] = 0.00;
            }

            // Handle foto akreditasi upload
            if ($request->hasFile('foto_akreditasi')) {
                $file = $request->file('foto_akreditasi');
                $filename = 'akreditasi_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profil-prodi', $filename, 'public');
                $validated['foto_akreditasi'] = $path;
            }

            // Handle mitra logo upload (multiple files)
            if ($request->hasFile('mitra_logo')) {
                $mitraLogos = [];
                foreach ($request->file('mitra_logo') as $file) {
                    $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('profil-prodi/mitra', $filename, 'public');
                    $mitraLogos[] = $path;
                }
                $validated['mitra_logo'] = $mitraLogos;
            }

            $profilProdi = ProfilProdi::create($validated);

            return redirect()->route('admin.profil.edit', $profilProdi->id)
                ->with('success', 'Profil Program Studi berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal membuat profil program studi: ' . $e->getMessage());
        }
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
    public function edit(string $id)
    {
        $profilProdi = ProfilProdi::findOrFail($id);
        return view('admin-pages.admin-profil-prodi', compact('profilProdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $profilProdi = ProfilProdi::findOrFail($id);

            $validated = $request->validate([
                'deskripsi' => 'required|string',
                'visi' => 'required|string',
                'misi' => 'required|string',
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
                'posisi_banyak_dicari' => 'required|string',
                'nilai_etika' => 'required|string',
                'pendekatan_pembelajaran' => 'required|string',
                'kompetensi_lulusan' => 'required|string',
                'mitra_logo' => 'nullable|array',
                'mitra_logo.*' => 'image|mimes:jpeg,jpg,png|max:5120',
            ]);

            // Calculate keketatan automatically
            // Rumus: (pelamar / diterima) × 100 / 100 = pelamar / diterima
            if (isset($validated['snbp_pelamar']) && isset($validated['snbp_diterima']) && $validated['snbp_diterima'] > 0) {
                $validated['snbp_keketatan'] = round($validated['snbp_pelamar'] / $validated['snbp_diterima'], 2);
            } else {
                $validated['snbp_keketatan'] = $profilProdi->snbp_keketatan ?? 0.00;
            }

            if (isset($validated['snbt_pelamar']) && isset($validated['snbt_diterima']) && $validated['snbt_diterima'] > 0) {
                $validated['snbt_keketatan'] = round($validated['snbt_pelamar'] / $validated['snbt_diterima'], 2);
            } else {
                $validated['snbt_keketatan'] = $profilProdi->snbt_keketatan ?? 0.00;
            }

            // Handle foto akreditasi upload
            if ($request->hasFile('foto_akreditasi')) {
                // Delete old file if exists
                if ($profilProdi->foto_akreditasi && Storage::disk('public')->exists($profilProdi->foto_akreditasi)) {
                    Storage::disk('public')->delete($profilProdi->foto_akreditasi);
                }

                $file = $request->file('foto_akreditasi');
                $filename = 'akreditasi_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profil-prodi', $filename, 'public');
                $validated['foto_akreditasi'] = $path;
            }

            // Handle mitra logo upload (multiple files)
            if ($request->hasFile('mitra_logo')) {
                // Get existing logos
                $existingLogos = $profilProdi->mitra_logo ?? [];
                
                // Add new logos
                foreach ($request->file('mitra_logo') as $file) {
                    $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('profil-prodi/mitra', $filename, 'public');
                    $existingLogos[] = $path;
                }
                $validated['mitra_logo'] = $existingLogos;
            }

            $profilProdi->update($validated);

            return redirect()->route('admin.profil.index')
                ->with('success', 'Profil Program Studi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui profil program studi: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $profilProdi = ProfilProdi::findOrFail($id);

            // Delete foto akreditasi if exists
            if ($profilProdi->foto_akreditasi && Storage::disk('public')->exists($profilProdi->foto_akreditasi)) {
                Storage::disk('public')->delete($profilProdi->foto_akreditasi);
            }

            // Delete mitra logos if exists
            if ($profilProdi->mitra_logo && is_array($profilProdi->mitra_logo)) {
                foreach ($profilProdi->mitra_logo as $logo) {
                    if (Storage::disk('public')->exists($logo)) {
                        Storage::disk('public')->delete($logo);
                    }
                }
            }

            $profilProdi->delete();

            return redirect()->route('admin.profil.create')
                ->with('success', 'Profil Program Studi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus profil program studi: ' . $e->getMessage());
        }
    }
}
