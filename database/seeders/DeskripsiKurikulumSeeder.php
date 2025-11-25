<?php

namespace Database\Seeders;

use App\Models\DeskripsiKurikulum;
use Illuminate\Database\Seeder;

class DeskripsiKurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DeskripsiKurikulum::truncate();

        DeskripsiKurikulum::create([
            'deskripsi_semester_1_2' => 'Pada semester 1-2, mahasiswa akan mendapatkan mata kuliah dasar yang membangun fondasi pengetahuan di bidang pertanian, biologi, kimia, matematika, dan statistika. Mata kuliah ini dirancang untuk memberikan pemahaman dasar yang kuat sebelum memasuki mata kuliah yang lebih spesifik di bidang pemuliaan tanaman dan teknologi benih.',
            'deskripsi_semester_3_4' => 'Semester 3-4 fokus pada pengenalan ilmu pemuliaan tanaman dan teknologi benih. Mahasiswa akan mempelajari dasar-dasar genetika, fisiologi tanaman, ekologi, dan pengantar teknologi benih. Mata kuliah ini memberikan landasan teoritis dan praktis untuk memahami proses pemuliaan tanaman dan pengelolaan benih.',
            'deskripsi_semester_5_6' => 'Pada semester 5-6, mahasiswa akan mendalami teknik-teknik pemuliaan tanaman modern, bioteknologi tanaman, pengujian mutu benih, dan manajemen produksi benih. Mata kuliah ini dirancang untuk mengembangkan keterampilan praktis dan analitis dalam bidang pemuliaan dan teknologi benih.',
            'deskripsi_semester_7_8' => 'Semester 7-8 merupakan tahap akhir dimana mahasiswa akan mengaplikasikan seluruh pengetahuan yang telah diperoleh melalui mata kuliah pilihan, magang industri, dan penyusunan skripsi. Mahasiswa juga akan mempelajari manajemen agribisnis benih, regulasi benih, dan kewirausahaan di bidang pertanian.',
        ]);
    }
}

