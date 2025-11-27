<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        Mitra::truncate();

        // Pastikan direktori mitra ada di storage
        if (!Storage::disk('public')->exists('mitra')) {
            Storage::disk('public')->makeDirectory('mitra');
        }

        // Logo source
        $logoSource = public_path('gambar/logo-ptb.jpg');
        
        $mitra = [
            [
                'nama_mitra' => 'PT Benih Unggul Indonesia',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'Balai Penelitian Tanaman Pangan',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'PT Agro Sejahtera',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'Pusat Penelitian Bioteknologi',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'PT Sumber Benih Nusantara',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'Balai Besar Penelitian Tanaman Padi',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'PT Pertanian Modern',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'Lembaga Penelitian Pertanian',
                'logo' => null,
            ],
            [
                'nama_mitra' => 'PT Benih Prima',
                'logo' => null,
            ],
        ];

        // Salin logo untuk setiap mitra dengan nama file yang unik
        foreach ($mitra as $index => $m) {
            if (File::exists($logoSource)) {
                $logoDestination = 'mitra/logo-ptb-' . ($index + 1) . '.jpg';
                $logoDestinationPath = storage_path('app/public/' . $logoDestination);
                
                // Salin file jika belum ada
                if (!Storage::disk('public')->exists($logoDestination)) {
                    // Pastikan direktori ada
                    $logoDir = dirname($logoDestinationPath);
                    if (!File::exists($logoDir)) {
                        File::makeDirectory($logoDir, 0755, true);
                    }
                    File::copy($logoSource, $logoDestinationPath);
                }
                
                $m['logo'] = $logoDestination;
            }
            
            Mitra::create($m);
        }
    }
}

