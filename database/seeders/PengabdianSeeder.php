<?php

namespace Database\Seeders;

use App\Models\Pengabdian;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengabdianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pengabdian::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = Dosen::all();
        
        if ($dosen->isEmpty()) {
            $this->command->warn('Tidak ada data dosen. Pastikan DosenSeeder dijalankan terlebih dahulu.');
            return;
        }

        $pengabdian = [
            // Dosen 0 - Prof. Dr. Ir. Ahmad Hidayat, M.S. (7 pengabdian)
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknologi Benih untuk Kelompok Tani di Desa Sukamaju', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Pendampingan Pengembangan Varietas Lokal Padi di Kecamatan Tanjung Sari', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Workshop Pemuliaan Tanaman untuk Petani di Desa Makmur', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Teknologi Marker-Assisted Selection untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Pemuliaan Tanaman Pangan', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknik Seleksi Tanaman untuk Meningkatkan Produktivitas', 'tahun' => 2022],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan Tanaman untuk Kelompok Tani', 'tahun' => 2024],
            
            // Dosen 1 - Dr. Ir. Siti Nurhaliza, M.P. (7 pengabdian)
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Teknologi Penyimpanan Benih untuk Petani di Desa Makmur', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknologi Benih Organik untuk Petani Muda', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Workshop Pengujian Mutu Benih untuk Petani Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Edukasi Teknik Penyimpanan Benih yang Benar untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Teknologi Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Pelatihan Fisiologi Benih untuk Kelompok Tani', 'tahun' => 2022],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Penyimpanan Benih untuk UMKM', 'tahun' => 2024],
            
            // Dosen 2 - Dr. Ir. Budi Santoso, M.Si. (7 pengabdian)
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Workshop Bioteknologi Tanaman untuk Guru SMA di Kabupaten Bogor', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknik Kultur Jaringan untuk Petani Muda', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Aplikasi Bioteknologi dalam Pertanian Modern', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Workshop Pemuliaan Molekuler untuk Mahasiswa dan Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Program Edukasi CRISPR-Cas9 untuk Komunitas Pertanian', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknik Editing Genom untuk Peneliti Muda', 'tahun' => 2022],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Bioteknologi Tanaman untuk Perusahaan', 'tahun' => 2024],
            
            // Dosen 3 - Dr. Ir. Dewi Sartika, M.P. (7 pengabdian)
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Produksi Benih Cabai Berkualitas', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Pelatihan Pemuliaan Tanaman Hortikultura untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Workshop Pengembangan Varietas Lokal Tomat dan Cabai', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Teknik Seleksi Tanaman Sayuran untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Produksi Benih Sayuran', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Pelatihan Karakterisasi Varietas Lokal untuk Komunitas', 'tahun' => 2022],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan Tanaman Hortikultura', 'tahun' => 2024],
            
            // Dosen 4 - Ir. Muhammad Rizki, M.Si. (7 pengabdian)
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Pelatihan Manajemen Agribisnis Benih untuk UMKM', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Workshop Produksi Benih Berkelanjutan untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Sistem Produksi Benih Organik untuk Kelompok Tani', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Pelatihan Manajemen Rantai Pasok Benih untuk UMKM', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan UMKM dalam Agribisnis Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Workshop Pemasaran Benih untuk Petani dan UMKM', 'tahun' => 2022],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Produksi Benih untuk Perusahaan', 'tahun' => 2024],
            
            // Dosen 5 - Dr. Ir. Indah Permata, M.P. (7 pengabdian)
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Edukasi Pengujian Mutu Benih untuk Petani Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Pelatihan Teknik Sertifikasi Benih untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Workshop Pengujian Mutu Benih dengan Metode Modern', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Standar Mutu Benih untuk Kelompok Tani', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Program Edukasi Pengujian Viabilitas Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Pelatihan Metode Pengujian Kemurnian Benih', 'tahun' => 2022],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Sertifikasi Benih untuk UMKM', 'tahun' => 2024],
            
            // Dosen 6 - Ir. Agus Wijaya, M.Si. (7 pengabdian)
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan Tanaman untuk Perusahaan Benih', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Pelatihan Pemuliaan Tanaman Perkebunan untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Workshop Pengembangan Varietas Tanaman Perkebunan', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Teknik Pemuliaan Kelapa Sawit untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Pemuliaan Perkebunan', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Pelatihan Genetika Populasi untuk Komunitas', 'tahun' => 2022],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan untuk Perusahaan Perkebunan', 'tahun' => 2024],
            
            // Dosen 7 - Dr. Ir. Ratna Sari, M.P. (7 pengabdian)
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Program Adaptasi Varietas Tanaman terhadap Perubahan Iklim', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Pelatihan Pemuliaan Tanaman Adaptif untuk Petani', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Workshop Ketahanan Tanaman terhadap Stres Iklim', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Varietas Tanaman Tahan Kekeringan', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Adaptasi Iklim', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Pelatihan Ekologi Tanaman untuk Komunitas', 'tahun' => 2022],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan untuk Ketahanan Iklim', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan untuk Ketahanan', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan untuk', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Konsultasi Teknis', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Varietas Tanaman Tahan', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Varietas Tanaman', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Varietas', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_pengabdian' => 'Sosialisasi Varietas Buah Naga', 'tahun' => 2023],
        ];

        foreach ($pengabdian as $p) {
            Pengabdian::create($p);
        }
    }
}

