<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        Fasilitas::truncate();

        $fasilitas = [
            [
                'nama_fasilitas' => 'Laboratorium Genetika dan Pemuliaan Tanaman',
                'deskripsi' => 'Laboratorium yang dilengkapi dengan peralatan modern untuk penelitian genetika tanaman.',
                'foto' => 'gambar/foto-dummy.jpg',
            ],
            [
                'nama_fasilitas' => 'Laboratorium Teknologi Benih',
                'deskripsi' => 'Laboratorium khusus untuk pengujian mutu benih yang dilengkapi dengan peralatan modern.',
                'foto' => 'gambar/foto-dummy.jpg',
            ],
            [
                'nama_fasilitas' => 'Laboratorium Bioteknologi Tanaman',
                'deskripsi' => 'Laboratorium bioteknologi yang dilengkapi dengan fasilitas kultur jaringan dan PCR.',
                'foto' => 'gambar/foto-dummy.jpg',
            ],
            [
                'nama_fasilitas' => 'Rumah Kaca (Greenhouse)',
                'deskripsi' => 'Fasilitas rumah kaca dengan sistem kontrol iklim otomatis untuk penelitian.',
                'foto' => 'gambar/foto-dummy.jpg',
            ],
        ];

        foreach ($fasilitas as $f) {
            Fasilitas::create($f);
        }
    }
}

