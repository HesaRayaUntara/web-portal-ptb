<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Seeder untuk Profil Prodi (sudah ada)
            ProfilProdiSeeder::class,
            
            // Seeder untuk kategori (harus dijalankan terlebih dahulu)
            KategoriBeritaSeeder::class,
            KategoriGaleriSeeder::class,
            JenisKaryaSeeder::class,
            
            // Seeder untuk Kurikulum
            DeskripsiKurikulumSeeder::class,
            KurikulumSeeder::class,
            
            // Seeder untuk Dosen (diperlukan sebelum Penelitian, Pengabdian, Publikasi, HKI)
            DosenSeeder::class,
            
            // Seeder untuk Berita dan Galeri (membutuhkan kategori)
            BeritaSeeder::class,
            GaleriSeeder::class,
            
            // Seeder untuk Fasilitas dan Staf
            FasilitasSeeder::class,
            StafSeeder::class,
            
            // Seeder untuk Mitra
            MitraSeeder::class,
            
            // Seeder untuk Penelitian, Pengabdian, Publikasi, dan HKI (membutuhkan Dosen)
            PenelitianSeeder::class,
            PengabdianSeeder::class,
            PublikasiSeeder::class,
            HkiSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
