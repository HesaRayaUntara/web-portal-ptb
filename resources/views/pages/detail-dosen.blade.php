@extends('layouts.main')

@section('title', 'Detail Dosen - ' . $dosen['name'])

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-8 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span>/</span>
        <a href="{{ route('dosen') }}" class="transition hover:text-primary">Dosen</a>
        <span>/</span>
        <span class="text-textDark">{{ $dosen['name'] }}</span>
    </nav>

    <!-- Hero Section -->
    <section class="mb-12 rounded-section bg-white p-8 shadow-soft md:p-10 lg:p-12">
        <div class="grid gap-10 md:grid-cols-[1.1fr_0.9fr] md:items-start">
            <div class="space-y-6">
                <div class="overflow-hidden rounded-card shadow-soft">
                    <img src="{{ $dosen['image'] }}" alt="{{ $dosen['name'] }}" class="h-full w-full object-cover">
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-semibold text-secondary md:text-4xl">{{ $dosen['name'] }}</h1>
                    <span class="mt-3 inline-flex rounded-full bg-primary/15 px-4 py-1 text-sm font-semibold text-primary">{{ $dosen['position'] }}</span>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Bidang Keahlian</h3>
                    <p class="text-base text-textMuted">{{ $dosen['expertise'] }}</p>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Kontak</h3>
                    <a href="mailto:{{ $dosen['contact'] }}" class="text-base text-primary transition hover:text-primaryDark">{{ $dosen['contact'] }}</a>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Tentang</h3>
                    <p class="text-sm leading-relaxed text-textMuted md:text-base">{{ $dosen['description'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Detail -->
    <section class="mb-12 rounded-section bg-white p-8 shadow-soft md:p-10 lg:p-12">
        <h2 class="mb-8 text-3xl font-semibold text-secondary md:text-4xl">Informasi Detail</h2>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Pendidikan</span>
                {{ $dosen['education'] }}
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Riset Aktif</span>
                {{ $dosen['research'] }}
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Penghargaan</span>
                {{ $dosen['awards'] }}
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Publikasi</span>
                {{ $dosen['publications'] }}
            </div>
        </div>
    </section>

    <!-- Back Button -->
    <div class="mb-8">
        <a href="{{ route('dosen') }}" 
           class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-6 py-3 text-sm font-semibold text-primary transition hover:border-primary hover:bg-primary/5 hover:shadow-soft">
            <span aria-hidden="true">←</span>
            Kembali ke Daftar Dosen
        </a>
    </div>
@endsection

