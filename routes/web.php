<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('beritaItems')) {
    function beritaItems(): array
    {
        return [
            [
                'slug' => 'workshop-digital-farming',
                'title' => 'Workshop Digital Farming',
                'desc' => 'Mahasiswa PTB mengadakan pelatihan penggunaan teknologi digital dalam sistem pertanian cerdas untuk meningkatkan efisiensi produksi.',
                'image' => 'https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80',
                'author' => 'Tim Humas PTB',
                'date' => '2025-10-02',
                'content' => [
                    'Workshop ini menghadirkan pelaku industri serta peneliti teknologi pertanian yang memandu mahasiswa mengenal perangkat Internet of Things, sensor kelembapan tanah, dan dasbor analitik untuk pemantauan lahan secara real time.',
                    'Peserta mempraktikkan integrasi data lapangan dengan platform digital farming yang dikembangkan PTB sehingga mampu merancang keputusan budidaya berbasis data.',
                    'Kegiatan ditutup dengan sesi mentoring yang menekankan pentingnya literasi digital bagi calon agripreneur.',
                ],
            ],
            [
                'slug' => 'field-trip-lembaga-riset-pertanian',
                'title' => 'Field Trip ke Lembaga Riset Pertanian',
                'desc' => 'Kunjungan lapangan ke Balai Penelitian Tanaman Pangan memberikan pengalaman langsung tentang inovasi benih unggul dan pemuliaan tanaman.',
                'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
                'author' => 'Dr. Arini Wibowo',
                'date' => '2025-09-18',
                'content' => [
                    'Mahasiswa diajak meninjau laboratorium kultur jaringan, rumah kaca, serta plot demonstrasi untuk memahami tahapan seleksi galur dan uji adaptasi varietas.',
                    'Peneliti balai berbagi praktik terbaik mengenai kolaborasi kampus-industri dalam menghasilkan varietas unggul yang siap disebarkan ke petani mitra.',
                    'Field trip ini memperkaya wawasan tentang peluang riset bersama dan program magang terapan.',
                ],
            ],
            [
                'slug' => 'konferensi-nasional-teknologi-pertanian',
                'title' => 'Konferensi Nasional Teknologi Pertanian',
                'desc' => 'Dosen dan mahasiswa PTB berpartisipasi dalam konferensi nasional untuk mempresentasikan hasil penelitian inovatif di bidang pertanian presisi.',
                'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80',
                'author' => 'Prof. Lestari Widodo',
                'date' => '2025-08-30',
                'content' => [
                    'Delegasi PTB memaparkan riset tentang pemanfaatan drone multispektral untuk memantau kesehatan tanaman dan mengoptimalkan pemupukan variabel.',
                    'Kolaborasi lintas kampus dijajaki untuk pengembangan perangkat lunak open-source yang mendukung pengambilan keputusan agronomis.',
                    'Konferensi juga mengukuhkan komitmen PTB dalam memimpin inovasi pertanian presisi di tingkat nasional.',
                ],
            ],
            [
                'slug' => 'pelatihan-agribisnis-digital',
                'title' => 'Pelatihan Agribisnis Digital',
                'desc' => 'Peserta dilatih menggunakan platform digital untuk memasarkan produk pertanian dan mengelola rantai pasok.',
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
                'author' => 'Rahmat Pradipta',
                'date' => '2025-07-28',
                'content' => [
                    'Pelatihan membahas strategi branding, analitik penjualan, serta otomasi pemesanan melalui marketplace agribisnis.',
                    'Mahasiswa mengembangkan rencana bisnis yang memadukan produksi pangan lokal dengan kanal distribusi digital.',
                    'Mentor industri memberikan masukan tentang standar layanan pelanggan dan integrasi logistik dingin.',
                ],
            ],
            [
                'slug' => 'kolaborasi-riset-internasional',
                'title' => 'Kolaborasi Riset Internasional',
                'desc' => 'PTB menjalin kerja sama riset dengan universitas luar negeri untuk pengembangan teknologi pertanian presisi.',
                'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=800&q=80',
                'author' => 'Biro Kerja Sama PTB',
                'date' => '2025-07-05',
                'content' => [
                    'Kemitraan ini fokus pada pemanfaatan kecerdasan buatan untuk memprediksi kebutuhan nutrisi tanaman secara spesifik lokasi.',
                    'Tim gabungan akan melakukan pertukaran peneliti dan membuka akses terhadap fasilitas laboratorium canggih.',
                    'Diharapkan lahir publikasi bersama serta prototipe perangkat monitoring lahan berbiaya terjangkau.',
                ],
            ],
            [
                'slug' => 'inkubator-startup-pertanian',
                'title' => 'Peluncuran Inkubator Startup Pertanian',
                'desc' => 'Program inkubator baru diluncurkan untuk mendukung mahasiswa dalam membangun startup teknologi pertanian.',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80',
                'author' => 'Nur Azizah, S.P., M.M.',
                'date' => '2025-06-17',
                'content' => [
                    'Inkubator menyediakan pendampingan bisnis, akses mentor investor, serta fasilitas prototyping.',
                    'Batch perdana berfokus pada solusi pascapanen, marketplace komoditas, dan otomasi rumah kaca.',
                    'Program ini menargetkan lahirnya startup yang mampu memecahkan masalah rantai pasok pangan nasional.',
                ],
            ],
            [
                'slug' => 'festival-produk-hortikultura',
                'title' => 'Festival Produk Hortikultura',
                'desc' => 'Acara tahunan yang menampilkan produk hortikultura unggulan hasil penelitian dan praktik mahasiswa.',
                'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
                'author' => 'Panitia Festival',
                'date' => '2025-05-26',
                'content' => [
                    'Festival menghadirkan stan edukasi mengenai varietas buah tropis, sayuran hidroponik, dan bunga potong premium.',
                    'Pengunjung dapat mencicipi produk olahan hortikultura sekaligus mempelajari teknik budidaya ramah lingkungan.',
                    'Kegiatan ini menjadi ajang sinergi dengan UMKM lokal yang siap mengadopsi inovasi mahasiswa.',
                ],
            ],
            [
                'slug' => 'pelatihan-keselamatan-laboratorium',
                'title' => 'Pelatihan Keselamatan Laboratorium',
                'desc' => 'Pelatihan wajib bagi mahasiswa untuk memastikan prosedur keselamatan laboratorium terpenuhi.',
                'image' => 'https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80',
                'author' => 'Laboratorium PTB',
                'date' => '2025-05-12',
                'content' => [
                    'Materi meliputi penanganan bahan kimia, penggunaan APD, dan tata cara evakuasi darurat.',
                    'Instruktur menekankan pentingnya pencatatan sampel serta kalibrasi alat sebelum eksperimen.',
                    'Pelatihan berkala ini memastikan seluruh praktikum berjalan aman dan memenuhi standar mutu.',
                ],
            ],
            [
                'slug' => 'kuliah-tamu-teknologi-benih',
                'title' => 'Kuliah Tamu Teknologi Benih',
                'desc' => 'Pakar industri benih berbagi pengalaman tentang tantangan dan peluang di sektor perbenihan modern.',
                'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
                'author' => 'PT Semai Nusantara',
                'date' => '2025-04-22',
                'content' => [
                    'Kuliah tamu menyoroti kebutuhan transparansi rantai pasok benih dan penggunaan blockchain untuk pelacakan asal.',
                    'Mahasiswa diajak memahami standar sertifikasi benih serta strategi penetrasi pasar ekspor.',
                    'Sesi tanya jawab membuka peluang magang di pabrik pengolahan benih mitra.',
                ],
            ],
            [
                'slug' => 'program-pengabdian-desa-tangguh',
                'title' => 'Program Pengabdian Desa Tangguh',
                'desc' => 'Mahasiswa PTB mendampingi petani desa dalam menerapkan teknologi pertanian berkelanjutan.',
                'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=80',
                'author' => 'Tim Humas PTB',
                'date' => '2025-03-30',
                'content' => [
                    'Program memfokuskan pelatihan pembuatan pupuk hayati cair, manajemen air, dan perencanaan tanam adaptif iklim.',
                    'Pendampingan dilakukan selama tiga bulan hingga petani mandiri mengelola catatan produksi dan pemasaran.',
                    'Desa mitra kini memiliki model usaha tani hortikultura terpadu yang siap direplikasi.',
                ],
            ],
            [
                'slug' => 'kompetisi-inovasi-pangan-lokal',
                'title' => 'Kompetisi Inovasi Pangan Lokal',
                'desc' => 'Kompetisi untuk mengembangkan produk pangan lokal bernilai tambah dan siap dikomersialisasikan.',
                'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80',
                'author' => 'Komite Inovasi Pangan',
                'date' => '2025-03-12',
                'content' => [
                    'Peserta menampilkan formulasi produk berbasis umbi lokal, sorgum, dan rempah Nusantara.',
                    'Juri menilai aspek gizi, keberlanjutan bahan baku, hingga strategi pemasaran digital.',
                    'Pemenang memperoleh akses inkubasi bisnis dan fasilitasi perizinan PIRT.',
                ],
            ],
        ];
    }
}

