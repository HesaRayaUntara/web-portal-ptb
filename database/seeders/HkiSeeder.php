<?php

namespace Database\Seeders;

use App\Models\Hki;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HkiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Hki::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = Dosen::all();
        
        if ($dosen->isEmpty()) {
            $this->command->warn('Tidak ada data dosen. Pastikan DosenSeeder dijalankan terlebih dahulu.');
            return;
        }

        $hki = [
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_karya' => 'Varietas Padi Tahan Kekeringan "PTB-1"',
                'jenis_karya' => 'Paten',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_karya' => 'Metode Seleksi Tanaman Jagung Berbasis Marker Molekuler',
                'jenis_karya' => 'Paten',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_karya' => 'Sistem Aplikasi CRISPR-Cas9 untuk Pemuliaan Tanaman Tomat',
                'jenis_karya' => 'Paten',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_karya' => 'Varietas Cabai Unggul "PTB-Cabai-1"',
                'jenis_karya' => 'Paten',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_karya' => 'Aplikasi Mobile untuk Monitoring Kualitas Benih',
                'jenis_karya' => 'Hak Cipta',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[4]->id_dosen,
                'judul_karya' => 'Sistem Manajemen Produksi Benih Berbasis Web',
                'jenis_karya' => 'Hak Cipta',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[5]->id_dosen,
                'judul_karya' => 'Alat Pengujian Mutu Benih Portabel',
                'jenis_karya' => 'Paten',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[6]->id_dosen,
                'judul_karya' => 'Merek: "SeedTech PTB"',
                'jenis_karya' => 'Merek',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[7]->id_dosen,
                'judul_karya' => 'Varietas Tanaman Adaptif Perubahan Iklim "PTB-Climate-1"',
                'jenis_karya' => 'Paten',
                'tahun' => 2024,
            ],
        ];

        foreach ($hki as $h) {
            Hki::create($h);
        }
    }
}

