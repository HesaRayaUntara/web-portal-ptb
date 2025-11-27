<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Berita::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategoriBerita = KategoriBerita::first();
        $kategoriKegiatan = KategoriBerita::where('nama', 'Kegiatan')->first();
        $kategoriPrestasi = KategoriBerita::where('nama', 'Prestasi')->first();
        $kategoriPengumuman = KategoriBerita::where('nama', 'Pengumuman')->first();

        $berita = [
            [
                'judul' => 'Workshop Digital Farming untuk Mahasiswa PTB',
                'isi' => 'Program Studi Pemuliaan Tanaman dan Teknologi Benih (PTB) mengadakan workshop Digital Farming yang diikuti oleh mahasiswa semester 5 dan 7.',
                'kategori_berita_id' => $kategoriKegiatan ? $kategoriKegiatan->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Workshop Digital Farming untuk Mahasiswa PTB'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->subDays(5),
                'status' => 'published',
            ],
            [
                'judul' => 'Mahasiswa PTB Raih Juara 1 Lomba Karya Tulis Ilmiah Nasional',
                'isi' => 'Mahasiswa Program Studi PTB berhasil meraih juara 1 dalam Lomba Karya Tulis Ilmiah Nasional.',
                'kategori_berita_id' => $kategoriPrestasi ? $kategoriPrestasi->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Mahasiswa PTB Raih Juara 1 Lomba Karya Tulis Ilmiah Nasional'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->subDays(10),
                'status' => 'published',
            ],
            [
                'judul' => 'Pengumuman Pendaftaran Magang Industri',
                'isi' => 'Diberitahukan kepada seluruh mahasiswa Program Studi PTB bahwa pendaftaran magang industri akan dibuka.',
                'kategori_berita_id' => $kategoriPengumuman ? $kategoriPengumuman->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Program Studi PTB',
                'slug' => Str::slug('Pengumuman Pendaftaran Magang Industri'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->subDays(2),
                'status' => 'published',
            ],
        ];

        foreach ($berita as $b) {
            Berita::create($b);
        }
    }
}

