<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        Kurikulum::truncate();

        $kurikulum = [
            // Semester 1
            ['semester' => 1, 'kode_mk' => 'PTB101', 'nama_mk' => 'Pengantar Ilmu Pertanian', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 1, 'kode_mk' => 'PTB102', 'nama_mk' => 'Biologi Umum', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 1, 'kode_mk' => 'PTB103', 'nama_mk' => 'Kimia Dasar', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 1, 'kode_mk' => 'PTB104', 'nama_mk' => 'Matematika Dasar', 'jenis_mk' => 'FC', 'sks_kuliah' => 3, 'sks_praktikum' => 0],
            ['semester' => 1, 'kode_mk' => 'PTB105', 'nama_mk' => 'Pendidikan Agama', 'jenis_mk' => 'FL', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 1, 'kode_mk' => 'PTB106', 'nama_mk' => 'Pendidikan Pancasila', 'jenis_mk' => 'FL', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            
            // Semester 2
            ['semester' => 2, 'kode_mk' => 'PTB201', 'nama_mk' => 'Botani', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 2, 'kode_mk' => 'PTB202', 'nama_mk' => 'Kimia Organik', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 2, 'kode_mk' => 'PTB203', 'nama_mk' => 'Fisika Dasar', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 2, 'kode_mk' => 'PTB204', 'nama_mk' => 'Statistika Dasar', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 2, 'kode_mk' => 'PTB205', 'nama_mk' => 'Bahasa Indonesia', 'jenis_mk' => 'FL', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 2, 'kode_mk' => 'PTB206', 'nama_mk' => 'Bahasa Inggris', 'jenis_mk' => 'FL', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            
            // Semester 3
            ['semester' => 3, 'kode_mk' => 'PTB301', 'nama_mk' => 'Genetika', 'jenis_mk' => 'FC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 3, 'kode_mk' => 'PTB302', 'nama_mk' => 'Fisiologi Tanaman', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 3, 'kode_mk' => 'PTB303', 'nama_mk' => 'Ekologi Tanaman', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 3, 'kode_mk' => 'PTB304', 'nama_mk' => 'Pengantar Teknologi Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 3, 'kode_mk' => 'PTB305', 'nama_mk' => 'Ilmu Tanah', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 3, 'kode_mk' => 'PTB306', 'nama_mk' => 'Agroklimatologi', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            
            // Semester 4
            ['semester' => 4, 'kode_mk' => 'PTB401', 'nama_mk' => 'Genetika Kuantitatif', 'jenis_mk' => 'IC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 4, 'kode_mk' => 'PTB402', 'nama_mk' => 'Dasar-Dasar Pemuliaan Tanaman', 'jenis_mk' => 'IC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 4, 'kode_mk' => 'PTB403', 'nama_mk' => 'Fisiologi Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 4, 'kode_mk' => 'PTB404', 'nama_mk' => 'Pengujian Mutu Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 4, 'kode_mk' => 'PTB405', 'nama_mk' => 'Hama dan Penyakit Tanaman', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 4, 'kode_mk' => 'PTB406', 'nama_mk' => 'Metodologi Penelitian', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            
            // Semester 5
            ['semester' => 5, 'kode_mk' => 'PTB501', 'nama_mk' => 'Pemuliaan Tanaman Pangan', 'jenis_mk' => 'IC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 5, 'kode_mk' => 'PTB502', 'nama_mk' => 'Pemuliaan Tanaman Hortikultura', 'jenis_mk' => 'IC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 5, 'kode_mk' => 'PTB503', 'nama_mk' => 'Bioteknologi Tanaman', 'jenis_mk' => 'IC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 5, 'kode_mk' => 'PTB504', 'nama_mk' => 'Produksi Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 3, 'sks_praktikum' => 1],
            ['semester' => 5, 'kode_mk' => 'PTB505', 'nama_mk' => 'Pengolahan dan Penyimpanan Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 5, 'kode_mk' => 'PTB506', 'nama_mk' => 'Statistika Terapan', 'jenis_mk' => 'FC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            
            // Semester 6
            ['semester' => 6, 'kode_mk' => 'PTB601', 'nama_mk' => 'Pemuliaan Tanaman Perkebunan', 'jenis_mk' => 'IC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 6, 'kode_mk' => 'PTB602', 'nama_mk' => 'Pemuliaan Tanaman untuk Ketahanan', 'jenis_mk' => 'IC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 6, 'kode_mk' => 'PTB603', 'nama_mk' => 'Sertifikasi dan Regulasi Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 6, 'kode_mk' => 'PTB604', 'nama_mk' => 'Manajemen Agribisnis Benih', 'jenis_mk' => 'ACC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 6, 'kode_mk' => 'PTB605', 'nama_mk' => 'Kewirausahaan', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            ['semester' => 6, 'kode_mk' => 'PTB606', 'nama_mk' => 'Pemuliaan Tanaman Pilihan', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 6, 'kode_mk' => 'PTB607', 'nama_mk' => 'Teknologi Pasca Panen Benih', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            
            // Semester 7
            ['semester' => 7, 'kode_mk' => 'PTB701', 'nama_mk' => 'Magang Industri', 'jenis_mk' => 'ACC', 'sks_kuliah' => 0, 'sks_praktikum' => 4],
            ['semester' => 7, 'kode_mk' => 'PTB702', 'nama_mk' => 'Pemuliaan Tanaman Modern', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 7, 'kode_mk' => 'PTB703', 'nama_mk' => 'Genomika dan Bioinformatika', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 1],
            ['semester' => 7, 'kode_mk' => 'PTB704', 'nama_mk' => 'Pengelolaan Sumber Daya Genetik', 'jenis_mk' => 'EC', 'sks_kuliah' => 2, 'sks_praktikum' => 0],
            
            // Semester 8
            ['semester' => 8, 'kode_mk' => 'PTB801', 'nama_mk' => 'Skripsi', 'jenis_mk' => 'FYP', 'sks_kuliah' => 0, 'sks_praktikum' => 6],
        ];

        foreach ($kurikulum as $mk) {
            Kurikulum::create($mk);
        }
    }
}

