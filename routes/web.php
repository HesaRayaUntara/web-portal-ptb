<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

// Route Language Switch
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// Route Beranda (Home)
Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

// Route Profil
Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

// Route Kurikulum
Route::get('/kurikulum', function () {
    return view('pages.kurikulum');
})->name('kurikulum');

// Route Dosen
Route::get('/dosen', function () {
    return view('pages.dosen');
})->name('dosen');

// Route Detail Dosen
Route::get('/dosen/{slug}', function ($slug) {
    $dosenData = [
        'ir-bagus-raharjo-msc' => [
            'name' => 'Ir. Bagus Raharjo, M.Sc.',
            'expertise' => 'Teknologi Irigasi Cerdas',
            'contact' => 'bagus.raharjo@ptb.ac.id',
            'position' => 'Dosen Tetap',
            'education' => 'S2 Teknik Irigasi - University of California, Davis',
            'research' => 'Smart Irrigation Systems & Water Management',
            'awards' => 'Best Research Paper Award 2023',
            'publications' => '12 jurnal internasional, 5 buku ajar',
            'description' => 'Spesialis dalam pengembangan sistem irigasi cerdas berbasis IoT untuk meningkatkan efisiensi penggunaan air di sektor pertanian. Memiliki pengalaman lebih dari 10 tahun dalam riset teknologi irigasi presisi dan manajemen sumber daya air berkelanjutan.',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80',
        ],
        'dr-nurma-hidayati-sp-msi' => [
            'name' => 'Dr. Nurma Hidayati, S.P., M.Si.',
            'expertise' => 'Keamanan Pangan & Nutrisi',
            'contact' => 'nurma.hidayati@ptb.ac.id',
            'position' => 'Dosen Tetap',
            'education' => 'S3 Ilmu Pangan - IPB University',
            'research' => 'Food Safety, Nutritional Analysis & Functional Foods',
            'awards' => 'Outstanding Researcher Award 2022',
            'publications' => '18 jurnal internasional, 3 paten',
            'description' => 'Ahli dalam analisis keamanan pangan dan pengembangan produk pangan fungsional. Fokus penelitian pada deteksi kontaminan pangan, fortifikasi nutrisi, dan pengembangan produk pangan sehat berbasis bahan lokal.',
            'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=800&q=80',
        ],
        'dr-cand-ardi-prakoso-sp-mp' => [
            'name' => 'Dr. (Cand.) Ardi Prakoso, S.P., M.P.',
            'expertise' => 'Agribisnis Digital',
            'contact' => 'ardi.prakoso@ptb.ac.id',
            'position' => 'Dosen Tetap',
            'education' => 'S3 Agribisnis (On-going) - Universitas Gadjah Mada',
            'research' => 'Digital Agriculture, E-commerce & Supply Chain Management',
            'awards' => 'Innovation Award 2023',
            'publications' => '8 jurnal internasional, 2 buku',
            'description' => 'Pakar dalam transformasi digital agribisnis dan pengembangan platform e-commerce untuk produk pertanian. Memiliki keahlian dalam manajemen rantai pasok digital dan analisis data untuk pengambilan keputusan bisnis pertanian.',
            'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80',
        ],
        'dr-silvi-lestari-sp-mp' => [
            'name' => 'Dr. Silvi Lestari, S.P., M.P.',
            'expertise' => 'Manajemen Sumber Daya Lahan',
            'contact' => 'silvi.lestari@ptb.ac.id',
            'position' => 'Dosen Tetap',
            'education' => 'S3 Ilmu Tanah - Bogor Agricultural University',
            'research' => 'Soil Management, Land Use Planning & Environmental Conservation',
            'awards' => 'Environmental Excellence Award 2024',
            'publications' => '15 jurnal internasional, 4 buku referensi',
            'description' => 'Spesialis dalam manajemen sumber daya lahan berkelanjutan dan konservasi tanah. Fokus pada pengembangan strategi penggunaan lahan yang optimal, rehabilitasi lahan terdegradasi, dan integrasi konservasi lingkungan dalam sistem pertanian.',
            'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=800&q=80',
        ],
    ];

    if (!isset($dosenData[$slug])) {
        abort(404);
    }

    return view('pages.detail-dosen', ['dosen' => $dosenData[$slug]]);
})->name('dosen.detail');

// Route Berita
Route::get('/berita', function () {
    return view('pages.berita');
})->name('berita');

// Route Galeri
Route::get('/galeri', function () {
    return view('pages.galeri');
})->name('galeri');

// Route Kontak (jika ada linknya di menu/footer)
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');