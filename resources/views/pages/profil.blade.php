@extends('layouts.main')

@section('title', 'Profil Program Studi')

@section('content')
    {{-- Hero Section --}}
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Profil Program Studi</h1>
            <p class="hero-subtitle">Mengenal lebih dekat visi, filosofi, dan sarana pembelajaran yang membentuk karakter unggul mahasiswa.</p>
        </div>
    </section>

    {{-- Filosofi dan Nilai Dasar --}}
    <section class="section-card">
        <h2 class="section-header">Filosofi dan Nilai Dasar</h2>
        <p>
            Program studi ini berlandaskan pada semangat kolaborasi, inovasi, dan penerapan teknologi yang berorientasi pada keberlanjutan.
            Fokus utama kami adalah membentuk lulusan yang memiliki kemampuan berpikir kritis, etika kerja tinggi, serta kepedulian sosial.
        </p>
        <div class="highlight-grid" style="margin-top: 30px;">
            <div class="highlight-card">
                <h3>Nilai dan Etika</h3>
                <p>Kami menjunjung tinggi integritas, profesionalisme, serta tanggung jawab dalam setiap aspek pembelajaran dan penelitian.</p>
            </div>
            <div class="highlight-card">
                <h3>Pendekatan Pembelajaran</h3>
                <p>Penerapan metode berbasis proyek, studi kasus, dan kolaborasi lintas disiplin untuk meningkatkan pemahaman praktis mahasiswa.</p>
            </div>
            <div class="highlight-card">
                <h3>Kompetensi Lulusan</h3>
                <p>Lulusan dipersiapkan untuk menjadi inovator di bidang teknologi dan penggerak kemajuan masyarakat berbasis pengetahuan.</p>
            </div>
        </div>
    </section>

    {{-- Fasilitas Pembelajaran --}}
    <section class="section-card">
        <h2 class="section-header">Fasilitas dan Lingkungan Belajar</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1573497491765-dccce02b29df?auto=format&fit=crop&w=800&q=80" alt="Laboratorium Inovasi">
                <div class="card-body">
                    <h3>Laboratorium Inovasi</h3>
                    <p>Fasilitas modern untuk kegiatan penelitian dan pengembangan teknologi berbasis data dan otomasi.</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park">
                <div class="card-body">
                    <h3>Agro Tech Park</h3>
                    <p>Ruang praktik terbuka bagi mahasiswa untuk menerapkan teknologi pertanian presisi di lingkungan nyata.</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio">
                <div class="card-body">
                    <h3>Learning Studio</h3>
                    <p>Ruang belajar interaktif yang mendukung pembelajaran kolaboratif dan pengembangan ide kreatif mahasiswa.</p>
                </div>
            </article>
        </div>
    </section>
@endsection
