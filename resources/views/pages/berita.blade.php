@extends('layouts.main')

@section('title', 'Berita')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('berita') }}" class="transition hover:text-primary text-primaryDark">Berita</a>
    </nav>

    <!-- Hero Section -->
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Berita</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Berita dan Kegiatan PTB</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">
                Temukan informasi terbaru seputar kegiatan, inovasi, dan kolaborasi dari Program Studi Pemuliaan Tanaman dan Teknologi Benih.
            </p>
            <!-- <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-white px-6 py-3 text-sm font-semibold text-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-card"
                   href="#kegiatan">Kegiatan Terkini</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:border-white"
                   href="#arsip">Arsip Berita</a>
            </div> -->
        </div>
    </section>

    <!-- Kegiatan Terkini -->
    <section id="kegiatan" class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Berita Terkini</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Jejak Kegiatan</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-3 xl:grid-cols-3">
            @foreach ($news as $item)
                <a href="{{ route('berita.detail', $item['slug']) }}" class="group block h-full">
                    <article class="flex h-full flex-col overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                        <div class="relative">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-44 w-full object-cover transition duration-300 group-hover:scale-105">
                            <div class="absolute right-3 top-3 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-primaryDark shadow-soft">
                                {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <div class="flex flex-1 flex-col justify-between space-y-3 p-6">
                            <div>
                                <h3 class="text-lg font-semibold text-textDark group-hover:text-primary">{{ $item['title'] }}</h3>
                                <p class="mt-2 text-sm text-textMuted">{{ $item['desc'] }}</p>
                            </div>
                            <div class="flex items-center justify-between text-xs font-semibold text-textMuted/80">
                                <span class="flex items-center gap-2 text-textMuted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                                    </svg>
                                    {{ $item['author'] }}
                                </span>
                                <span class="text-primaryDark">{{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d M Y') }}</span>
                            </div>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>

        @if ($news->hasPages())
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center gap-2 rounded-full border border-primary/10 bg-white px-5 py-2 text-sm shadow-soft">
                    @foreach (range(1, $news->lastPage()) as $page)
                        <a
                            href="{{ $news->url($page) }}"
                            class="min-w-[36px] rounded-full px-3 py-1 text-center font-semibold transition
                                {{ $page == $news->currentPage() ? 'bg-primary text-white shadow-card' : 'text-textMuted hover:bg-primary/10 hover:text-primary' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </nav>
            </div>
        @endif
    </section>

    
@endsection