// Route Language Switch
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// Route Beranda (Home)
Route::get('/', function () {
    // Get latest 5 photos from gallery (only photos, not videos)
    $allItems = collect(galeriItems());
    $latestPhotos = $allItems->filter(function ($item) {
        return $item['type'] === 'photo';
    })->take(5)->values();
    
    // Get latest 5 news items sorted by date (newest first)
    $allNews = collect(beritaItems());
    $latestNews = $allNews->sortByDesc('date')->take(5)->values();
    
    return view('pages.beranda', [
        'latestGalleryPhotos' => $latestPhotos,
        'latestNews' => $latestNews
    ]);
})->name('beranda');

// Route Profil
Route::get('/profil', function () {
    $profilProdi = \App\Models\ProfilProdi::first();
    return view('pages.profil', compact('profilProdi'));
})->name('profil');

// Route Fasilitas
Route::get('/fasilitas', function () {
    return view('pages.fasilitas');
})->name('fasilitas');

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
            'awards' => 'Environmental Excellence Award 2025',
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
    $perPage = 9;
    $currentPage = request()->get('page', 1);
    $items = collect(beritaItems());
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

Route::get('/berita/{slug}', function (string $slug) {
    $newsItem = collect(beritaItems())->firstWhere('slug', $slug);

    if (!$newsItem) {
        abort(404);
    }

    return view('pages.berita-detail', ['item' => $newsItem]);
})->name('berita.detail');

