@extends('layouts.main')

@section('title', 'Berita')

@section('content')
    <!-- Hero Section -->
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Berita dan Kegiatan PTB</h1>
            <p class="hero-subtitle">
                Temukan informasi terbaru seputar kegiatan, inovasi, dan kolaborasi dari Program Studi Pemuliaan Tanaman dan Teknologi Benih.
            </p>
            <div class="button-row">
                <a class="btn btn-primary" href="#kegiatan">Kegiatan Terkini</a>
                <a class="btn btn-light" href="#arsip">Arsip Berita</a>
            </div>
        </div>
    </section>

    <!-- Kegiatan Terkini -->
    <section id="kegiatan" class="section-card">
        <h2 class="section-header">Kegiatan Terkini</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Workshop">
                <div class="card-body">
                    <h3>Workshop Digital Farming</h3>
                    <p>Mahasiswa PTB mengadakan pelatihan penggunaan teknologi digital dalam sistem pertanian cerdas untuk meningkatkan efisiensi produksi.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80" alt="Field Trip">
                <div class="card-body">
                    <h3>Field Trip ke Lembaga Riset Pertanian</h3>
                    <p>Kunjungan lapangan ke Balai Penelitian Tanaman Pangan memberikan pengalaman langsung tentang inovasi benih unggul dan pemuliaan tanaman.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" alt="Konferensi">
                <div class="card-body">
                    <h3>Konferensi Nasional Teknologi Pertanian</h3>
                    <p>Dosen dan mahasiswa PTB berpartisipasi dalam konferensi nasional untuk mempresentasikan hasil penelitian inovatif di bidang pertanian presisi.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- Arsip Berita -->
    <section id="arsip" class="section-card">
        <h2 class="section-header">Arsip Berita</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80" alt="Inkubasi Startup">
                <div class="card-body">
                    <h3>Program Inkubasi Startup Pertanian</h3>
                    <p>Mahasiswa PTB terpilih dalam program inkubasi startup berbasis pertanian berkelanjutan yang mendukung inovasi teknologi hijau.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" alt="Pengabdian">
                <div class="card-body">
                    <h3>Pengabdian Masyarakat di Desa Mitra</h3>
                    <p>Kegiatan pengabdian masyarakat fokus pada pelatihan pemuliaan benih dan manajemen pertanian berbasis lingkungan di desa mitra binaan.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=800&q=80" alt="Kolaborasi Internasional">
                <div class="card-body">
                    <h3>Kolaborasi Internasional Riset Tanaman</h3>
                    <p>Kerja sama riset antara PTB dan universitas luar negeri dalam pengembangan varietas tanaman adaptif terhadap perubahan iklim.</p>
                </div>
            </article>
        </div>
    </section>
@endsection
