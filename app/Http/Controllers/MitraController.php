<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman-admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('mitra', $filename, 'public');
            $data['logo'] = $path;
        }

        $mitra = Mitra::create($data);

        if ($mitra) {
            $this->logActivity('menambah data mitra', 'Mitra: ' . $data['nama_mitra']);
            return redirect()->route('admin.profil.index')->with('success', 'Mitra berhasil dibuat.');
        }

        return back()->withInput()->with('error', 'Gagal membuat mitra.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mitra $mitra)
    {
        return view('halaman-admin.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mitra $mitra)
    {
        $data = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
                Storage::disk('public')->delete($mitra->logo);
            }

            $file = $request->file('logo');
            $filename = 'mitra_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('mitra', $filename, 'public');
            $data['logo'] = $path;
        }

        if ($mitra->update($data)) {
            $this->logActivity('mengedit data mitra', 'Mitra: ' . $data['nama_mitra']);
            return redirect()->route('admin.profil.index')->with('success', 'Mitra berhasil diperbarui.');
        }

        return back()->withInput()->with('error', 'Gagal memperbarui mitra.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitra $mitra)
    {
        if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
            Storage::disk('public')->delete($mitra->logo);
        }

        $namaMitra = $mitra->nama_mitra;
        if ($mitra->delete()) {
            $this->logActivity('menghapus data mitra', 'Mitra: ' . $namaMitra);
            return redirect()->route('admin.profil.index')->with('success', 'Mitra berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus mitra.');
    }
}

