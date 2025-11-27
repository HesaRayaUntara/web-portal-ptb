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

        // Draft berita
        $draftBerita = [
            [
                'judul' => 'Seminar Nasional Pemuliaan Tanaman Modern',
                'isi' => 'Program Studi PTB akan mengadakan seminar nasional tentang pemuliaan tanaman modern dengan menghadirkan pembicara dari berbagai institusi penelitian terkemuka. Seminar ini akan membahas teknologi terkini dalam pemuliaan tanaman dan aplikasinya dalam pengembangan varietas unggul.',
                'kategori_berita_id' => $kategoriKegiatan ? $kategoriKegiatan->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Seminar Nasional Pemuliaan Tanaman Modern'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->addDays(7),
                'status' => 'draft',
            ],
            [
                'judul' => 'Kerjasama Penelitian dengan Universitas Pertanian Internasional',
                'isi' => 'Program Studi PTB menandatangani nota kesepahaman dengan universitas pertanian internasional untuk kerjasama penelitian dan pertukaran mahasiswa. Kerjasama ini diharapkan dapat meningkatkan kualitas penelitian dan memperluas jaringan akademik.',
                'kategori_berita_id' => $kategoriKegiatan ? $kategoriKegiatan->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Kerjasama Penelitian dengan Universitas Pertanian Internasional'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->addDays(3),
                'status' => 'draft',
            ],
            [
                'judul' => 'Pengumuman Beasiswa Prestasi Semester Genap',
                'isi' => 'Program Studi PTB membuka pendaftaran beasiswa prestasi untuk semester genap. Beasiswa ini diperuntukkan bagi mahasiswa yang memiliki prestasi akademik dan non-akademik yang luar biasa. Pendaftaran dibuka mulai tanggal 1 Februari.',
                'kategori_berita_id' => $kategoriPengumuman ? $kategoriPengumuman->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Program Studi PTB',
                'slug' => Str::slug('Pengumuman Beasiswa Prestasi Semester Genap'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->addDays(5),
                'status' => 'draft',
            ],
            [
                'judul' => 'Peluncuran Program Inkubasi Startup Agritech',
                'isi' => 'Program Studi PTB meluncurkan program inkubasi startup agritech untuk mendukung mahasiswa dan alumni yang ingin mengembangkan bisnis di bidang teknologi pertanian. Program ini menyediakan mentoring, akses ke laboratorium, dan pendanaan awal.',
                'kategori_berita_id' => $kategoriKegiatan ? $kategoriKegiatan->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Peluncuran Program Inkubasi Startup Agritech'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->addDays(10),
                'status' => 'draft',
            ],
            [
                'judul' => 'Prestasi Mahasiswa PTB di Kompetisi Inovasi Benih Nasional',
                'isi' => 'Mahasiswa Program Studi PTB berhasil meraih juara 2 dalam Kompetisi Inovasi Benih Nasional yang diselenggarakan di Jakarta. Tim mahasiswa PTB mengembangkan teknologi pengemasan benih yang ramah lingkungan dan dapat meningkatkan daya simpan benih.',
                'kategori_berita_id' => $kategoriPrestasi ? $kategoriPrestasi->id_kategori_berita : $kategoriBerita->id_kategori_berita,
                'penulis' => 'Tim Humas PTB',
                'slug' => Str::slug('Prestasi Mahasiswa PTB di Kompetisi Inovasi Benih Nasional'),
                'image' => 'gambar/foto-dummy.jpg',
                'tanggal_publikasi' => Carbon::now()->addDays(1),
                'status' => 'draft',
            ],
        ];

        foreach ($berita as $b) {
            Berita::create($b);
        }

        foreach ($draftBerita as $db) {
            Berita::create($db);
        }
    }
}

