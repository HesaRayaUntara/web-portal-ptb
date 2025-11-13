@extends('layouts.main')

@section('title', 'Galeri')

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Galeri</h1>
            <p class="hero-subtitle">Dokumentasi kegiatan, riset lapang, dan karya mahasiswa yang menggambarkan dinamika pembelajaran di PTB.</p>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">Sorotan</h2>
        <div class="gallery-grid">
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80" alt="Budidaya sayur">
                <div class="card-body">
                    <h3>Greenhouse Project</h3>
                    <p>Pengembangan sistem nutrisi otomatis untuk budidaya sayur dengan emisi rendah.</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80" alt="Pelatihan petani">
                <div class="card-body">
                    <h3>Community Outreach</h3>
                    <p>Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80" alt="Produk pangan">
                <div class="card-body">
                    <h3>Food Innovation Lab</h3>
                    <p>Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80" alt="Panen raya">
                <div class="card-body">
                    <h3>Harvest Day</h3>
                    <p>Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">Galeri Virtual</h2>
        <p>Jelajahi lebih banyak dokumentasi kegiatan melalui kanal digital kami. Gunakan pencarian untuk menemukan kegiatan spesifik, lokasi riset, atau kolaborasi dengan mitra industri.</p>
        <div class="button-row" style="margin-top: 24px;">
            <a class="btn btn-primary" href="#">Kunjungi Galeri 360°</a>
            <a class="btn btn-light" href="#">Unduh Katalog</a>
        </div>
    </section>
@endsection
