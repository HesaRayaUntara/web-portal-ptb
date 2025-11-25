<?php

namespace Database\Seeders;

use App\Models\Staf;
use Illuminate\Database\Seeder;

class StafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        Staf::truncate();

        $staf = [
            [
                'nama' => 'Siti Aisyah, S.P.',
                'jabatan' => 'Administrasi Akademik',
                'foto' => null,
            ],
            [
                'nama' => 'Bambang Setiawan, S.Kom.',
                'jabatan' => 'Teknisi Laboratorium',
                'foto' => null,
            ],
            [
                'nama' => 'Rina Wulandari, S.Pd.',
                'jabatan' => 'Administrasi Kemahasiswaan',
                'foto' => null,
            ],
            [
                'nama' => 'Ahmad Fauzi, S.T.',
                'jabatan' => 'Teknisi Lahan Percobaan',
                'foto' => null,
            ],
            [
                'nama' => 'Dewi Lestari, A.Md.',
                'jabatan' => 'Administrasi Keuangan',
                'foto' => null,
            ],
        ];

        foreach ($staf as $s) {
            Staf::create($s);
        }
    }
}

