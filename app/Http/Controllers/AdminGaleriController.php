<?php

namespace App\Http\Controllers;

use App\Models\KategoriGaleri;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriGaleri::orderBy('nama')->get();
        $galeriList = Galeri::with('kategori')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin-pages.admin-galeri', compact('kategoris', 'galeriList'));
    }

    /**
     * Store kategori galeri
     */
    public function storeKategori(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:kategori_galeri,nama',
            ]);

            KategoriGaleri::create($validated);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Kategori galeri berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori: ' . $e->getMessage());
        }
    }

    /**
     * Delete kategori galeri
     */
    public function deleteKategori($id)
    {
        try {
            $kategori = KategoriGaleri::findOrFail($id);
            
            // Check if kategori is used in galeri
            if ($kategori->galeri()->count() > 0) {
                return redirect()->back()
                    ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan dalam galeri.');
            }

            $kategori->delete();

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Kategori galeri berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus kategori: ' . $e->getMessage());
        }
    }

    /**
     * Store galeri
     */
    public function storeGaleri(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori_galeri_id' => 'required|exists:kategori_galeri,id',
                'tipe' => 'required|in:photo,video',
                'foto' => 'required_if:tipe,photo|nullable|image|mimes:jpeg,jpg,png|max:10240',
                'youtube_url' => 'required_if:tipe,video|nullable|url',
            ]);

            // Handle file upload for photo
            if ($request->tipe === 'photo' && $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('galeri', $filename, 'public');
                $validated['foto'] = $path;
            }

            // For video, foto will be null (will use YouTube thumbnail)
            if ($request->tipe === 'video') {
                $validated['foto'] = null;
            }

            Galeri::create($validated);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan galeri: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing galeri
     */
    public function editGaleri($id)
    {
        $galeri = Galeri::with('kategori')->findOrFail($id);
        $kategoris = KategoriGaleri::orderBy('nama')->get();
        
        return view('admin-pages.admin-edit-galeri', compact('galeri', 'kategoris'));
    }

    /**
     * Update galeri
     */
    public function updateGaleri(Request $request, $id)
    {
        try {
            $galeri = Galeri::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori_galeri_id' => 'required|exists:kategori_galeri,id',
                'tipe' => 'required|in:photo,video',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
                'youtube_url' => 'required_if:tipe,video|nullable|url',
            ]);

            // Validate: if tipe is photo, must have either new foto or existing foto
            if ($request->tipe === 'photo' && !$request->hasFile('foto') && !$galeri->foto) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['foto' => 'Gambar wajib diisi untuk tipe foto.']);
            }

            // Handle file upload for photo
            if ($request->tipe === 'photo' && $request->hasFile('foto')) {
                // Delete old foto
                if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                    Storage::disk('public')->delete($galeri->foto);
                }
                
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('galeri', $filename, 'public');
                $validated['foto'] = $path;
            } else if ($request->tipe === 'photo' && $galeri->foto) {
                // Keep existing foto if no new file uploaded
                $validated['foto'] = $galeri->foto;
            } else if ($request->tipe === 'video') {
                // Delete old foto if switching from photo to video
                if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                    Storage::disk('public')->delete($galeri->foto);
                }
                $validated['foto'] = null;
            }

            $galeri->update($validated);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Galeri berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui galeri: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGaleri($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
            
            // Delete foto if exists
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            
            $galeri->delete();

            return redirect()->back()
                ->with('success', 'Galeri berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus galeri: ' . $e->getMessage());
        }
    }
}

