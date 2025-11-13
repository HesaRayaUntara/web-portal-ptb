@extends('layouts.main')

@section('title', 'Kurikulum')

@section('content')
    {{-- Hero Section --}}
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Struktur Kurikulum</h1>
            <p class="hero-subtitle">Rangkaian pembelajaran yang dirancang untuk mengembangkan kompetensi teknis dan profesional mahasiswa.</p>
        </div>
    </section>

    {{-- Struktur Kurikulum --}}
    <section class="section-card">
        <h2 class="section-header">Struktur Perkuliahan per Semester</h2>
        <div class="info-grid">
            <div class="info-badge">
                <strong>Semester 1–2</strong><br>
                Dasar-dasar sains, matematika, teknologi informasi, serta pengenalan rekayasa dan prinsip keteknikan.
            </div>
            <div class="info-badge">
                <strong>Semester 3–4</strong><br>
                Peningkatan kompetensi pada bidang pemrograman, sistem digital, elektronika, dan penerapan teknologi pertanian.
            </div>
            <div class="info-badge">
                <strong>Semester 5–6</strong><br>
                Penerapan teknologi berbasis proyek dan penelitian terapan, termasuk pengolahan data dan integrasi sistem.
            </div>
            <div class="info-badge">
                <strong>Semester 7–8</strong><br>
                Praktik kerja lapang, pengembangan inovasi teknologi, dan penyusunan tugas akhir berbasis riset atau produk.
            </div>
        </div>
    </section>

    {{-- Fokus Pembelajaran --}}
    <section class="section-card">
        <h2 class="section-header">Fokus dan Keunggulan Program</h2>
        <div class="highlight-grid">
            <div class="highlight-card">
                <h3>Presisi Teknologi</h3>
                <p>Mengintegrasikan teknologi presisi dalam bidang pertanian, termasuk sistem sensor, otomasi, dan Internet of Things (IoT).</p>
            </div>
            <div class="highlight-card">
                <h3>Pengolahan Data dan Sistem Pintar</h3>
                <p>Membekali mahasiswa dengan kemampuan mengolah data secara cerdas untuk mendukung pengambilan keputusan berbasis teknologi.</p>
            </div>
            <div class="highlight-card">
                <h3>Pemberdayaan Masyarakat</h3>
                <p>Mendorong penerapan teknologi tepat guna untuk meningkatkan efisiensi dan produktivitas masyarakat di bidang pertanian dan industri lokal.</p>
            </div>
        </div>
    </section>
@endsection
