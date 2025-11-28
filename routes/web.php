<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AdminAuthController;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Route Language Switch
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// Route Beranda (Home)
Route::get('/', function () {
    // Get latest 5 photos from gallery (only photos, not videos)
    $latestPhotos = Galeri::where('tipe', 'photo')
        ->with('kategori')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get()
        ->map(function ($item) {
            // Handle foto path - check if file exists in storage, otherwise use asset
            $imagePath = '';
            if ($item->foto) {
                $storagePath = storage_path('app/public/' . $item->foto);
                if (file_exists($storagePath)) {
                    $imagePath = Storage::url($item->foto);
                } else {
                    // Fallback to public asset if not in storage
                    $imagePath = asset($item->foto);
                }
            }
            
            return [
                'title' => $item->judul,
                'desc' => $item->deskripsi,
                'image' => $imagePath,
                'category' => $item->kategori ? $item->kategori->nama : 'Umum',
            ];
        });
    
    // Get latest 5 published news items sorted by publication date (newest first)
    $latestNews = Berita::where('status', 'published')
        ->with('kategori')
        ->orderBy('tanggal_publikasi', 'desc')
        ->take(5)
        ->get();
    
    // Get profil prodi data
    $profilProdi = \App\Models\ProfilProdi::with('profilLulusan')->first();
    
    // Get mitra data
    $mitra = \App\Models\Mitra::orderBy('created_at', 'desc')->get();
    
    return view('halaman-pengunjung.beranda', [
        'latestGalleryPhotos' => $latestPhotos,
        'latestNews' => $latestNews,
        'profilProdi' => $profilProdi,
        'mitra' => $mitra
    ]);
})->name('beranda');

// Route Profil
Route::get('/profil', function () {
    $profilProdi = \App\Models\ProfilProdi::with('profilLulusan')->first();
    $fasilitas = \App\Models\Fasilitas::orderBy('created_at', 'desc')->take(4)->get();
    $mitra = \App\Models\Mitra::orderBy('created_at', 'desc')->get();
    return view('halaman-pengunjung.profil.index', compact('profilProdi', 'fasilitas', 'mitra'));
})->name('profil');

// Route Fasilitas
Route::get('/fasilitas', function () {
    $fasilitas = \App\Models\Fasilitas::orderBy('created_at', 'desc')->get();
    return view('halaman-pengunjung.fasilitas.index', compact('fasilitas'));
})->name('fasilitas');

// Route Kurikulum
Route::get('/kurikulum', function () {
    $deskripsiKurikulum = \App\Models\DeskripsiKurikulum::first() ?? new \App\Models\DeskripsiKurikulum();
    return view('halaman-pengunjung.kurikulum.index', compact('deskripsiKurikulum'));
})->name('kurikulum');

// Route Detail Kurikulum
Route::get('/kurikulum/detail', function () {
    $kurikulum = \App\Models\Kurikulum::orderBy('semester')->orderBy('kode_mk')->get();
    $kurikulumBySemester = $kurikulum->groupBy('semester');
    return view('halaman-pengunjung.kurikulum.detail', compact('kurikulumBySemester'));
})->name('kurikulum.detail');

// Route Download PDF Kurikulum
Route::get('/kurikulum/download', [\App\Http\Controllers\KurikulumController::class, 'downloadPDF'])->name('kurikulum.download');

// Route Dosen
Route::get('/dosen', function () {
    $kepalaProdi = \App\Models\Dosen::where('kepala_program_studi', true)->first();
    
    // Ambil semua dosen termasuk kepala prodi, urutkan: kepala prodi dulu, lalu yang lain
    $dosenList = \App\Models\Dosen::orderByRaw('CASE WHEN kepala_program_studi = 1 THEN 0 ELSE 1 END')
        ->orderBy('nama', 'asc')
        ->get();
    
    // Pastikan semua dosen punya slug - hanya update jika benar-benar perlu
    // Jangan lakukan save() di dalam loop untuk menghindari multiple queries
    $dosenWithoutSlug = $dosenList->filter(function($dosen) {
        return empty($dosen->slug);
    });
    
    if ($dosenWithoutSlug->isNotEmpty()) {
        // Update slug untuk dosen yang belum punya slug (dilakukan di background, tidak blocking)
        // Untuk sekarang, kita hanya set di collection saja tanpa save ke database
        // Save akan dilakukan saat dosen di-edit atau dibuat ulang
        foreach ($dosenWithoutSlug as $dosen) {
            $dosen->slug = \Illuminate\Support\Str::slug($dosen->nama);
        }
    }
    
    return view('halaman-pengunjung.dosen.index', compact('kepalaProdi', 'dosenList'));
})->name('dosen');

