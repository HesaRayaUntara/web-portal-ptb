<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use Illuminate\Pagination\LengthAwarePaginator;

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

// Route Detail Kurikulum
Route::get('/kurikulum/detail', function () {
    return view('pages.kurikulum-detail');
})->name('kurikulum.detail');

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

Route::get('/berita', function () {
    $newsItems = [
        [
            'title' => 'Workshop Digital Farming',
            'desc' => 'Mahasiswa PTB mengadakan pelatihan penggunaan teknologi digital dalam sistem pertanian cerdas untuk meningkatkan efisiensi produksi.',
            'image' => 'https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Field Trip ke Lembaga Riset Pertanian',
            'desc' => 'Kunjungan lapangan ke Balai Penelitian Tanaman Pangan memberikan pengalaman langsung tentang inovasi benih unggul dan pemuliaan tanaman.',
            'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Konferensi Nasional Teknologi Pertanian',
            'desc' => 'Dosen dan mahasiswa PTB berpartisipasi dalam konferensi nasional untuk mempresentasikan hasil penelitian inovatif di bidang pertanian presisi.',
            'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Seminar Inovasi Benih Unggul',
            'desc' => 'Seminar membahas inovasi terbaru dalam pengembangan benih unggul dan teknik pemuliaan tanaman modern.',
            'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Pelatihan Agribisnis Digital',
            'desc' => 'Peserta dilatih menggunakan platform digital untuk memasarkan produk pertanian dan mengelola rantai pasok.',
            'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Kolaborasi Riset Internasional',
            'desc' => 'PTB menjalin kerja sama riset dengan universitas luar negeri untuk pengembangan teknologi pertanian presisi.',
            'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Peluncuran Inkubator Startup Pertanian',
            'desc' => 'Program inkubator baru diluncurkan untuk mendukung mahasiswa dalam membangun startup teknologi pertanian.',
            'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Festival Produk Hortikultura',
            'desc' => 'Acara tahunan yang menampilkan produk hortikultura unggulan hasil penelitian dan praktik mahasiswa.',
            'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Pelatihan Keselamatan Laboratorium',
            'desc' => 'Pelatihan wajib bagi mahasiswa untuk memastikan prosedur keselamatan laboratorium terpenuhi.',
            'image' => 'https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Kuliah Tamu Teknologi Benih',
            'desc' => 'Pakar industri benih berbagi pengalaman tentang tantangan dan peluang di sektor perbenihan modern.',
            'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Program Pengabdian Desa Tangguh',
            'desc' => 'Mahasiswa PTB mendampingi petani desa dalam menerapkan teknologi pertanian berkelanjutan.',
            'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'title' => 'Kompetisi Inovasi Pangan Lokal',
            'desc' => 'Kompetisi untuk mengembangkan produk pangan lokal bernilai tambah dan siap dikomersialisasikan.',
            'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80',
        ],
    ];

    $perPage = 9;
    $currentPage = request()->get('page', 1);
    $items = collect($newsItems);
    $currentItems = $items->forPage($currentPage, $perPage)->values();

    $news = new LengthAwarePaginator(
        $currentItems,
        $items->count(),
        $perPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );

    return view('pages.berita', ['news' => $news]);
})->name('berita');

// Route Galeri
Route::get('/galeri', function () {
    return view('pages.galeri');
})->name('galeri');

// Route Kontak (jika ada linknya di menu/footer)
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');