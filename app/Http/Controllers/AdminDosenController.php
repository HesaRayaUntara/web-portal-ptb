<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JenisKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'desc')->get();
        $jenisKarya = JenisKarya::orderBy('created_at', 'desc')->get();
        
        // Import models untuk data lainnya - urutkan berdasarkan tahun terbaru
        $penelitian = \App\Models\Penelitian::orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->get();
        $pengabdian = \App\Models\Pengabdian::orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->get();
        $publikasi = \App\Models\Publikasi::orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->get();
        $hki = \App\Models\Hki::orderBy('tahun', 'desc')->orderBy('created_at', 'desc')->get();
        
        // Check if there's already a kepala program studi
        $hasKepalaProdi = Dosen::where('kepala_program_studi', true)->exists();

        return view('halaman-admin.dosen.index', compact(
            'dosen', 
            'jenisKarya', 
            'penelitian', 
            'pengabdian', 
            'publikasi', 
            'hki',
            'hasKepalaProdi'
        ));
    }

    // ========== CRUD DOSEN ==========
    public function createDosen()
    {
        $hasKepalaProdi = Dosen::where('kepala_program_studi', true)->exists();
        return view('halaman-admin.dosen.create', compact('hasKepalaProdi'));
    }

    public function editDosen(Dosen $dosen)
    {
        $hasKepalaProdi = Dosen::where('kepala_program_studi', true)->exists();
        return view('halaman-admin.dosen.edit', compact('dosen', 'hasKepalaProdi'));
    }

    public function storeDosen(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:dosen tetap,dosen tidak tetap',
            'bidang_keahlian' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'gsch' => 'nullable|url|max:255',
            'kepala_program_studi' => 'boolean',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto hanya boleh JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 10MB.',
        ]);

        // Check if kepala_program_studi is being set to true
        if ($request->has('kepala_program_studi') && $request->kepala_program_studi) {
            $existingKepalaProdi = Dosen::where('kepala_program_studi', true)->first();
            if ($existingKepalaProdi) {
                return back()->withInput()->withErrors(['kepala_program_studi' => 'Sudah ada dosen yang menjadi Kepala Program Studi. Hapus terlebih dahulu sebelum menambahkan yang baru.']);
            }
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('dosen', $filename, 'public');
            $data['foto'] = $path;
        }

        $data['kepala_program_studi'] = $request->has('kepala_program_studi') && $request->kepala_program_studi ? true : null;
        $data['slug'] = Str::slug($data['nama']);

        if (Dosen::create($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan dosen.');
    }

    public function updateDosen(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:dosen tetap,dosen tidak tetap',
            'bidang_keahlian' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'gsch' => 'nullable|url|max:255',
            'kepala_program_studi' => 'boolean',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ], [
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto hanya boleh JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 10MB.',
        ]);

        // Check if kepala_program_studi is being set to true
        if ($request->has('kepala_program_studi') && $request->kepala_program_studi) {
            $existingKepalaProdi = Dosen::where('kepala_program_studi', true)
                ->where('id_dosen', '!=', $dosen->id_dosen)
                ->first();
            if ($existingKepalaProdi) {
                return back()->withInput()->withErrors(['kepala_program_studi' => 'Sudah ada dosen yang menjadi Kepala Program Studi. Hapus terlebih dahulu sebelum menambahkan yang baru.']);
            }
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('dosen', $filename, 'public');
            $data['foto'] = $path;
        } else {
            $data['foto'] = $dosen->foto;
        }

        $data['kepala_program_studi'] = $request->has('kepala_program_studi') && $request->kepala_program_studi ? true : null;
        $data['slug'] = Str::slug($data['nama']);

        if ($dosen->update($data)) {
            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui dosen.');
    }

    public function destroyDosen(Dosen $dosen)
    {
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
            Storage::disk('public')->delete($dosen->foto);
        }
        
        if ($dosen->delete()) {
            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus dosen.');
    }

}