// Route Staf
Route::get('/staf', function () {
    $staf = \App\Models\Staf::orderBy('created_at', 'asc')->get();
    return view('halaman-pengunjung.staf.index', compact('staf'));
})->name('staf');

// Route Detail Dosen
Route::get('/dosen/{slug}', function ($slug) {
    $dosen = \App\Models\Dosen::where('slug', $slug)->firstOrFail();
    
    // Get portofolio data
    $penelitian = $dosen->penelitian()->orderBy('tahun', 'desc')->get();
    $pengabdian = $dosen->pengabdian()->orderBy('tahun', 'desc')->get();
    $publikasi = $dosen->publikasi()->orderBy('tahun', 'desc')->get();
    $hki = $dosen->hki()->orderBy('tahun', 'desc')->get();
    
    return view('halaman-pengunjung.dosen.detail', compact('dosen', 'penelitian', 'pengabdian', 'publikasi', 'hki'));
})->name('dosen.detail');

Route::get('/berita', function () {
    $perPage = 9;
    $selectedCategory = request()->get('kategori');
    
    // Query berita yang sudah dipublikasikan
    $query = Berita::where('status', 'published')
        ->with('kategori')
        ->orderBy('tanggal_publikasi', 'desc');
    
    // Filter by category if selected
    if ($selectedCategory) {
        $query->whereHas('kategori', function($q) use ($selectedCategory) {
            $q->where('nama', $selectedCategory);
        });
    }
    
    // Get unique categories from published berita
    $categories = KategoriBerita::whereHas('berita', function($q) {
        $q->where('status', 'published');
    })->orderBy('nama')->pluck('nama')->toArray();
    
    // Paginate results
    $news = $query->paginate($perPage)->withQueryString();

    return view('halaman-pengunjung.berita.index', compact('news', 'categories'));
})->name('berita');

Route::get('/berita/{slug}', function (string $slug) {
    $berita = Berita::where('slug', $slug)
        ->where('status', 'published')
        ->with('kategori')
        ->firstOrFail();

    return view('halaman-pengunjung.berita.detail', compact('berita'));
})->name('berita.detail');

// Route Galeri
Route::get('/galeri', function () {
    $perPage = 12;
    $selectedCategory = request()->get('kategori');
    
    // Query galeri
    $query = Galeri::with('kategori')
        ->orderBy('created_at', 'desc');
    
    // Filter by category if selected
    if ($selectedCategory) {
        $query->whereHas('kategori', function($q) use ($selectedCategory) {
            $q->where('nama', $selectedCategory);
        });
    }
    
    // Get unique categories from galeri
    $categories = KategoriGaleri::whereHas('galeri')->orderBy('nama')->pluck('nama')->toArray();
    
    // Paginate results
    $gallery = $query->paginate($perPage)->withQueryString();

    return view('halaman-pengunjung.galeri.index', ['gallery' => $gallery, 'categories' => $categories]);
})->name('galeri');

// Route Kontak (jika ada linknya di menu/footer)
Route::get('/kontak', function () {
    return view('halaman-pengunjung.kontak');
})->name('kontak');

