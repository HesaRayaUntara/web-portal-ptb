<?php

namespace Database\Seeders;

use App\Models\JenisKarya;
use Illuminate\Database\Seeder;

class JenisKaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        JenisKarya::truncate();

        $jenisKarya = [
            ['j_karya' => 'Jurnal Internasional'],
            ['j_karya' => 'Jurnal Nasional Terakreditasi'],
            ['j_karya' => 'Jurnal Nasional'],
            ['j_karya' => 'Prosiding Internasional'],
            ['j_karya' => 'Prosiding Nasional'],
            ['j_karya' => 'Buku'],
            ['j_karya' => 'Hak Cipta'],
            ['j_karya' => 'Paten'],
            ['j_karya' => 'Merek'],
            ['j_karya' => 'Desain Industri'],
        ];

        foreach ($jenisKarya as $karya) {
            JenisKarya::create($karya);
        }
    }
}

