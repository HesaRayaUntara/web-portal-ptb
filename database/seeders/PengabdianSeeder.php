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
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_pengabdian' => 'Pelatihan Teknologi Benih untuk Kelompok Tani di Desa Sukamaju',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[0]->id_dosen,
                'judul_pengabdian' => 'Pendampingan Pengembangan Varietas Lokal Padi di Kecamatan Tanjung Sari',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[1]->id_dosen,
                'judul_pengabdian' => 'Sosialisasi Teknologi Penyimpanan Benih untuk Petani di Desa Makmur',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[2]->id_dosen,
                'judul_pengabdian' => 'Workshop Bioteknologi Tanaman untuk Guru SMA di Kabupaten Bogor',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[3]->id_dosen,
                'judul_pengabdian' => 'Program Pemberdayaan Petani dalam Produksi Benih Cabai Berkualitas',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[4]->id_dosen,
                'judul_pengabdian' => 'Pelatihan Manajemen Agribisnis Benih untuk UMKM',
                'tahun' => 2023,
            ],
            [
                'dosen_id' => $dosen[5]->id_dosen,
                'judul_pengabdian' => 'Edukasi Pengujian Mutu Benih untuk Petani Benih',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[6]->id_dosen,
                'judul_pengabdian' => 'Konsultasi Teknis Pemuliaan Tanaman untuk Perusahaan Benih',
                'tahun' => 2024,
            ],
            [
                'dosen_id' => $dosen[7]->id_dosen,
                'judul_pengabdian' => 'Program Adaptasi Varietas Tanaman terhadap Perubahan Iklim',
                'tahun' => 2024,
            ],
        ];

        foreach ($pengabdian as $p) {
            Pengabdian::create($p);
        }
    }
}

