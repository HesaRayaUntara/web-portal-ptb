<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminBeritaController extends Controller
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
        
        return view('admin-pages.admin-berita', compact('kategoris', 'beritaList'));
    }

    /**
     * Store kategori berita
     */
    public function storeKategori(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:kategori_berita,nama',
            ]);

            KategoriBerita::create($validated);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Kategori berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori: ' . $e->getMessage());
        }
    }

    /**
     * Delete kategori berita
     */
    public function deleteKategori($id)
    {
        try {
            $kategori = KategoriBerita::findOrFail($id);
            
            // Check if kategori is used in berita
            if ($kategori->berita()->count() > 0) {
                return redirect()->back()
                    ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan dalam berita.');
            }

            $kategori->delete();

            return redirect()->route('admin.berita.index')
                ->with('success', 'Kategori berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus kategori: ' . $e->getMessage());
        }
    }

    /**
     * Store berita (publikasikan atau draft)
     */
    public function storeBerita(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'kategori_berita_id' => 'required|exists:kategori_berita,id',
                'penulis' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:10240', // max 10MB, only jpg, jpeg, png
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('berita', $filename, 'public');
                $validated['image'] = $path;
            }

            $validated['slug'] = Str::slug($validated['judul']);
            
            // Check if slug already exists
            $slugCount = Berita::where('slug', $validated['slug'])->count();
            if ($slugCount > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($slugCount + 1);
            }

            if ($request->action === 'publikasikan') {
                $validated['status'] = 'published';
                $validated['tanggal_publikasi'] = Carbon::now();
            } else {
                $validated['status'] = 'draft';
            }

            Berita::create($validated);

            $message = $request->action === 'publikasikan' 
                ? 'Berita berhasil dipublikasikan.' 
                : 'Berita berhasil disimpan sebagai draft.';

            return redirect()->route('admin.berita.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
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
        
        return view('admin-pages.admin-berita-draft', compact('drafts'));
    }

    /**
     * Show the form for editing draft berita
     */
    public function editDraft($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        
        if ($berita->status !== 'draft') {
            return redirect()->route('admin.berita.index')
                ->with('error', 'Berita ini bukan draft.');
        }

        $kategoris = KategoriBerita::orderBy('nama')->get();
        
        return view('admin-pages.admin-edit-berita', compact('berita', 'kategoris'));
    }

    /**
     * Update draft berita
     */
    public function updateDraft(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);
            
            if ($berita->status !== 'draft') {
                return redirect()->route('admin.berita.index')
                    ->with('error', 'Berita ini bukan draft.');
            }

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'kategori_berita_id' => 'required|exists:kategori_berita,id',
                'penulis' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240', // max 10MB, only jpg, jpeg, png
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                    Storage::disk('public')->delete($berita->image);
                }
                
                $file = $request->file('image');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('berita', $filename, 'public');
                $validated['image'] = $path;
            } else {
                // Keep existing image if no new file uploaded
                $validated['image'] = $berita->image;
            }

            $validated['slug'] = Str::slug($validated['judul']);
            
            // Check if slug already exists (except current berita)
            $slugCount = Berita::where('slug', $validated['slug'])
                ->where('id', '!=', $id)
                ->count();
            if ($slugCount > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($slugCount + 1);
            }

            if ($request->action === 'publikasikan') {
                $validated['status'] = 'published';
                $validated['tanggal_publikasi'] = Carbon::now();
                $message = 'Berita berhasil dipublikasikan.';
                $redirectRoute = 'admin.berita.index';
            } else {
                $validated['status'] = 'draft';
                $message = 'Draft berita berhasil diperbarui.';
                $redirectRoute = 'admin.berita.draft';
            }

            $berita->update($validated);

            return redirect()->route($redirectRoute)
                ->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing published berita
     */
    public function editBerita($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        $kategoris = KategoriBerita::orderBy('nama')->get();
        
        return view('admin-pages.admin-edit-berita', compact('berita', 'kategoris'));
    }

    /**
     * Update published berita
     */
    public function updateBerita(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'kategori_berita_id' => 'required|exists:kategori_berita,id',
                'penulis' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240', // max 10MB, only jpg, jpeg, png
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                    Storage::disk('public')->delete($berita->image);
                }
                
                $file = $request->file('image');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('berita', $filename, 'public');
                $validated['image'] = $path;
            } else {
                // Keep existing image if no new file uploaded
                $validated['image'] = $berita->image;
            }

            $validated['slug'] = Str::slug($validated['judul']);
            
            // Check if slug already exists (except current berita)
            $slugCount = Berita::where('slug', $validated['slug'])
                ->where('id', '!=', $id)
                ->count();
            if ($slugCount > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($slugCount + 1);
            }

            $berita->update($validated);

            return redirect()->route('admin.berita.index')
                ->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBerita($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $berita->delete();

            return redirect()->back()
                ->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }
}