// Route Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route Admin Register (Hanya bisa diakses setelah login)
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    
    // Route Admin Edit
    Route::get('/admin/edit/{id}', [AdminAuthController::class, 'showEditForm'])->name('admin.edit');
    Route::put('/admin/edit/{id}', [AdminAuthController::class, 'update'])->name('admin.edit.submit');
    
    // Route Admin Management CRUD
    Route::get('/admin/manage', [\App\Http\Controllers\AdminManagementController::class, 'index'])->name('admin.manage.index');
    Route::post('/admin/manage', [\App\Http\Controllers\AdminManagementController::class, 'store'])->name('admin.manage.store');
    Route::put('/admin/manage/{id}', [\App\Http\Controllers\AdminManagementController::class, 'update'])->name('admin.manage.update');
    Route::delete('/admin/manage/{id}', [\App\Http\Controllers\AdminManagementController::class, 'destroy'])->name('admin.manage.destroy');
    
    // Route Log Activity
    Route::get('/admin/log-activity', [\App\Http\Controllers\AdminAuthController::class, 'getLogActivities'])->name('admin.log-activity');
});

// Route Admin Dashboard (protected)
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin', function () {
        $jumlahDosen = \App\Models\Dosen::count();
        $jumlahStaf = \App\Models\Staf::count();
        $jumlahBerita = \App\Models\Berita::count();
        $jumlahGaleri = \App\Models\Galeri::count();
        
        return view('halaman-admin.admin', compact('jumlahDosen', 'jumlahStaf', 'jumlahBerita', 'jumlahGaleri'));
    })->name('admin.dashboard');
    
    Route::resource('admin/profil', \App\Http\Controllers\ProfilProdiController::class)->parameters([
        'profil' => 'profilProdi'
    ])->names([
        'index' => 'admin.profil.index',
        'create' => 'admin.profil.create',
        'store' => 'admin.profil.store',
        'edit' => 'admin.profil.edit',
        'update' => 'admin.profil.update',
        'destroy' => 'admin.profil.destroy',
    ]);

    Route::resource('admin/profil-lulusan', \App\Http\Controllers\ProfilLulusanController::class)->except(['index'])->parameters([
        'profil-lulusan' => 'profilLulusan'
    ])->names([
        'create' => 'admin.profil-lulusan.create',
        'store' => 'admin.profil-lulusan.store',
        'edit' => 'admin.profil-lulusan.edit',
        'update' => 'admin.profil-lulusan.update',
        'destroy' => 'admin.profil-lulusan.destroy',
    ]);

    Route::resource('admin/mitra', \App\Http\Controllers\MitraController::class)->except(['index'])->parameters([
        'mitra' => 'mitra'
    ])->names([
        'create' => 'admin.mitra.create',
        'store' => 'admin.mitra.store',
        'edit' => 'admin.mitra.edit',
        'update' => 'admin.mitra.update',
        'destroy' => 'admin.mitra.destroy',
    ]);

    Route::get('admin/kurikulum/tambah', [\App\Http\Controllers\KurikulumController::class, 'create'])->name('admin.kurikulum.tambah');
    Route::get('admin/fasilitas/tambah', [\App\Http\Controllers\FasilitasController::class, 'create'])->name('admin.fasilitas.tambah');
    Route::get('admin/staf/tambah', [\App\Http\Controllers\StafController::class, 'create'])->name('admin.staf.tambah');
    Route::resource('admin/fasilitas', \App\Http\Controllers\FasilitasController::class)->except(['create'])->parameters([
        'fasilitas' => 'fasilitas'
    ])->names([
        'index' => 'admin.fasilitas.index',
        'store' => 'admin.fasilitas.store',
        'show' => 'admin.fasilitas.show',
        'edit' => 'admin.fasilitas.edit',
        'update' => 'admin.fasilitas.update',
        'destroy' => 'admin.fasilitas.destroy',
    ]);
    Route::resource('admin/staf', \App\Http\Controllers\StafController::class)->except(['create'])->names([
        'index' => 'admin.staf.index',
        'store' => 'admin.staf.store',
        'show' => 'admin.staf.show',
        'edit' => 'admin.staf.edit',
        'update' => 'admin.staf.update',
        'destroy' => 'admin.staf.destroy',
    ]);
    
    // Routes Admin Dosen
    Route::get('admin/dosen', [\App\Http\Controllers\AdminDosenController::class, 'index'])->name('admin.dosen.index');
    Route::get('admin/dosen/create', [\App\Http\Controllers\AdminDosenController::class, 'createDosen'])->name('admin.dosen.create');
    Route::get('admin/dosen/{dosen}/edit', [\App\Http\Controllers\AdminDosenController::class, 'editDosen'])->name('admin.dosen.edit');
    Route::post('admin/dosen', [\App\Http\Controllers\AdminDosenController::class, 'storeDosen'])->name('admin.dosen.storeDosen');
    Route::put('admin/dosen/{dosen}', [\App\Http\Controllers\AdminDosenController::class, 'updateDosen'])->name('admin.dosen.updateDosen');
    Route::delete('admin/dosen/{dosen}', [\App\Http\Controllers\AdminDosenController::class, 'destroyDosen'])->name('admin.dosen.destroyDosen');

    Route::post('admin/dosen/jenis-karya', [\App\Http\Controllers\JenisKaryaController::class, 'store'])->name('admin.dosen.storeJenisKarya');
    Route::delete('admin/dosen/jenis-karya/{jenisKarya}', [\App\Http\Controllers\JenisKaryaController::class, 'destroy'])->name('admin.dosen.destroyJenisKarya');

    Route::get('admin/dosen/penelitian/create', [\App\Http\Controllers\PenelitianController::class, 'create'])->name('admin.dosen.penelitian.create');
    Route::get('admin/dosen/penelitian/{penelitian}/edit', [\App\Http\Controllers\PenelitianController::class, 'edit'])->name('admin.dosen.penelitian.edit');
    Route::post('admin/dosen/penelitian', [\App\Http\Controllers\PenelitianController::class, 'store'])->name('admin.dosen.storePenelitian');
    Route::put('admin/dosen/penelitian/{penelitian}', [\App\Http\Controllers\PenelitianController::class, 'update'])->name('admin.dosen.updatePenelitian');
    Route::delete('admin/dosen/penelitian/{penelitian}', [\App\Http\Controllers\PenelitianController::class, 'destroy'])->name('admin.dosen.destroyPenelitian');

    Route::get('admin/dosen/pengabdian/create', [\App\Http\Controllers\PengabdianController::class, 'create'])->name('admin.dosen.pengabdian.create');
    Route::get('admin/dosen/pengabdian/{pengabdian}/edit', [\App\Http\Controllers\PengabdianController::class, 'edit'])->name('admin.dosen.pengabdian.edit');
    Route::post('admin/dosen/pengabdian', [\App\Http\Controllers\PengabdianController::class, 'store'])->name('admin.dosen.storePengabdian');
    Route::put('admin/dosen/pengabdian/{pengabdian}', [\App\Http\Controllers\PengabdianController::class, 'update'])->name('admin.dosen.updatePengabdian');
    Route::delete('admin/dosen/pengabdian/{pengabdian}', [\App\Http\Controllers\PengabdianController::class, 'destroy'])->name('admin.dosen.destroyPengabdian');

    Route::get('admin/dosen/publikasi/create', [\App\Http\Controllers\PublikasiController::class, 'create'])->name('admin.dosen.publikasi.create');
    Route::get('admin/dosen/publikasi/{publikasi}/edit', [\App\Http\Controllers\PublikasiController::class, 'edit'])->name('admin.dosen.publikasi.edit');
    Route::post('admin/dosen/publikasi', [\App\Http\Controllers\PublikasiController::class, 'store'])->name('admin.dosen.storePublikasi');
    Route::put('admin/dosen/publikasi/{publikasi}', [\App\Http\Controllers\PublikasiController::class, 'update'])->name('admin.dosen.updatePublikasi');
    Route::delete('admin/dosen/publikasi/{publikasi}', [\App\Http\Controllers\PublikasiController::class, 'destroy'])->name('admin.dosen.destroyPublikasi');

    Route::get('admin/dosen/hki/create', [\App\Http\Controllers\HkiController::class, 'create'])->name('admin.dosen.hki.create');
    Route::get('admin/dosen/hki/{hki}/edit', [\App\Http\Controllers\HkiController::class, 'edit'])->name('admin.dosen.hki.edit');
    Route::post('admin/dosen/hki', [\App\Http\Controllers\HkiController::class, 'store'])->name('admin.dosen.storeHki');
    Route::put('admin/dosen/hki/{hki}', [\App\Http\Controllers\HkiController::class, 'update'])->name('admin.dosen.updateHki');
    Route::delete('admin/dosen/hki/{hki}', [\App\Http\Controllers\HkiController::class, 'destroy'])->name('admin.dosen.destroyHki');
    
    Route::resource('admin/kurikulum', \App\Http\Controllers\KurikulumController::class)->except(['create'])->names([
        'index' => 'admin.kurikulum.index',
        'store' => 'admin.kurikulum.store',
        'edit' => 'admin.kurikulum.edit',
        'update' => 'admin.kurikulum.update',
        'destroy' => 'admin.kurikulum.destroy',
    ]);
    
    Route::post('admin/kurikulum/update-deskripsi', [\App\Http\Controllers\KurikulumController::class, 'updateDeskripsi'])->name('admin.kurikulum.updateDeskripsi');
    
    // Routes Admin Berita
    Route::get('admin/berita', [\App\Http\Controllers\BeritaController::class, 'index'])->name('admin.berita.index');
    Route::post('admin/berita/kategori', [\App\Http\Controllers\BeritaController::class, 'storeKategori'])->name('admin.berita.storeKategori');
    Route::delete('admin/berita/kategori/{kategoriBerita}', [\App\Http\Controllers\BeritaController::class, 'deleteKategori'])->name('admin.berita.deleteKategori');
    Route::post('admin/berita', [\App\Http\Controllers\BeritaController::class, 'storeBerita'])->name('admin.berita.storeBerita');
    Route::get('admin/berita/draft', [\App\Http\Controllers\BeritaController::class, 'draft'])->name('admin.berita.draft');
    Route::get('admin/berita/draft/{berita}/edit', [\App\Http\Controllers\BeritaController::class, 'editDraft'])->name('admin.berita.editDraft');
    Route::put('admin/berita/draft/{berita}', [\App\Http\Controllers\BeritaController::class, 'updateDraft'])->name('admin.berita.updateDraft');
    Route::get('admin/berita/{berita}/edit', [\App\Http\Controllers\BeritaController::class, 'editBerita'])->name('admin.berita.editBerita');
    Route::put('admin/berita/{berita}', [\App\Http\Controllers\BeritaController::class, 'updateBerita'])->name('admin.berita.updateBerita');
    Route::delete('admin/berita/{berita}', [\App\Http\Controllers\BeritaController::class, 'destroyBerita'])->name('admin.berita.destroyBerita');
    
    // Routes Admin Galeri
    Route::get('admin/galeri', [\App\Http\Controllers\AdminGaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('admin/galeri/kategori', [\App\Http\Controllers\AdminGaleriController::class, 'storeKategori'])->name('admin.galeri.storeKategori');
    Route::delete('admin/galeri/kategori/{kategoriGaleri}', [\App\Http\Controllers\AdminGaleriController::class, 'deleteKategori'])->name('admin.galeri.deleteKategori');
    Route::post('admin/galeri', [\App\Http\Controllers\AdminGaleriController::class, 'storeGaleri'])->name('admin.galeri.storeGaleri');
    Route::get('admin/galeri/{galeri}/edit', [\App\Http\Controllers\AdminGaleriController::class, 'editGaleri'])->name('admin.galeri.editGaleri');
    Route::put('admin/galeri/{galeri}', [\App\Http\Controllers\AdminGaleriController::class, 'updateGaleri'])->name('admin.galeri.updateGaleri');
    Route::delete('admin/galeri/{galeri}', [\App\Http\Controllers\AdminGaleriController::class, 'destroyGaleri'])->name('admin.galeri.destroyGaleri');
});