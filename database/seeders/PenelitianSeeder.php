<?php

namespace Database\Seeders;

use App\Models\Penelitian;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenelitianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Penelitian::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = Dosen::all();
        
        if ($dosen->isEmpty()) {
            $this->command->warn('Tidak ada data dosen. Pastikan DosenSeeder dijalankan terlebih dahulu.');
            return;
        }

        $penelitian = [
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_penelitian' => 'Pengembangan Varietas Padi Tahan Kekeringan dengan Pendekatan Marker-Assisted Selection',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_penelitian' => 'Analisis Genetika Kuantitatif Karakter Agronomi pada Tanaman Jagung',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_penelitian' => 'Optimasi Teknologi Penyimpanan Benih untuk Mempertahankan Viabilitas Jangka Panjang',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_penelitian' => 'Pengaruh Perlakuan Priming terhadap Daya Berkecambah Benih Padi',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_penelitian' => 'Aplikasi Teknik CRISPR-Cas9 dalam Pemuliaan Tanaman Tomat Tahan Penyakit',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_penelitian' => 'Identifikasi Gen Ketahanan terhadap Hama pada Tanaman Cabai menggunakan Analisis Genom',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_penelitian' => 'Pemuliaan Tanaman Cabai untuk Meningkatkan Kandungan Capsaicin',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_penelitian' => 'Evaluasi Keragaman Genetik Varietas Lokal Tomat di Indonesia',
                'tahun' => 2022,
            ],
            [
                'dosen_id' => $dosen[4]->id_dosen,
                'judul_penelitian' => 'Sistem Produksi Benih Padi Berkelanjutan dengan Teknologi Organik',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[5]->id_dosen,
                'judul_penelitian' => 'Pengembangan Metode Pengujian Mutu Benih yang Cepat dan Akurat',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[6]->id_dosen,
                'judul_penelitian' => 'Pemuliaan Tanaman Kelapa Sawit untuk Meningkatkan Produktivitas',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[7]->id_dosen,
                'judul_penelitian' => 'Pemuliaan Tanaman untuk Ketahanan terhadap Perubahan Iklim',
                'tahun' => 2024,
            ],
        ];

        foreach ($penelitian as $p) {
            Penelitian::create($p);
        }
    }
}

