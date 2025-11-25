<?php

namespace Database\Seeders;

use App\Models\KategoriGaleri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriGaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KategoriGaleri::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategori = [
            ['nama' => 'Kegiatan Akademik'],
            ['nama' => 'Kegiatan Mahasiswa'],
            ['nama' => 'Penelitian'],
            ['nama' => 'Pengabdian Masyarakat'],
            ['nama' => 'Fasilitas'],
            ['nama' => 'Workshop'],
            ['nama' => 'Seminar'],
            ['nama' => 'Umum'],
        ];

        foreach ($kategori as $kat) {
            KategoriGaleri::create($kat);
        }
    }
}