if (!function_exists('galeriItems')) {
    function galeriItems(): array
    {
        return [
            [
                'title' => 'Greenhouse Project',
                'desc' => 'Pengembangan sistem nutrisi otomatis untuk budidaya sayur dengan emisi rendah.',
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Riset',
                'youtube_url' => 'https://youtu.be/4qz9Lp8IjEI?si=0fvB9GxcR9rnOiHQ',
            ],
            [
                'title' => 'Harvest Day',
                'desc' => 'Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa. ',
                'image' => 'https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Kegiatan',
                'youtube_url' => 'https://youtu.be/oQiLdhINyqM?si=imALRBTNajfTSsao',
            ],
            [
                'title' => 'Community Outreach',
                'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Food Innovation Lab',
                'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Pameran',
            ],
            [
                'title' => 'Community Outreach',
                'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Food Innovation Lab',
                'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Pameran',
            ],
            [
                'title' => 'Harvest Day',
                'desc' => 'Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa.',
                'image' => 'https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Kegiatan',
                'youtube_url' => 'https://youtu.be/Y9GJzpU-7m4?si=oYxSS7dmSBCB0Eli',
            ],
            [
                'title' => 'Community Outreach',
                'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Greenhouse Project',
                'desc' => 'Pengembangan sistem nutrisi otomatis untuk budidaya sayur dengan emisi rendah.',
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Riset',
                'youtube_url' => 'https://youtu.be/4qz9Lp8IjEI?si=0fvB9GxcR9rnOiHQ',
            ],
            [
                'title' => 'Harvest Day',
                'desc' => 'Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa.',
                'image' => 'https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Kegiatan',
                'youtube_url' => 'https://youtu.be/oQiLdhINyqM?si=imALRBTNajfTSsao',
            ],
            [
                'title' => 'Community Outreach',
                'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Food Innovation Lab',
                'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Pameran',
            ],
            [
                'title' => 'Food Innovation Lab',
                'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Pameran',
            ],
            [
                'title' => 'Community Outreach',
                'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Food Innovation Lab',
                'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                'type' => 'photo',
                'category' => 'Pameran',
            ],
            [
                'title' => 'Harvest Day',
                'desc' => 'Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa.',
                'image' => 'https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80',
                'type' => 'video',
                'category' => 'Kegiatan',
                'youtube_url' => 'https://youtu.be/Y9GJzpU-7m4?si=oYxSS7dmSBCB0Eli',
            ],
        ];
    }
}

// Route Galeri
Route::get('/galeri', function () {
    $perPage = 12;
    $currentPage = request()->get('page', 1);
    $items = collect(galeriItems());
    $currentItems = $items->forPage($currentPage, $perPage)->values();

    $gallery = new LengthAwarePaginator(
        $currentItems,
        $items->count(),
        $perPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );

    return view('pages.galeri', ['gallery' => $gallery]);
})->name('galeri');

// Route Kontak (jika ada linknya di menu/footer)
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// Route Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route Admin Dashboard (protected)
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin-pages.admin');
    })->name('admin.dashboard');
    
    Route::resource('admin/profil', \App\Http\Controllers\ProfilProdiController::class)->names([
        'index' => 'admin.profil.index',
        'create' => 'admin.profil.create',
        'store' => 'admin.profil.store',
        'edit' => 'admin.profil.edit',
        'update' => 'admin.profil.update',
        'destroy' => 'admin.profil.destroy',
    ]);
});