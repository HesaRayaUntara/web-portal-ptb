@extends('layouts.main')

@section('title', $item['title'])

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('berita') }}" class="transition hover:text-primary">Berita</a>
        <span> > </span>
        <span class="text-primaryDark">{{ $item['title'] }}</span>
    </nav>

    <article class="overflow-hidden rounded-section bg-white shadow-soft">
        <div class="relative">
            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-80 w-full object-cover">
            <div class="absolute inset-x-0 bottom-0 bg-black/70 p-6 text-white">
                <span class="text-xs uppercase tracking-widest text-white/80">Berita PTB</span>
                <h1 class="mt-2 text-3xl font-semibold md:text-4xl">{{ $item['title'] }}</h1>
                <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-white/80">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                        </svg>
                        {{ $item['author'] }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v18m10.5-18v18M4.5 7.5h15m-15 9h15" />
                        </svg>
                        {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="space-y-6 p-8 md:p-12">
            <p class="text-lg text-textMuted">{{ $item['desc'] }}</p>

            <div class="space-y-4 text-base leading-relaxed text-textDark">
                @foreach ($item['content'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="mt-10 flex flex-col gap-6 rounded-3xl border border-primary/20 bg-primary/5 p-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs tracking-wide4 text-primary">Penulis</p>
                    <p class="text-sm font-semibold text-textDark">{{ $item['author'] }}</p>
                    <p class="text-xs text-textMuted">Dipublikasikan pada {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y') }}</p>
                </div>
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                    Kembali ke Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            </div>
        </div>
    </article>
@endsection

