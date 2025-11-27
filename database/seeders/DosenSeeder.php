<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Dosen::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = [
            [
                'nama' => 'Prof. Dr. Ir. Ahmad Hidayat, M.S.',
                'slug' => Str::slug('Prof. Dr. Ir. Ahmad Hidayat, M.S.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Pemuliaan Tanaman Pangan, Genetika Kuantitatif',
                'pendidikan' => 'S3 - IPB University',
                'email' => 'ahmad.hidayat@university.ipb.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=VG6uEMMAAAAJ&hl=id',
                'kepala_program_studi' => true,
                'foto' => null,
            ],
            [
                'nama' => 'Dr. Ir. Siti Nurhaliza, M.P.',
                'slug' => Str::slug('Dr. Ir. Siti Nurhaliza, M.P.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Teknologi Benih, Fisiologi Benih',
                'pendidikan' => 'S3 - Universitas Gadjah Mada',
                'email' => 'siti.nurhaliza@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example2',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Dr. Ir. Budi Santoso, M.Si.',
                'slug' => Str::slug('Dr. Ir. Budi Santoso, M.Si.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Bioteknologi Tanaman, Pemuliaan Molekuler',
                'pendidikan' => 'S3 - Institut Pertanian Bogor',
                'email' => 'budi.santoso@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example3',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Dr. Ir. Dewi Sartika, M.P.',
                'slug' => Str::slug('Dr. Ir. Dewi Sartika, M.P.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Pemuliaan Tanaman Hortikultura, Genetika Tanaman',
                'pendidikan' => 'S3 - Universitas Padjadjaran',
                'email' => 'dewi.sartika@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example4',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Ir. Muhammad Rizki, M.Si.',
                'slug' => Str::slug('Ir. Muhammad Rizki, M.Si.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Produksi Benih, Manajemen Agribisnis Benih',
                'pendidikan' => 'S2 - Universitas Brawijaya',
                'email' => 'muhammad.rizki@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example5',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Dr. Ir. Indah Permata, M.P.',
                'slug' => Str::slug('Dr. Ir. Indah Permata, M.P.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Pengujian Mutu Benih, Sertifikasi Benih',
                'pendidikan' => 'S3 - IPB University',
                'email' => 'indah.permata@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example6',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Ir. Agus Wijaya, M.Si.',
                'slug' => Str::slug('Ir. Agus Wijaya, M.Si.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Pemuliaan Tanaman Perkebunan, Genetika Populasi',
                'pendidikan' => 'S2 - Universitas Gadjah Mada',
                'email' => 'agus.wijaya@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example7',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
            [
                'nama' => 'Dr. Ir. Ratna Sari, M.P.',
                'slug' => Str::slug('Dr. Ir. Ratna Sari, M.P.'),
                'status' => 'dosen tetap',
                'bidang_keahlian' => 'Ekologi Tanaman, Pemuliaan untuk Ketahanan',
                'pendidikan' => 'S3 - Institut Pertanian Bogor',
                'email' => 'ratna.sari@university.ac.id',
                'gsch' => 'https://scholar.google.com/citations?user=example8',
                'kepala_program_studi' => false,
                'foto' => null,
            ],
        ];

        foreach ($dosen as $d) {
            Dosen::create($d);
        }
    }
}

