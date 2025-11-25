<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KategoriBerita::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategori = [
            ['nama' => 'Berita'],
            ['nama' => 'Pengumuman'],
            ['nama' => 'Kegiatan'],
            ['nama' => 'Prestasi'],
            ['nama' => 'Kerjasama'],
            ['nama' => 'Umum'],
        ];

        foreach ($kategori as $kat) {
            KategoriBerita::create($kat);
        }
    }
}

