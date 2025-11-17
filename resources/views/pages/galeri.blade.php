@extends('layouts.main')

@section('title', 'Galeri')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('galeri') }}" class="transition hover:text-primary text-primaryDark">Galeri</a>
    </nav>

    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Galeri</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Galeri Kegiatan</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Dokumentasi kegiatan, riset lapang, dan karya mahasiswa yang menggambarkan dinamika pembelajaran di PTB.</p>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Sorotan</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Momen Terbaik</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ([
                [
                    'title' => 'Greenhouse Project',
                    'desc' => 'Pengembangan sistem nutrisi otomatis untuk budidaya sayur dengan emisi rendah.',
                    'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Community Outreach',
                    'desc' => 'Kolaborasi mahasiswa dengan petani lokal dalam menerapkan teknologi irigasi tetes.',
                    'image' => 'https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Food Innovation Lab',
                    'desc' => 'Pameran hasil penelitian produk pangan fungsional karya mahasiswa PTB.',
                    'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Harvest Day',
                    'desc' => 'Panen raya bersama komunitas mitra sebagai bagian dari program regenerasi desa.',
                    'image' => 'https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80',
                ],
            ] as $item)
                <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-44 w-full object-cover">
                    <div class="space-y-3 p-6">
                        <h3 class="text-lg font-semibold text-textDark">{{ $item['title'] }}</h3>
                        <p class="text-sm text-textMuted">{{ $item['desc'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Galeri Virtual</h2>
            <p class="text-sm leading-relaxed text-textMuted md:text-base">
                Jelajahi lebih banyak dokumentasi kegiatan melalui kanal digital kami. Gunakan pencarian untuk menemukan kegiatan spesifik, lokasi riset, atau kolaborasi dengan mitra industri.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark"
                   href="https://maps.app.goo.gl/vEXfeLcF2XWido3B7" target="_blank">Kunjungi Galeri 360°</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-primary/20 px-6 py-3 text-sm font-semibold text-primary transition hover:-translate-y-0.5 hover:border-primary"
                   href="#">Unduh Katalog</a>
            </div>
        </div>
    </section>
@endsection
