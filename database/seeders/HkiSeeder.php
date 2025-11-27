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
            // Dosen 0 - Prof. Dr. Ir. Ahmad Hidayat, M.S. (7 HKI)
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Varietas Padi Tahan Kekeringan "PTB-1"', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Metode Seleksi Tanaman Jagung Berbasis Marker Molekuler', 'jenis_karya' => 'Paten', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Varietas Padi Unggul "PTB-Rice-2"', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Sistem Aplikasi Marker-Assisted Selection untuk Pemuliaan Tanaman', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Merek: "PTB Seed"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Varietas Jagung Hibrida "PTB-Corn-1"', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Desain Alat Seleksi Tanaman Berbasis Digital', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 1 - Dr. Ir. Siti Nurhaliza, M.P. (7 HKI)
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Aplikasi Mobile untuk Monitoring Kualitas Benih', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Sistem Penyimpanan Benih Berbasis IoT', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Metode Penyimpanan Benih dengan Teknologi Vakum', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Software Pengujian Viabilitas Benih Digital', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Merek: "SeedVault PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Alat Penyimpanan Benih dengan Kontrol Suhu Otomatis', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Desain Kemasan Benih dengan Sistem Kontrol Kelembaban', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 2 - Dr. Ir. Budi Santoso, M.Si. (7 HKI)
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Sistem Aplikasi CRISPR-Cas9 untuk Pemuliaan Tanaman Tomat', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Software Analisis Genom untuk Pemuliaan Tanaman', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Metode Editing Genom Tanaman dengan Teknologi CRISPR', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Aplikasi Mobile untuk Monitoring Kultur Jaringan', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Merek: "BioTech PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Varietas Tomat Tahan Penyakit "PTB-Tomato-1"', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Desain Alat Kultur Jaringan Portabel', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 3 - Dr. Ir. Dewi Sartika, M.P. (7 HKI)
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Varietas Cabai Unggul "PTB-Cabai-1"', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Varietas Tomat Lokal Unggul "PTB-Tomato-Local"', 'jenis_karya' => 'Paten', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Metode Seleksi Tanaman Sayuran Berbasis Karakter Morfologi', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Software Karakterisasi Varietas Lokal', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Merek: "HortiSeed PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Varietas Cabai dengan Kandungan Capsaicin Tinggi "PTB-Cabai-2"', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Desain Kemasan Benih Sayuran dengan Label Digital', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 4 - Ir. Muhammad Rizki, M.Si. (7 HKI)
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Sistem Manajemen Produksi Benih Berbasis Web', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Aplikasi Mobile untuk Manajemen Agribisnis Benih', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Sistem Rantai Pasok Benih Berbasis Blockchain', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Software Pemasaran Benih Online', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Merek: "AgriSeed PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Metode Produksi Benih Organik Berkelanjutan', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Desain Sistem Produksi Benih Terintegrasi', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 5 - Dr. Ir. Indah Permata, M.P. (7 HKI)
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Alat Pengujian Mutu Benih Portabel', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Software Pengujian Mutu Benih dengan AI', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Metode Pengujian Viabilitas Benih yang Cepat', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Aplikasi Mobile untuk Sertifikasi Benih', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Merek: "SeedTest PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Sistem Pengujian Mutu Benih Berbasis IoT', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Desain Alat Pengujian Benih Digital', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 6 - Ir. Agus Wijaya, M.Si. (7 HKI)
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Merek: "SeedTech PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Varietas Kelapa Sawit Unggul "PTB-OilPalm-1"', 'jenis_karya' => 'Paten', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Metode Pemuliaan Tanaman Perkebunan Berbasis Genetika Populasi', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Software Analisis Genetika Populasi untuk Perkebunan', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Varietas Karet Unggul "PTB-Rubber-1"', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Merek: "Perkebunan PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2022],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Desain Sistem Pemuliaan Tanaman Perkebunan', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
            
            // Dosen 7 - Dr. Ir. Ratna Sari, M.P. (7 HKI)
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Varietas Tanaman Adaptif Perubahan Iklim "PTB-Climate-1"', 'jenis_karya' => 'Paten', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Metode Seleksi Tanaman Tahan Kekeringan', 'jenis_karya' => 'Paten', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Software Monitoring Adaptasi Tanaman terhadap Iklim', 'jenis_karya' => 'Hak Cipta', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Varietas Padi Tahan Banjir "PTB-Flood-1"', 'jenis_karya' => 'Paten', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Merek: "ClimateSeed PTB"', 'jenis_karya' => 'Merek', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Metode Pemuliaan Tanaman untuk Ketahanan Stres Abiotik', 'jenis_karya' => 'Paten', 'tahun' => 2022],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Desain Sistem Monitoring Ketahanan Tanaman terhadap Iklim', 'jenis_karya' => 'Desain Industri', 'tahun' => 2024],
        ];

        foreach ($hki as $h) {
            Hki::create($h);
        }
    }
}

