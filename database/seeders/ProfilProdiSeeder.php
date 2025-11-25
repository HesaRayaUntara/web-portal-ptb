<?php

namespace Database\Seeders;

use App\Models\ProfilProdi;
use App\Models\ProfilLulusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Hapus data lama jika ada
        ProfilLulusan::truncate();
        ProfilProdi::truncate();
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Buat data Profil Prodi
        $profilProdi = ProfilProdi::create([
            'deskripsi' => 'Program Studi Pemuliaan Tanaman dan Teknologi Benih (PTB) adalah program studi yang fokus pada pengembangan ilmu dan teknologi di bidang pemuliaan tanaman serta teknologi benih. Program studi ini dirancang untuk menghasilkan lulusan yang kompeten dalam mengembangkan varietas tanaman unggul dan mengelola teknologi benih yang berkualitas tinggi.',
            'visi' => 'Menjadi program studi unggulan di bidang Pemuliaan Tanaman dan Teknologi Benih yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global pada tahun 2030.',
            'misi' => '1. Menyelenggarakan pendidikan tinggi yang berkualitas di bidang Pemuliaan Tanaman dan Teknologi Benih
2. Melakukan penelitian yang inovatif dan bermanfaat bagi pengembangan ilmu pengetahuan dan teknologi
3. Melaksanakan pengabdian kepada masyarakat dalam bidang pemuliaan tanaman dan teknologi benih
4. Menjalin kerjasama dengan berbagai pihak untuk meningkatkan kualitas pendidikan, penelitian, dan pengabdian masyarakat
5. Mengembangkan karakter dan kepribadian mahasiswa yang berakhlak mulia dan berjiwa entrepreneur',
            'tujuan' => '1. Menghasilkan lulusan yang kompeten di bidang Pemuliaan Tanaman dan Teknologi Benih
2. Menghasilkan penelitian yang berkontribusi pada pengembangan ilmu pengetahuan dan teknologi
3. Meningkatkan kesejahteraan masyarakat melalui pengabdian yang dilakukan
4. Membangun jaringan kerjasama yang luas dengan berbagai pihak
5. Mengembangkan karakter dan kepribadian mahasiswa yang unggul',
            'lama_studi' => '4 Tahun (8 Semester)',
            'gelar_lulusan' => 'S.P.',
            'kepanjangan_gelar' => 'Sarjana Pertanian',
            'snbp_pelamar' => 250,
            'snbp_diterima' => 50,
            'snbp_keketatan' => 5.00,
            'snbt_pelamar' => 300,
            'snbt_diterima' => 50,
            'snbt_keketatan' => 6.00,
            'akreditasi' => 'A',
            'no_sk' => '123/SK/BAN-PT/Akred/S/VI/2024',
            'foto_akreditasi' => null,
            'industri_tempat_bekerja' => 'Lulusan Program Studi Pemuliaan Tanaman dan Teknologi Benih memiliki peluang kerja yang luas di berbagai sektor, antara lain:
- Perusahaan benih nasional dan internasional
- Balai Penelitian dan Pengembangan Pertanian
- Dinas Pertanian (Pemerintah Daerah)
- Perusahaan agribisnis dan agroindustri
- Lembaga penelitian dan pengembangan
- Wirausaha di bidang pertanian dan benih
- Konsultan pertanian
- Lembaga sertifikasi benih
- Perusahaan teknologi pertanian',
            'mitra_logo' => null,
        ]);

        // Buat data Profil Lulusan
        $profilLulusan = [
            [
                'peran' => 'Pemulia Tanaman',
                'deskripsi_kemampuan' => 'Mampu merancang dan melaksanakan program pemuliaan tanaman untuk menghasilkan varietas unggul dengan karakteristik yang diinginkan, menggunakan prinsip-prinsip genetika, bioteknologi, dan seleksi tanaman.',
            ],
            [
                'peran' => 'Teknolog Benih',
                'deskripsi_kemampuan' => 'Mampu mengelola teknologi benih mulai dari produksi, pengolahan, pengujian mutu, penyimpanan, hingga distribusi benih yang berkualitas tinggi sesuai standar nasional dan internasional.',
            ],
            [
                'peran' => 'Peneliti Pertanian',
                'deskripsi_kemampuan' => 'Mampu melakukan penelitian di bidang pemuliaan tanaman dan teknologi benih, menganalisis data penelitian, dan mengkomunikasikan hasil penelitian secara ilmiah.',
            ],
            [
                'peran' => 'Konsultan Pertanian',
                'deskripsi_kemampuan' => 'Mampu memberikan konsultasi dan solusi terkait pengembangan varietas tanaman, teknologi benih, dan permasalahan di bidang pertanian kepada berbagai pihak.',
            ],
            [
                'peran' => 'Wirausaha Agribisnis',
                'deskripsi_kemampuan' => 'Mampu mengembangkan dan mengelola usaha di bidang pertanian, khususnya produksi benih, pengembangan varietas, dan jasa teknologi pertanian dengan pendekatan bisnis yang berkelanjutan.',
            ],
        ];

        foreach ($profilLulusan as $lulusan) {
            ProfilLulusan::create([
                'profil_prodi_id' => $profilProdi->id_profil_prodi,
                'peran' => $lulusan['peran'],
                'deskripsi_kemampuan' => $lulusan['deskripsi_kemampuan'],
            ]);
        }
    }
}

 