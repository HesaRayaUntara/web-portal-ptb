<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JenisKarya;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Publikasi;
use App\Models\Hki;
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
        $penelitian = Penelitian::orderBy('created_at', 'desc')->get();
        $pengabdian = Pengabdian::orderBy('created_at', 'desc')->get();
        $publikasi = Publikasi::orderBy('created_at', 'desc')->get();
        $hki = Hki::orderBy('created_at', 'desc')->get();
        
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
    public function storeDosen(Request $request)
    {
        try {
            $validated = $request->validate([
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
                // Check if there's already a kepala program studi
                $existingKepalaProdi = Dosen::where('kepala_program_studi', true)->first();
                if ($existingKepalaProdi) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Sudah ada dosen yang menjadi Kepala Program Studi. Hapus terlebih dahulu sebelum menambahkan yang baru.'
                    ], 422);
                }
            }

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('dosen', $filename, 'public');
                $validated['foto'] = $path;
            }

            $validated['kepala_program_studi'] = $request->has('kepala_program_studi') && $request->kepala_program_studi ? true : null;
            $validated['slug'] = Str::slug($validated['nama']);

            Dosen::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Dosen berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan dosen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateDosen(Request $request, Dosen $dosen)
    {
        try {
            $validated = $request->validate([
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
                // Check if there's already a kepala program studi (excluding current dosen)
                $existingKepalaProdi = Dosen::where('kepala_program_studi', true)
                    ->where('id', '!=', $dosen->id)
                    ->first();
                if ($existingKepalaProdi) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Sudah ada dosen yang menjadi Kepala Program Studi. Hapus terlebih dahulu sebelum menambahkan yang baru.'
                    ], 422);
                }
            }

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Delete old foto
                if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                    Storage::disk('public')->delete($dosen->foto);
                }
                
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('dosen', $filename, 'public');
                $validated['foto'] = $path;
            } else {
                $validated['foto'] = $dosen->foto;
            }

            $validated['kepala_program_studi'] = $request->has('kepala_program_studi') && $request->kepala_program_studi ? true : null;
            $validated['slug'] = Str::slug($validated['nama']);

            $dosen->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Dosen berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui dosen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyDosen(Dosen $dosen)
    {
        try {
            // Delete foto
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            
            $dosen->delete();

            return response()->json([
                'success' => true,
                'message' => 'Dosen berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus dosen: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== CRUD JENIS KARYA ==========
    public function storeJenisKarya(Request $request)
    {
        try {
            $validated = $request->validate([
                'j_karya' => 'required|string|max:255',
            ]);

            JenisKarya::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Jenis karya berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan jenis karya: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateJenisKarya(Request $request, JenisKarya $jenisKarya)
    {
        try {
            $validated = $request->validate([
                'j_karya' => 'required|string|max:255',
            ]);

            $jenisKarya->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Jenis karya berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui jenis karya: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyJenisKarya(JenisKarya $jenisKarya)
    {
        try {
            $jenisKarya->delete();

            return response()->json([
                'success' => true,
                'message' => 'Jenis karya berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus jenis karya: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== CRUD PENELITIAN ==========
    public function storePenelitian(Request $request)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_penelitian' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            Penelitian::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Penelitian berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan penelitian: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePenelitian(Request $request, Penelitian $penelitian)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_penelitian' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $penelitian->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Penelitian berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui penelitian: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyPenelitian(Penelitian $penelitian)
    {
        try {
            $penelitian->delete();

            return response()->json([
                'success' => true,
                'message' => 'Penelitian berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus penelitian: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== CRUD PENGABDIAN ==========
    public function storePengabdian(Request $request)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_pengabdian' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            Pengabdian::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Pengabdian masyarakat berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan pengabdian masyarakat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePengabdian(Request $request, Pengabdian $pengabdian)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_pengabdian' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $pengabdian->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Pengabdian masyarakat berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui pengabdian masyarakat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyPengabdian(Pengabdian $pengabdian)
    {
        try {
            $pengabdian->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pengabdian masyarakat berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus pengabdian masyarakat: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== CRUD PUBLIKASI ==========
    public function storePublikasi(Request $request)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_karya' => 'required|string|max:255',
                'jenis_karya' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            Publikasi::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Publikasi karya berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan publikasi karya: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePublikasi(Request $request, Publikasi $publikasi)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_karya' => 'required|string|max:255',
                'jenis_karya' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $publikasi->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Publikasi karya berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui publikasi karya: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyPublikasi(Publikasi $publikasi)
    {
        try {
            $publikasi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Publikasi karya berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus publikasi karya: ' . $e->getMessage()
            ], 500);
        }
    }

    // ========== CRUD HKI ==========
    public function storeHki(Request $request)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_karya' => 'required|string|max:255',
                'jenis_karya' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            Hki::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'HKI/Paten berhasil ditambahkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan HKI/Paten: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateHki(Request $request, Hki $hki)
    {
        try {
            $validated = $request->validate([
                'dosen_id' => 'nullable|exists:dosen,id',
                'judul_karya' => 'required|string|max:255',
                'jenis_karya' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $hki->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'HKI/Paten berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui HKI/Paten: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyHki(Hki $hki)
    {
        try {
            $hki->delete();

            return response()->json([
                'success' => true,
                'message' => 'HKI/Paten berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus HKI/Paten: ' . $e->getMessage()
            ], 500);
        }
    }
}
