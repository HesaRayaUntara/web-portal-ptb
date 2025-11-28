<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\DeskripsiKurikulum;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deskripsiKurikulum = DeskripsiKurikulum::first() ?? new DeskripsiKurikulum();
        $kurikulum = Kurikulum::orderBy('semester')->orderBy('kode_mk')->get();
        
        // Group by semester
        $kurikulumBySemester = $kurikulum->groupBy('semester');
        
        return view('halaman-admin.kurikulum.index', compact('deskripsiKurikulum', 'kurikulumBySemester'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman-admin.kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Kurikulum $kurikulum)
    {
        $data = $request->validate([
            'semester' => 'required|integer|between:1,8',
            'kode_mk' => 'required|string|max:255',
            'nama_mk' => 'required|string|max:255',
            'jenis_mk' => 'required|string|in:CCC,FC,FL,IC,ACC,EC,FYP',
            'sks_kuliah' => 'required|integer|min:0',
            'sks_praktikum' => 'required|integer|min:0',
        ]);

        $existingKurikulum = Kurikulum::where('kode_mk', $data['kode_mk'])->first();
        
        if ($existingKurikulum) {
            return back()->withInput()->with('error', 'Data ' . $data['kode_mk'] . ' sudah ada. coba lagi');
        }

        if ($kurikulum = Kurikulum::create($data)) {
            $this->logActivity('menambah data kurikulum', 'Kurikulum: ' . $data['kode_mk'] . ' - ' . $data['nama_mk']);
            return redirect()->route('admin.kurikulum.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan mata kuliah.');
    }

    /**
     * Update deskripsi kurikulum
     */
    public function updateDeskripsi(Request $request, DeskripsiKurikulum $deskripsiKurikulum)
    {
        $data = $request->validate([
            'deskripsi_semester_1_2' => 'nullable|string',
            'deskripsi_semester_3_4' => 'nullable|string',
            'deskripsi_semester_5_6' => 'nullable|string',
            'deskripsi_semester_7_8' => 'nullable|string',
        ]);

        $deskripsiKurikulum = DeskripsiKurikulum::first();
        
        if ($deskripsiKurikulum) {
            if ($deskripsiKurikulum->update($data)) {
                $this->logActivity('mengedit data deskripsi kurikulum');
                return redirect()->route('admin.kurikulum.index')->with('success', 'Deskripsi kurikulum berhasil diperbarui.');
            }
        } else {
            if (DeskripsiKurikulum::create($data)) {
                $this->logActivity('menambah data deskripsi kurikulum');
                return redirect()->route('admin.kurikulum.index')->with('success', 'Deskripsi kurikulum berhasil diperbarui.');
            }
        }

        return back()->withInput()->with('error', 'Gagal memperbarui deskripsi kurikulum.');
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
    public function edit(Kurikulum $kurikulum)
    {
        return view('halaman-admin.kurikulum.edit', compact('kurikulum'));
    }

    public function update(Request $request, Kurikulum $kurikulum)
    {
        $data = $request->validate([
            'semester' => 'required|integer|between:1,8',
            'kode_mk' => 'required|string|max:255',
            'nama_mk' => 'required|string|max:255',
            'jenis_mk' => 'required|string|in:CCC,FC,FL,IC,ACC,EC,FYP',
            'sks_kuliah' => 'required|integer|min:0',
            'sks_praktikum' => 'required|integer|min:0',
        ]);

        $existingKurikulum = Kurikulum::where('kode_mk', $data['kode_mk'])
            ->where('id_kurikulum', '!=', $kurikulum->id_kurikulum)
            ->first();
        
        if ($existingKurikulum) {
            return back()->withInput()->with('error', 'Data ' . $data['kode_mk'] . ' sudah ada. coba lagi');
        }

        if ($kurikulum->update($data)) {
            $this->logActivity('mengedit data kurikulum', 'Kurikulum: ' . $data['kode_mk'] . ' - ' . $data['nama_mk']);
            return redirect()->route('admin.kurikulum.index')->with('success', 'Mata kuliah berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui mata kuliah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $namaKurikulum = $kurikulum->kode_mk . ' - ' . $kurikulum->nama_mk;
        if ($kurikulum->delete()) {
            $this->logActivity('menghapus data kurikulum', 'Kurikulum: ' . $namaKurikulum);
            return redirect()->route('admin.kurikulum.index')->with('success', 'Mata kuliah berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus mata kuliah.');
    }

    public function downloadPDF()
    {
        $kurikulum = Kurikulum::orderBy('semester')->orderBy('kode_mk')->get();
        
        if ($kurikulum->isEmpty()) {
            return redirect()->route('kurikulum')->with('error', 'Mata kuliah belum tersedia.');
        }

        $kurikulumBySemester = $kurikulum->groupBy('semester');
        
        $pdf = PDF::loadView('halaman-pengunjung.kurikulum.pdf', compact('kurikulumBySemester'));
        
        return $pdf->download('Mata_Kuliah_Program_Studi_PTB.pdf');
    }
}
