<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\DeskripsiKurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deskripsiKurikulum = DeskripsiKurikulum::first() ?? new DeskripsiKurikulum();
        $kurikulum = Kurikulum::orderBy('semester')->orderBy('kode_mata_kuliah')->get();
        
        // Group by semester
        $kurikulumBySemester = $kurikulum->groupBy('semester');
        
        return view('admin-pages.admin-kurikulum', compact('deskripsiKurikulum', 'kurikulumBySemester'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.admin-tambah-kurikulum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'semester' => 'required|integer|between:1,8',
                'kode_mata_kuliah' => 'required|string|max:255',
                'nama_mata_kuliah' => 'required|string|max:255',
                'status_mata_kuliah' => 'required|string|max:255',
                'sks_kuliah' => 'required|integer|min:0',
                'sks_praktikum' => 'required|integer|min:0',
            ]);

            // Cek apakah kode mata kuliah sudah ada
            $existingKurikulum = Kurikulum::where('kode_mata_kuliah', $validated['kode_mata_kuliah'])->first();
            
            if ($existingKurikulum) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Data dengan kode mata kuliah "' . $validated['kode_mata_kuliah'] . '" sudah ada. Coba lagi.');
            }

            Kurikulum::create($validated);

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Mata kuliah berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan mata kuliah: ' . $e->getMessage());
        }
    }

    /**
     * Update deskripsi kurikulum
     */
    public function updateDeskripsi(Request $request)
    {
        try {
            $validated = $request->validate([
                'deskripsi_semester_1_2' => 'nullable|string',
                'deskripsi_semester_3_4' => 'nullable|string',
                'deskripsi_semester_5_6' => 'nullable|string',
                'deskripsi_semester_7_8' => 'nullable|string',
            ]);

            $deskripsiKurikulum = DeskripsiKurikulum::first();
            
            if ($deskripsiKurikulum) {
                $deskripsiKurikulum->update($validated);
            } else {
                DeskripsiKurikulum::create($validated);
            }

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Deskripsi kurikulum berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui deskripsi kurikulum: ' . $e->getMessage());
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
        $kurikulum = Kurikulum::findOrFail($id);
        return view('admin-pages.admin-edit-kurikulum', compact('kurikulum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $kurikulum = Kurikulum::findOrFail($id);

            $validated = $request->validate([
                'semester' => 'required|integer|between:1,8',
                'kode_mata_kuliah' => 'required|string|max:255',
                'nama_mata_kuliah' => 'required|string|max:255',
                'status_mata_kuliah' => 'required|string|max:255',
                'sks_kuliah' => 'required|integer|min:0',
                'sks_praktikum' => 'required|integer|min:0',
            ]);

            // Cek apakah kode mata kuliah sudah ada di record lain
            $existingKurikulum = Kurikulum::where('kode_mata_kuliah', $validated['kode_mata_kuliah'])
                ->where('id', '!=', $id)
                ->first();
            
            if ($existingKurikulum) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Data dengan kode mata kuliah "' . $validated['kode_mata_kuliah'] . '" sudah ada. Coba lagi.');
            }

            $kurikulum->update($validated);

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Mata kuliah berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui mata kuliah: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kurikulum = Kurikulum::findOrFail($id);
            $kurikulum->delete();

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Mata kuliah berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus mata kuliah: ' . $e->getMessage());
        }
    }
}
