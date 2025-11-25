<?php

namespace Database\Seeders;

use App\Models\Publikasi;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Publikasi::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = Dosen::all();
        
        if ($dosen->isEmpty()) {
            $this->command->warn('Tidak ada data dosen. Pastikan DosenSeeder dijalankan terlebih dahulu.');
            return;
        }

        $publikasi = [
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_karya' => 'Marker-Assisted Selection for Drought Tolerance in Rice: A Review',
                'jenis_karya' => 'Jurnal Internasional',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_karya' => 'Genetic Analysis of Agronomic Traits in Maize Hybrids',
                'jenis_karya' => 'Jurnal Internasional',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_karya' => 'Optimasi Teknologi Penyimpanan Benih Padi untuk Mempertahankan Viabilitas',
                'jenis_karya' => 'Jurnal Nasional Terakreditasi',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_karya' => 'Pengaruh Perlakuan Priming terhadap Kualitas Benih Padi',
                'jenis_karya' => 'Jurnal Nasional Terakreditasi',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_karya' => 'Application of CRISPR-Cas9 Technology in Plant Breeding: Current Status and Future Prospects',
                'jenis_karya' => 'Jurnal Internasional',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_karya' => 'Genome-Wide Association Study for Disease Resistance in Chili Pepper',
                'jenis_karya' => 'Jurnal Internasional',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_karya' => 'Pemuliaan Tanaman Cabai untuk Meningkatkan Kandungan Capsaicin',
                'jenis_karya' => 'Jurnal Nasional Terakreditasi',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_karya' => 'Keragaman Genetik Varietas Lokal Tomat di Indonesia',
                'jenis_karya' => 'Prosiding Nasional',
                'tahun' => 2022,
            ],
            [
                'dosen_id' => $dosen[4]->id_dosen,
                'judul_karya' => 'Sistem Produksi Benih Padi Berkelanjutan',
                'jenis_karya' => 'Jurnal Nasional',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[5]->id_dosen,
                'judul_karya' => 'Pengembangan Metode Pengujian Mutu Benih yang Cepat dan Akurat',
                'jenis_karya' => 'Jurnal Nasional Terakreditasi',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[6]->id_dosen,
                'judul_karya' => 'Pemuliaan Tanaman Kelapa Sawit: Strategi dan Tantangan',
                'jenis_karya' => 'Prosiding Internasional',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[7]->id_dosen,
                'judul_karya' => 'Breeding for Climate Resilience in Crop Plants',
                'jenis_karya' => 'Jurnal Internasional',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_karya' => 'Buku Ajar: Dasar-Dasar Pemuliaan Tanaman',
                'jenis_karya' => 'Buku',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_karya' => 'Buku: Teknologi Benih Modern',
                'jenis_karya' => 'Buku',
                'tahun' => 2024,
            ],
        ];

        foreach ($publikasi as $p) {
            Publikasi::create($p);
        }
    }
}

