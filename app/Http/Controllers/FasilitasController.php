<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('created_at', 'desc')->get();
        return view('halaman-admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman-admin.fasilitas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_fasilitas' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:10240',
            ]);

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('fasilitas', $filename, 'public');
                $validated['foto'] = $path;
            }

            Fasilitas::create($validated);

            return redirect()->route('admin.fasilitas.index')
                ->with('success', 'Fasilitas berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan fasilitas: ' . $e->getMessage());
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
        $fasilitas = Fasilitas::findOrFail($id);
        return view('halaman-admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);

            $validated = $request->validate([
                'nama_fasilitas' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            ]);

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Delete old foto
                if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
                    Storage::disk('public')->delete($fasilitas->foto);
                }
                
                $file = $request->file('foto');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('fasilitas', $filename, 'public');
                $validated['foto'] = $path;
            } else {
                // Keep existing foto if no new file uploaded
                $validated['foto'] = $fasilitas->foto;
            }

            $fasilitas->update($validated);

            return redirect()->route('admin.fasilitas.index')
                ->with('success', 'Fasilitas berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui fasilitas: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);
            
            // Delete foto
            if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
                Storage::disk('public')->delete($fasilitas->foto);
            }
            
            $fasilitas->delete();

            return redirect()->route('admin.fasilitas.index')
                ->with('success', 'Fasilitas berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus fasilitas: ' . $e->getMessage());
        }
    }
}
