<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriBerita::orderBy('nama')->get();
        $beritaList = Berita::where('status', 'published')
            ->with('kategori')
            ->orderBy('tanggal_publikasi', 'desc')
            ->get();
        
        return view('halaman-admin.berita.index', compact('kategoris', 'beritaList'));
    }

    /**
     * Store kategori berita
     */
    public function storeKategori(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_berita,nama',
        ]);

        if ($kategori = KategoriBerita::create($data)) {
            $this->logActivity('menambah data kategori berita', 'Kategori: ' . $data['nama']);
            return redirect()->route('admin.berita.index')->with('success', 'Kategori berita berhasil ditambahkan.');
        }

        return back()->withInput()->with('error', 'Gagal menambahkan kategori.');
    }

    /**
     * Delete kategori berita
     */
    public function deleteKategori(KategoriBerita $kategoriBerita)
    {
        if ($kategoriBerita->berita()->count() > 0) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan dalam berita.');
        }

        $namaKategori = $kategoriBerita->nama;
        if ($kategoriBerita->delete()) {
            $this->logActivity('menghapus data kategori berita', 'Kategori: ' . $namaKategori);
            return redirect()->route('admin.berita.index')->with('success', 'Kategori berita berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus kategori.');
    }

    /**
     * Store berita (publikasikan atau draft)
     */
    public function storeBerita(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_berita_id' => 'required|exists:kategori_berita,id_kategori_berita',
            'penulis' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($data['judul']);
        
        $slugCount = Berita::where('slug', $data['slug'])->count();
        if ($slugCount > 0) {
            $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
        }

        if ($request->action === 'publikasikan') {
            $data['status'] = 'published';
            $data['tanggal_publikasi'] = Carbon::now();
        } else {
            $data['status'] = 'draft';
        }

        if ($berita = Berita::create($data)) {
            $this->logActivity('menambah data berita', 'Berita: ' . $data['judul']);
            $message = $request->action === 'publikasikan' 
                ? 'Berita berhasil dipublikasikan.' 
                : 'Berita berhasil disimpan sebagai draft.';
            return redirect()->route('admin.berita.index')->with('success', $message);
        }

        return back()->withInput()->with('error', 'Gagal menyimpan berita.');
    }

    /**
     * Display draft berita
     */
    public function draft()
    {
        $drafts = Berita::where('status', 'draft')
            ->with('kategori')
            ->orderBy('updated_at', 'desc')
            ->get();
        
        return view('halaman-admin.berita.draft', compact('drafts'));
    }

    /**
     * Show the form for editing draft berita
     */
    public function editDraft(Berita $berita)
    {
        if ($berita->status !== 'draft') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita ini bukan draft.');
        }

        $data = [
            'berita' => $berita->load('kategori'),
            'kategoris' => KategoriBerita::orderBy('nama')->get(),
        ];
        
        return view('halaman-admin.berita.edit', $data);
    }

    /**
     * Update draft berita
     */
    public function updateDraft(Request $request, Berita $berita)
    {
        if ($berita->status !== 'draft') {
            return redirect()->route('admin.berita.index')->with('error', 'Berita ini bukan draft.');
        }

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_berita_id' => 'required|exists:kategori_berita,id_kategori_berita',
            'penulis' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $berita->image;
        }

        $data['slug'] = Str::slug($data['judul']);
        
        $slugCount = Berita::where('slug', $data['slug'])
            ->where('id_berita', '!=', $berita->id_berita)
            ->count();
        if ($slugCount > 0) {
            $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
        }

        if ($request->action === 'publikasikan') {
            $data['status'] = 'published';
            $data['tanggal_publikasi'] = Carbon::now();
            $message = 'Berita berhasil dipublikasikan.';
            $redirectRoute = 'admin.berita.index';
        } else {
            $data['status'] = 'draft';
            $message = 'Draft berita berhasil diperbarui.';
            $redirectRoute = 'admin.berita.draft';
        }

        if ($berita->update($data)) {
            $this->logActivity('mengedit data berita', 'Berita: ' . $data['judul']);
            return redirect()->route($redirectRoute)->with('success', $message);
        }

        return back()->withInput()->with('error', 'Gagal memperbarui berita.');
    }

    /**
     * Show the form for editing published berita
     */
    public function editBerita(Berita $berita)
    {
        $data = [
            'berita' => $berita->load('kategori'),
            'kategoris' => KategoriBerita::orderBy('nama')->get(),
        ];
        
        return view('halaman-admin.berita.edit', $data);
    }

    /**
     * Update published berita
     */
    public function updateBerita(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_berita_id' => 'required|exists:kategori_berita,id_kategori_berita',
            'penulis' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $filename, 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $berita->image;
        }

        $data['slug'] = Str::slug($data['judul']);
        
        $slugCount = Berita::where('slug', $data['slug'])
            ->where('id_berita', '!=', $berita->id_berita)
            ->count();
        if ($slugCount > 0) {
            $data['slug'] = $data['slug'] . '-' . ($slugCount + 1);
        }

        if ($berita->update($data)) {
            $this->logActivity('mengedit data berita', 'Berita: ' . $data['judul']);
            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui berita.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBerita(Berita $berita)
    {
        $judulBerita = $berita->judul;
        if ($berita->delete()) {
            $this->logActivity('menghapus data berita', 'Berita: ' . $judulBerita);
            return back()->with('success', 'Berita berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus berita.');
    }
}
