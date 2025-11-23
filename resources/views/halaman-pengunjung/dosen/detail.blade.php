@extends('layouts.main')

@section('title', 'Detail Dosen - ' . $dosen['name'])

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('dosen') }}" class="transition hover:text-primary">Dosen</a>
        <span> > </span>
        <span class="text-primaryDark">{{ $dosen['name'] }}</span>
    </nav>

    <!-- Hero Section -->
    <section class="mb-8 rounded-section bg-white p-6 shadow-soft md:mb-6 md:p-8 lg:p-10">
        <div class="mx-auto max-w-5xl">
            <div class="grid gap-6 md:grid-cols-[1fr_1.5fr] md:items-center lg:gap-8">
                <div class="flex justify-center">
                    <div class="w-full max-w-[280px] overflow-hidden rounded-card shadow-soft">
                        <div class="relative w-full" style="padding-bottom: 133.33%;">
                            <img src="{{ $dosen['image'] }}" alt="{{ $dosen['name'] }}" class="absolute inset-0 h-full w-full object-cover">
                        </div>
                    </div>
                </div>
                <div class="space-y-5 text-center md:text-left">
                    <div>
                        <h1 class="text-2xl font-semibold text-secondary md:text-3xl">{{ $dosen['name'] }}</h1>
                        <span class="mt-2 inline-flex rounded-full bg-primary/15 px-4 py-1 text-sm font-semibold text-primary">{{ $dosen['position'] }}</span>
                    </div>
                    <div>
                        <h3 class="mb-2 text-base font-semibold text-textDark md:text-lg">Bidang Keahlian</h3>
                        <p class="text-sm text-textMuted md:text-base">{{ $dosen['expertise'] }}</p>
                    </div>
                    <div>
                        <h3 class="mb-2 text-base font-semibold text-textDark md:text-lg">Kontak</h3>
                        <a href="mailto:{{ $dosen['contact'] }}" class="text-sm text-primary transition hover:text-primaryDark md:text-base">{{ $dosen['contact'] }}</a>
                    </div>
                    <div>
                        <h3 class="mb-2 text-base font-semibold text-textDark md:text-lg">Tentang</h3>
                        <p class="text-sm leading-relaxed text-textMuted md:text-base">{{ $dosen['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Detail -->
    <section class="mb-8 rounded-section bg-white p-6 shadow-soft md:mb-6 md:p-8 lg:p-10">
        <div class="mx-auto max-w-5xl">
            <h2 class="mb-6 text-2xl font-semibold text-secondary md:text-3xl">Informasi Detail</h2>
            <div class="grid gap-3 sm:grid-cols-2">
                <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Pendidikan</span>
                    {{ $dosen['education'] }}
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Riset Aktif</span>
                    {{ $dosen['research'] }}
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Penghargaan</span>
                    {{ $dosen['awards'] }}
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Publikasi</span>
                    {{ $dosen['publications'] }}
                </div>
            </div>
        </div>
    </section>

    <!-- Back Button -->
    <div class="mb-8 flex justify-center">
        <a href="{{ route('dosen') }}" 
           class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-6 py-3 text-sm font-semibold text-primary transition hover:border-primary hover:bg-primary/5 hover:shadow-soft">
            <span aria-hidden="true"><</span>
            Kembali ke Daftar Dosen
        </a>
    </div>
@endsection

