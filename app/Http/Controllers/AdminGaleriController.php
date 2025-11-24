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
        
        return view('halaman-admin.galeri.index', compact('kategoris', 'galeriList'));
    }

    /**
     * Store kategori galeri
     */
    public function storeKategori(Request $request, KategoriGaleri $kategoriGaleri)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_galeri,nama',
        ]);

        if (KategoriGaleri::create($data)) {
            return redirect()->route('admin.galeri.index')->with('success', 'Kategori galeri berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan kategori.');
    }

    /**
     * Delete kategori galeri
     */
    public function deleteKategori(KategoriGaleri $kategoriGaleri)
    {
        if ($kategoriGaleri->galeri()->count() > 0) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan dalam galeri.');
        }

        if ($kategoriGaleri->delete()) {
            return redirect()->route('admin.galeri.index')->with('success', 'Kategori galeri berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus kategori.');
    }

    /**
     * Store galeri
     */
    public function storeGaleri(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_galeri_id' => 'required|exists:kategori_galeri,id',
            'tipe' => 'required|in:photo,video',
            'foto' => 'required_if:tipe,photo|nullable|image|mimes:jpeg,jpg,png|max:10240',
            'youtube_url' => 'required_if:tipe,video|nullable|url',
        ]);

        if ($request->tipe === 'photo' && $request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galeri', $filename, 'public');
            $data['foto'] = $path;
        }

        if ($request->tipe === 'video') {
            $data['foto'] = null;
        }

        if (Galeri::create($data)) {
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menyimpan galeri.');
    }

    /**
     * Show the form for editing galeri
     */
    public function editGaleri(Galeri $galeri, KategoriGaleri $kategoriGaleri)
    {
        $data = [
            'galeri' => $galeri->load('kategori'),
            'kategoris' => $kategoriGaleri->orderBy('nama')->get(),
        ];
        
        return view('halaman-admin.galeri.edit', $data);
    }

    /**
     * Update galeri
     */
    public function updateGaleri(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_galeri_id' => 'required|exists:kategori_galeri,id',
            'tipe' => 'required|in:photo,video',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            'youtube_url' => 'required_if:tipe,video|nullable|url',
        ]);

        if ($request->tipe === 'photo' && !$request->hasFile('foto') && !$galeri->foto) {
            return back()->withInput()->withErrors(['foto' => 'Gambar wajib diisi untuk tipe foto.']);
        }

        if ($request->tipe === 'photo' && $request->hasFile('foto')) {
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            
            $file = $request->file('foto');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galeri', $filename, 'public');
            $data['foto'] = $path;
        } else if ($request->tipe === 'photo' && $galeri->foto) {
            $data['foto'] = $galeri->foto;
        } else if ($request->tipe === 'video') {
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $data['foto'] = null;
        }

        if ($galeri->update($data)) {
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui galeri.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGaleri(Galeri $galeri)
    {
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }
        
        if ($galeri->delete()) {
            return back()->with('success', 'Galeri berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus galeri.');
    }
}

