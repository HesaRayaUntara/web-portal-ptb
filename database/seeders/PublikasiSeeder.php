<?php

namespace Database\Seeders;

use App\Models\Publikasi;
use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Publikasi::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $dosen = Dosen::all();
        
        if ($dosen->isEmpty()) {
            $this->command->warn('Tidak ada data dosen. Pastikan DosenSeeder dijalankan terlebih dahulu.');
            return;
        }

        $publikasi = [
            // Dosen 0 - Prof. Dr. Ir. Ahmad Hidayat, M.S. (7 publikasi)
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Marker-Assisted Selection for Drought Tolerance in Rice: A Review', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Genetic Analysis of Agronomic Traits in Maize Hybrids', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Buku Ajar: Dasar-Dasar Pemuliaan Tanaman', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Quantitative Genetics in Plant Breeding: A Comprehensive Review', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Pangan untuk Ketahanan Pangan Nasional', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Prosiding: Marker-Assisted Selection dalam Pemuliaan Tanaman', 'jenis_karya' => 'Prosiding Internasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[0]->id_dosen, 'judul_karya' => 'Genome-Wide Association Study for Yield Traits in Rice', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 1 - Dr. Ir. Siti Nurhaliza, M.P. (7 publikasi)
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Optimasi Teknologi Penyimpanan Benih Padi untuk Mempertahankan Viabilitas', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Buku: Teknologi Benih Modern', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Pengaruh Perlakuan Priming terhadap Kualitas Benih Padi', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Seed Storage Technology: Current Advances and Future Perspectives', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Fisiologi Benih: Teori dan Aplikasi', 'jenis_karya' => 'Jurnal Nasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Prosiding: Teknologi Penyimpanan Benih untuk Ketahanan Pangan', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[1]->id_dosen, 'judul_karya' => 'Seed Viability and Longevity: A Comprehensive Study', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 2 - Dr. Ir. Budi Santoso, M.Si. (7 publikasi)
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Application of CRISPR-Cas9 Technology in Plant Breeding: Current Status and Future Prospects', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Genome-Wide Association Study for Disease Resistance in Chili Pepper', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Bioteknologi Tanaman: Prinsip dan Aplikasi', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Molecular Breeding in Crop Improvement', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Aplikasi Teknik Kultur Jaringan dalam Pemuliaan Tanaman', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Prosiding: CRISPR-Cas9 dalam Pemuliaan Tanaman Modern', 'jenis_karya' => 'Prosiding Internasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[2]->id_dosen, 'judul_karya' => 'Plant Tissue Culture: Techniques and Applications', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 3 - Dr. Ir. Dewi Sartika, M.P. (7 publikasi)
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Cabai untuk Meningkatkan Kandungan Capsaicin', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Keragaman Genetik Varietas Lokal Tomat di Indonesia', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Breeding for Enhanced Nutritional Quality in Vegetables', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Hortikultura: Teori dan Praktik', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Genetic Diversity of Local Tomato Varieties in Indonesia', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Prosiding: Pemuliaan Tanaman Sayuran untuk Ketahanan Penyakit', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[3]->id_dosen, 'judul_karya' => 'Horticultural Plant Breeding: Strategies and Challenges', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 4 - Ir. Muhammad Rizki, M.Si. (7 publikasi)
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Sistem Produksi Benih Padi Berkelanjutan', 'jenis_karya' => 'Jurnal Nasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Manajemen Agribisnis Benih: Strategi dan Implementasi', 'jenis_karya' => 'Buku', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Sustainable Seed Production Systems in Agriculture', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Pengembangan Rantai Pasok Benih untuk Meningkatkan Efisiensi', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Prosiding: Manajemen Produksi Benih Berkelanjutan', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Seed Supply Chain Management: A Comprehensive Approach', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[4]->id_dosen, 'judul_karya' => 'Agribisnis Benih: Peluang dan Tantangan di Era Modern', 'jenis_karya' => 'Jurnal Nasional', 'tahun' => 2024],
            
            // Dosen 5 - Dr. Ir. Indah Permata, M.P. (7 publikasi)
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Pengembangan Metode Pengujian Mutu Benih yang Cepat dan Akurat', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Seed Quality Testing: Methods and Standards', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Buku: Pengujian dan Sertifikasi Benih', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Rapid Seed Quality Assessment Using Digital Technology', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Standarisasi Prosedur Sertifikasi Benih di Indonesia', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Prosiding: Inovasi dalam Pengujian Mutu Benih', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[5]->id_dosen, 'judul_karya' => 'Seed Certification: Principles and Practices', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 6 - Ir. Agus Wijaya, M.Si. (7 publikasi)
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Kelapa Sawit: Strategi dan Tantangan', 'jenis_karya' => 'Prosiding Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Breeding Strategies for Perennial Crops: A Case Study of Oil Palm', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Perkebunan: Teori dan Aplikasi', 'jenis_karya' => 'Buku', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Population Genetics in Perennial Crop Breeding', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Pengembangan Varietas Kelapa Sawit Unggul di Indonesia', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Prosiding: Pemuliaan Tanaman Perkebunan untuk Produktivitas', 'jenis_karya' => 'Prosiding Nasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[6]->id_dosen, 'judul_karya' => 'Perennial Crop Breeding: Challenges and Opportunities', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            
            // Dosen 7 - Dr. Ir. Ratna Sari, M.P. (7 publikasi)
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Breeding for Climate Resilience in Crop Plants', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Pemuliaan Tanaman Adaptif: Teori dan Praktik', 'jenis_karya' => 'Buku', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Plant Adaptation to Climate Change: Breeding Strategies', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Ekologi Tanaman dalam Konteks Perubahan Iklim', 'jenis_karya' => 'Jurnal Nasional Terakreditasi', 'tahun' => 2023],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Prosiding: Pemuliaan Tanaman untuk Ketahanan Iklim', 'jenis_karya' => 'Prosiding Internasional', 'tahun' => 2022],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Climate-Resilient Crop Varieties: Development and Deployment', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
            ['dosen_id' => $dosen[7]->id_dosen, 'judul_karya' => 'Plant Stress Physiology: Mechanisms and Breeding Applications', 'jenis_karya' => 'Jurnal Internasional', 'tahun' => 2024],
        ];

        foreach ($publikasi as $p) {
            Publikasi::create($p);
        }
    }
}

