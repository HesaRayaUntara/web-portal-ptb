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
            // Dosen 0 - Prof. Dr. Ir. Ahmad Hidayat, M.S. (7 penelitian)
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Padi Tahan Kekeringan dengan Pendekatan Marker-Assisted Selection', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Analisis Genetika Kuantitatif Karakter Agronomi pada Tanaman Jagung', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman untuk Meningkatkan Produktivitas dan Ketahanan terhadap Hama', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Identifikasi Gen Ketahanan terhadap Penyakit pada Tanaman Padi', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Evaluasi Keragaman Genetik Varietas Lokal Padi di Indonesia', 'tahun' => 2022],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Aplikasi Teknologi Molekuler dalam Pemuliaan Tanaman Pangan', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_penelitian' => 'Pengembangan Metode Seleksi Tanaman Berbasis Marker untuk Padi', 'tahun' => 2023],
            
            // Dosen 1 - Dr. Ir. Siti Nurhaliza, M.P. (7 penelitian)
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Optimasi Teknologi Penyimpanan Benih untuk Mempertahankan Viabilitas Jangka Panjang', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Pengaruh Perlakuan Priming terhadap Daya Berkecambah Benih Padi', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Studi Fisiologi Benih pada Berbagai Kondisi Penyimpanan', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Pengaruh Suhu dan Kelembaban terhadap Kualitas Benih Jagung', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Teknologi Pengawetan Benih dengan Metode Vakum', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Evaluasi Metode Pengujian Viabilitas Benih yang Cepat', 'tahun' => 2022],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_penelitian' => 'Pengaruh Perlakuan Benih terhadap Pertumbuhan Awal Tanaman', 'tahun' => 2024],
            
            // Dosen 2 - Dr. Ir. Budi Santoso, M.Si. (7 penelitian)
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Aplikasi Teknik CRISPR-Cas9 dalam Pemuliaan Tanaman Tomat Tahan Penyakit', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Identifikasi Gen Ketahanan terhadap Hama pada Tanaman Cabai menggunakan Analisis Genom', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Tanaman dengan Teknologi Editing Genom', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Studi Ekspresi Gen pada Tanaman yang Tahan Stres Abiotik', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Optimasi Teknik Kultur Jaringan untuk Perbanyakan Tanaman', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Aplikasi Bioteknologi dalam Pemuliaan Tanaman Hortikultura', 'tahun' => 2022],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_penelitian' => 'Pengembangan Protokol Regenerasi Tanaman melalui Kultur In Vitro', 'tahun' => 2024],
            
            // Dosen 3 - Dr. Ir. Dewi Sartika, M.P. (7 penelitian)
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Cabai untuk Meningkatkan Kandungan Capsaicin', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Evaluasi Keragaman Genetik Varietas Lokal Tomat di Indonesia', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Cabai Unggul dengan Kandungan Antioksidan Tinggi', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Sayuran untuk Ketahanan terhadap Penyakit', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Studi Karakterisasi Morfologi dan Genetik Varietas Lokal', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Tomat Tahan Layu Bakteri', 'tahun' => 2022],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Hortikultura untuk Adaptasi Iklim Tropis', 'tahun' => 2024],
            
            // Dosen 4 - Ir. Muhammad Rizki, M.Si. (7 penelitian)
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Sistem Produksi Benih Padi Berkelanjutan dengan Teknologi Organik', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Manajemen Produksi Benih untuk Meningkatkan Kualitas dan Kuantitas', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Pengembangan Sistem Agribisnis Benih yang Berkelanjutan', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Strategi Pemasaran Benih untuk Meningkatkan Daya Saing', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Evaluasi Rantai Pasok Benih dari Produsen ke Konsumen', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Pengembangan Model Bisnis Produksi Benih Skala Kecil', 'tahun' => 2022],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_penelitian' => 'Optimalisasi Produksi Benih dengan Teknologi Modern', 'tahun' => 2024],
            
            // Dosen 5 - Dr. Ir. Indah Permata, M.P. (7 penelitian)
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Pengembangan Metode Pengujian Mutu Benih yang Cepat dan Akurat', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Standarisasi Prosedur Sertifikasi Benih untuk Berbagai Komoditas', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Evaluasi Metode Pengujian Kemurnian Benih dengan Teknologi Digital', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Pengembangan Sistem Pengujian Mutu Benih Berbasis IoT', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Studi Akurasi Metode Pengujian Daya Berkecambah Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Pengaruh Kondisi Penyimpanan terhadap Kualitas Benih', 'tahun' => 2022],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_penelitian' => 'Pengembangan Protokol Pengujian Mutu Benih untuk Varietas Baru', 'tahun' => 2024],
            
            // Dosen 6 - Ir. Agus Wijaya, M.Si. (7 penelitian)
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Kelapa Sawit untuk Meningkatkan Produktivitas', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Tanaman Perkebunan yang Adaptif', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Studi Genetika Populasi pada Tanaman Perkebunan', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Karet untuk Meningkatkan Produksi Lateks', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Evaluasi Keragaman Genetik Varietas Kelapa Sawit', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Pengembangan Teknologi Pemuliaan untuk Tanaman Perkebunan', 'tahun' => 2022],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman Perkebunan untuk Ketahanan terhadap Penyakit', 'tahun' => 2024],
            
            // Dosen 7 - Dr. Ir. Ratna Sari, M.P. (7 penelitian)
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman untuk Ketahanan terhadap Perubahan Iklim', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Studi Ekologi Tanaman dalam Kondisi Stres Iklim', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Tanaman Adaptif terhadap Kekeringan', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Evaluasi Ketahanan Tanaman terhadap Cekaman Abiotik', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Pemuliaan Tanaman untuk Adaptasi terhadap Perubahan Suhu', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Studi Mekanisme Ketahanan Tanaman terhadap Stres Lingkungan', 'tahun' => 2022],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_penelitian' => 'Pengembangan Varietas Tanaman Tahan terhadap Banjir', 'tahun' => 2024],
        ];

        foreach ($penelitian as $p) {
            Penelitian::create($p);
        }
    }
}

