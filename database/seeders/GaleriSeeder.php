<?php

namespace Database\Seeders;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Galeri::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategoriKegiatanAkademik = KategoriGaleri::where('nama', 'Kegiatan Akademik')->first();
        $kategoriKegiatanMahasiswa = KategoriGaleri::where('nama', 'Kegiatan Mahasiswa')->first();
        $kategoriPenelitian = KategoriGaleri::where('nama', 'Penelitian')->first();
        $kategoriFasilitas = KategoriGaleri::where('nama', 'Fasilitas')->first();

        $galeri = [
            [
                'judul' => 'Praktikum Genetika Tanaman',
                'deskripsi' => 'Mahasiswa melakukan praktikum genetika tanaman di laboratorium.',
                'kategori_galeri_id' => $kategoriKegiatanAkademik ? $kategoriKegiatanAkademik->id_kategori_galeri : KategoriGaleri::first()->id_kategori_galeri,
                'tipe' => 'photo',
                'foto' => null,
                'youtube_url' => null,
            ],
            [
                'judul' => 'Kunjungan Industri ke Perusahaan Benih',
                'deskripsi' => 'Mahasiswa melakukan kunjungan industri ke perusahaan benih.',
                'kategori_galeri_id' => $kategoriKegiatanMahasiswa ? $kategoriKegiatanMahasiswa->id_kategori_galeri : KategoriGaleri::first()->id_kategori_galeri,
                'tipe' => 'photo',
                'foto' => null,
                'youtube_url' => null,
            ],
            [
                'judul' => 'Penelitian Varietas Padi Unggul',
                'deskripsi' => 'Tim peneliti melakukan penelitian pengembangan varietas padi unggul.',
                'kategori_galeri_id' => $kategoriPenelitian ? $kategoriPenelitian->id_kategori_galeri : KategoriGaleri::first()->id_kategori_galeri,
                'tipe' => 'photo',
                'foto' => null,
                'youtube_url' => null,
            ],
            [
                'judul' => 'Laboratorium Teknologi Benih',
                'deskripsi' => 'Fasilitas laboratorium teknologi benih yang dilengkapi dengan peralatan modern.',
                'kategori_galeri_id' => $kategoriFasilitas ? $kategoriFasilitas->id_kategori_galeri : KategoriGaleri::first()->id_kategori_galeri,
                'tipe' => 'photo',
                'foto' => null,
                'youtube_url' => null,
            ],
        ];

        foreach ($galeri as $g) {
            Galeri::create($g);
        }
    }
}

