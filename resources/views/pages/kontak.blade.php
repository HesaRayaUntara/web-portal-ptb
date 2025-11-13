@extends('layouts.main')

@section('title', 'Kontak Kami')

@section('content')
    {{-- Hero Section --}}
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Hubungi Kami</h1>
            <p class="hero-subtitle">Kami siap membantu menjawab pertanyaan dan kebutuhan Anda.</p>
        </div>
    </section>

    {{-- Informasi Kontak --}}
    <section class="section-card">
        <h2 class="section-header">Informasi Kontak</h2>
        <div class="info-grid">
            <div class="info-badge">
                <strong>Alamat</strong><br>Jl. Raya Pendidikan No. 45, Bogor, Jawa Barat
            </div>
            <div class="info-badge">
                <strong>Email</strong><br>info@ptb.ac.id
            </div>
            <div class="info-badge">
                <strong>Telepon</strong><br>(0251) 123-4567
            </div>
            <div class="info-badge">
                <strong>Jam Operasional</strong><br>Senin - Jumat, 08.00 - 16.00 WIB
            </div>
        </div>
    </section>

    {{-- Formulir Kontak --}}
    <section class="section-card">
        <h2 class="section-header">Kirim Pesan</h2>
        <form class="info-grid" style="gap: 20px;">
            <label>
                <span>Nama Lengkap</span>
                <input type="text" placeholder="Masukkan nama Anda" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7;">
            </label>
            <label>
                <span>Email</span>
                <input type="email" placeholder="Masukkan email Anda" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7;">
            </label>
            <label style="grid-column: 1 / -1;">
                <span>Pesan</span>
                <textarea rows="4" placeholder="Tulis pesan Anda di sini" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7; resize: vertical;"></textarea>
            </label>
            <div style="grid-column: 1 / -1; display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </section>
@endsection
