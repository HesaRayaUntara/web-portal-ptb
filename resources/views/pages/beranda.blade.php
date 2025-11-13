@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1518976024611-28bf4b48222e?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Selamat Datang Di Portal Web PTB</h1>
            <p class="hero-subtitle">
                Mengembangkan pendidikan pertanian terapan yang inovatif, berkelanjutan, dan berdampak bagi masyarakat luas dan Indonesia.
            </p>
            <div class="button-row">
                <a class="btn btn-primary" href="{{ route('profil') }}">Kenali Program Studi</a>
                <a class="btn btn-light" href="{{ route('berita') }}">Lihat Berita</a>
            </div>
        </div>
    </section>

    <!-- Profil Program Studi -->
    <section class="section-card">
        <h2 class="section-header">Profil Program Studi</h2>
        <div class="profile-wrapper">
            <div class="profile-info">
                <h2>Program Studi PTB</h2>
                <span>Pemuliaan Tanaman dan Teknologi Benih</span>
                <p>
                    Program Studi PTB mempersiapkan lulusan yang mampu merancang, mengaplikasikan, dan mengevaluasi teknologi pertanian
                    berkelanjutan melalui pembelajaran berbasis proyek, kerja lapang, dan kolaborasi lintas disiplin.
                </p>

                <div class="info-grid">
                    <div class="info-badge">
                        <strong>8 Semester</strong><br>
                        Lama studi reguler
                    </div>
                    <div class="info-badge">
                        <strong>Profesional</strong><br>
                        Magang industri & komunitas
                    </div>
                    <div class="info-badge">
                        <strong>Visi</strong><br>
                        Menjadi program keahlian unggulan dalam menghasilkan tenaga ahli madya yang berintegritas tinggi, berjiwa wirausaha, dan berkompeten dalam kegiatan industry benih tanaman pertanian tropika.
                    </div>
                    <div class="info-badge">
                        <strong>Misi</strong><br>
                         1. Menyelenggarakan pendidikan keahlian yang berkualitas dan profesional dalam bidang teknologi industri benih.
                       <br> 2. Melaksanakan penelitian terapan dalam bidang teknologi benih untuk mendukung pengembangan industri benih.
                       <br> 3. Melakukan pengabdian kepada masyarakat melalui penyebarluasan teknologi terapan dalam bidang industri benih.
                    </div>
                </div>
            </div>

            <div class="profile-photo" style="background-image: url('https://sv.ipb.ac.id/wp-content/uploads/2021/12/deskripsi-tib.png');">
            </div>
        </div>
    </section>

    <!-- Berita Harian -->
    <section class="section-card">
        <h2 class="section-header">Berita Harian</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80" alt="Kegiatan berkebun">
                <div class="card-body">
                    <h3>Gardening With Us</h3>
                    <p>Mahasiswa berkolaborasi dengan mitra desa untuk membangun kebun hidroponik komunitas.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=800&q=80" alt="Penelitian PTB">
                <div class="card-body">
                    <h3>Riset Teknologi Pangan</h3>
                    <p>Pengembangan produk pangan fungsional rendah emisi berhasil meraih pendanaan inkubasi.</p>
                </div>
            </article>

            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Pelatihan Petani">
                <div class="card-body">
                    <h3>Pelatihan Petani Mitra</h3>
                    <p>Workshop digital farming untuk petani mitra menghasilkan peningkatan produktivitas 25%.</p>
                </div>
            </article>
        </div>
    </section>
@endsection
