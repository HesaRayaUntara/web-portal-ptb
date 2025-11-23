@extends('layouts.main')

@section('title', 'Profil Program Studi')

@section('content')
<!-- Breadcrumb -->
<nav class="mb-4 flex items-center gap-2 text-xs text-textMuted md:mb-6 md:text-sm">
    <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
    <span> > </span>
    <a href="{{ route('profil') }}" class="transition hover:text-primary text-primaryDark">Profil Prodi</a>
</nav>


{{-- Hero Section --}}
<section
    class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
    style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-4 p-6 md:space-y-5 md:p-10 lg:p-12 xl:p-16">
        <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-wide4 text-white md:px-4 md:text-xs">Profil Prodi</span>
        <h1 class="text-2xl font-bold leading-tight md:text-3xl lg:text-4xl xl:text-5xl">Profil Program Studi</h1>
        <p class="max-w-2xl text-sm text-white/85 md:text-base lg:text-lg">Mengenal lebih dekat visi, filosofi, dan sarana pembelajaran yang membentuk karakter unggul mahasiswa.</p>
    </div>
</section>

<!-- {{-- Visi, Misi, Akreditasi, Mitra --}} -->
<section class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-8 md:p-6 lg:p-8">
    <!-- Deskripsi Singkat Prodi -->
    @if(isset($profilProdi) && $profilProdi->deskripsi)
    <div class="mb-6 rounded-card border border-primary/15 bg-gradient-to-br from-primary/5 to-primary/10 p-6 md:mb-8 md:p-8">
        <h2 class="text-lg uppercase tracking-wide4 font-semibold text-secondary md:text-xl">Pemuliaan Tanaman dan Teknologi Benih</h2>
        <p class="mt-4 text-sm leading-relaxed text-textMuted whitespace-pre-line md:text-sm">
            {{ $profilProdi->deskripsi }}
        </p>
    </div>
    @endif

    <!-- Visi, Misi, dan Tujuan -->
    <div class="space-y-4 md:space-y-5">
        {{-- Visi --}}
        @if(isset($profilProdi) && $profilProdi->visi)
        <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
            <div class="mb-3 flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Visi</h2>
            </div>
            <p class="text-xs leading-relaxed text-textMuted md:text-sm">
                {{ $profilProdi->visi }}
            </p>
        </div>
        @endif

        {{-- Misi dan Tujuan --}}
        <div class="grid gap-4 md:gap-5 lg:grid-cols-2">
            {{-- Misi --}}
            @if(isset($profilProdi) && $profilProdi->misi)
            <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Misi</h2>
                </div>
                <ul class="space-y-2.5 text-xs text-textMuted md:text-sm">
                    @php
                    $misiItems = explode("\n", $profilProdi->misi);
                    $misiItems = array_filter($misiItems, function($item) {
                    return trim($item) !== '';
                    });
                    @endphp
                    @foreach($misiItems as $index => $misi)
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-primary/10 text-[10px] font-semibold text-primary md:h-6 md:w-6 md:text-xs">{{ $index + 1 }}</span>
                        <span class="leading-relaxed">{{ trim($misi) }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Tujuan --}}
            @if(isset($profilProdi) && $profilProdi->tujuan)
            <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Tujuan</h2>
                </div>
                <ul class="space-y-2.5 text-xs text-textMuted md:text-sm">
                    @php
                    $tujuanItems = explode("\n", $profilProdi->tujuan);
                    $tujuanItems = array_filter($tujuanItems, function($item) {
                    return trim($item) !== '';
                    });
                    @endphp
                    @foreach($tujuanItems as $index => $tujuan)
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-primary/10 text-[10px] font-semibold text-primary md:h-6 md:w-6 md:text-xs">{{ $index + 1 }}</span>
                        <span class="leading-relaxed">{{ trim($tujuan) }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    
</section>

<div class="mt-6 grid gap-4 md:mt-8 md:gap-5 lg:grid-cols-2 lg:gap-5">
    <!-- {{-- Akreditasi --}} -->
    @if(isset($profilProdi) && $profilProdi->akreditasi)
    <div class="rounded-card border-secondary/20 bg-white p-5 shadow-card md:p-6 lg:p-8">
        <div class="flex items-center gap-3 md:gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-secondary/10 md:h-14 md:w-14 lg:h-16 lg:w-16">
                <span class="px-1 text-center text-[10px] font-bold uppercase leading-tight text-secondary md:text-xs lg:text-sm">{{ substr($profilProdi->akreditasi, 0, 1) }}</span>
            </div>
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary md:text-xs">Akreditasi BAN-PT</p>
                @if($profilProdi->no_sk)
                <p class="text-xs mt-1 text-textMuted md:text-sm">{{ $profilProdi->no_sk }}</p>
                @endif
            </div>
        </div>
        @if($profilProdi->foto_akreditasi)
        <div class="overflow-hidden rounded-card aspect-[16/9] md:mt-6">
            <a href="{{ asset('storage/' . $profilProdi->foto_akreditasi) }}" target="_blank"><img src="{{ asset('storage/' . $profilProdi->foto_akreditasi) }}" alt="Akreditasi BAN-PT" class="h-full w-full object-cover"></a>
        </div>
        @endif
    </div>
    @endif

    <!-- {{-- Informasi Program Studi --}} -->
    <div class="grid grid-cols-2 gap-2.5 md:gap-3">
        <!-- Lama Studi -->
        @if(isset($profilProdi) && $profilProdi->lama_studi)
        <div class="group relative overflow-hidden rounded-card bg-white p-4 shadow-card">
            <div class="absolute right-0 top-0 h-16 w-16 rounded-bl-full bg-primary/5"></div>
            <div class="relative">
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg bg-primary/10 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                </div>
                <p class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/70 md:text-xs">Lama Studi</p>
                <h3 class="mt-1.5 text-xl font-bold text-secondary md:text-2xl">{{ $profilProdi->lama_studi }}</h3>
                <p class="mt-0.5 text-[10px] font-semibold text-textMuted md:text-xs">Semester</p>
            </div>
        </div>
        @endif

        <!-- Gelar Lulusan -->
        @if(isset($profilProdi) && $profilProdi->gelar_lulusan)
        <div class="group relative overflow-hidden rounded-card bg-white p-4 shadow-card">
            <div class="absolute right-0 top-0 h-16 w-16 rounded-bl-full bg-secondary/5"></div>
            <div class="relative">
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg bg-secondary/10 text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.905 59.905 0 0 1 12 3.493a59.902 59.902 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443a55.381 55.381 0 0 1 5.25 2.882V15" />
                    </svg>
                </div>
                <p class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/70 md:text-xs">Gelar Lulusan</p>
                <h3 class="mt-1.5 text-xl font-bold text-secondary md:text-2xl">{{ $profilProdi->gelar_lulusan }}</h3>
                @if($profilProdi->kepanjangan_gelar)
                <p class="mt-0.5 text-[10px] font-semibold text-textMuted md:text-xs">{{ $profilProdi->kepanjangan_gelar }}</p>
                @endif
            </div>
        </div>
        @endif

        <!-- SNBP 2025 -->
        @if(isset($profilProdi) && $profilProdi->snbp_pelamar)
        <div class="group relative overflow-hidden rounded-card bg-gradient-to-br from-blue-50 to-blue-100/50 p-4 shadow-card">
            <div class="absolute right-0 top-0 h-16 w-16 rounded-bl-full bg-blue-200/30"></div>
            <div class="relative">
                <div class="mb-3 flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-500 text-white shadow-sm">
                        <span class="text-[10px] font-bold">SNBP</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wide4 text-blue-700/80">SNBP 2025</p>
                    </div>
                </div>
                <div class="space-y-2 text-[10px] md:text-xs">
                    <div class="flex items-center justify-between rounded-lg bg-white/60 px-2.5 py-1.5">
                        <span class="text-textMuted">Jumlah pelamar</span>
                        <span class="font-bold text-blue-600">{{ number_format($profilProdi->snbp_pelamar, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white/60 px-2.5 py-1.5">
                        <span class="text-textMuted">Diterima</span>
                        <span class="font-bold text-blue-600">{{ number_format($profilProdi->snbp_diterima, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-blue-500/10 px-2.5 py-1.5">
                        <span class="font-semibold text-blue-700">Keketatan</span>
                        <span class="font-bold text-blue-600">{{ number_format($profilProdi->snbp_keketatan, 2, ',', '.') }}%</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- SNBT 2025 -->
        @if(isset($profilProdi) && $profilProdi->snbt_pelamar)
        <div class="group relative overflow-hidden rounded-card bg-gradient-to-br from-emerald-50 to-emerald-100/50 p-4 shadow-card">
            <div class="absolute right-0 top-0 h-16 w-16 rounded-bl-full bg-emerald-200/30"></div>
            <div class="relative">
                <div class="mb-3 flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500 text-white shadow-sm">
                        <span class="text-[10px] font-bold">SNBT</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wide4 text-emerald-700/80">SNBT 2025</p>
                    </div>
                </div>
                <div class="space-y-2 text-[10px] md:text-xs">
                    <div class="flex items-center justify-between rounded-lg bg-white/60 px-2.5 py-1.5">
                        <span class="text-textMuted">Jumlah pelamar</span>
                        <span class="font-bold text-emerald-600">{{ number_format($profilProdi->snbt_pelamar, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white/60 px-2.5 py-1.5">
                        <span class="text-textMuted">Diterima</span>
                        <span class="font-bold text-emerald-600">{{ number_format($profilProdi->snbt_diterima, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-emerald-500/10 px-2.5 py-1.5">
                        <span class="font-semibold text-emerald-700">Keketatan</span>
                        <span class="font-bold text-emerald-600">{{ number_format($profilProdi->snbt_keketatan, 2, ',', '.') }}%</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Prospek Karir --}}
@if(isset($profilProdi) && $profilProdi->industri_tempat_bekerja)
<section class="mt-6 rounded-3xl border border-primary/10 bg-white p-4 shadow-soft md:mt-8 md:p-5 lg:p-6">
    <div class="text-center">
        <span class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/80 md:text-xs">Prospek Karier</span>
        <h3 class="mt-1.5 text-lg font-semibold text-textDark md:mt-2 md:text-xl">Arah Karier Unggulan</h3>
    </div>
    <div class="mt-4 grid gap-3 md:mt-6 md:grid-cols-2 md:gap-4">
        <article class="rounded-2xl border border-primary/10 bg-white p-4 md:p-5">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-primary shadow-soft md:h-9 md:w-9 lg:h-10 lg:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 md:h-5 md:w-5 lg:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wide4 text-primary/70 md:text-xs">Industri / Tempat Bekerja</p>
                    <h3 class="text-sm font-semibold text-textDark md:text-base">Jejaring Profesional</h3>
                </div>
            </div>
            <ul class="mt-3 space-y-1.5 text-xs font-semibold text-textDark md:mt-4 md:space-y-2 md:text-xs">
                @if(isset($profilProdi) && $profilProdi->industri_tempat_bekerja)
                @php
                $industriItems = explode("\n", $profilProdi->industri_tempat_bekerja);
                $industriItems = array_filter($industriItems, function($item) {
                return trim($item) !== '';
                });
                @endphp
                @foreach($industriItems as $industri)
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    {{ trim($industri) }}
                </li>
                @endforeach
                @endif
            </ul>
        </article>
        {{-- Profil Lulusan --}}
        @if(isset($profilProdi) && $profilProdi->profilLulusan && $profilProdi->profilLulusan->count() > 0)
        <article class="rounded-2xl border border-secondary/10 bg-white p-4 md:p-5">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary shadow-soft md:h-9 md:w-9 lg:h-10 lg:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 md:h-5 md:w-5 lg:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/70 md:text-xs">Profil Lulusan</p>
                    <h3 class="text-sm font-semibold text-textDark md:text-base">Kompetensi dan Peran Lulusan</h3>
                </div>
            </div>
            <div class="mt-3 space-y-1.5 md:mt-4 md:space-y-2">
                @foreach($profilProdi->profilLulusan as $index => $lulusan)
                <div class="profil-lulusan-accordion-item overflow-hidden rounded-lg border border-secondary/20 transition-all duration-300 hover:border-secondary/40" data-index="{{ $index }}">
                    <button type="button" class="profil-lulusan-toggle flex w-full items-center justify-between gap-2 px-2 py-1.5 text-left transition-colors duration-200 hover:bg-secondary/5 md:px-3 md:py-2">
                        <span class="text-xs font-semibold text-textDark md:text-xs">{{ $lulusan->peran }}</span>
                        <svg class="profil-lulusan-icon h-3 w-3 flex-shrink-0 text-secondary transition-transform duration-300 md:h-4 md:w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="profil-lulusan-content max-h-0 overflow-hidden transition-all duration-300">
                        <div class="px-2 pb-1.5 md:px-3 md:pb-2">
                            <p class="text-[10px] leading-relaxed text-textMuted md:text-xs">{{ $lulusan->deskripsi_kemampuan }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </article>
        @endif
    </div>
</section>
@endif


{{-- Fasilitas Pembelajaran --}}
<section class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-8 md:p-6 lg:p-8">
    <div class="space-y-4 md:space-y-5">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-[10px] font-semibold uppercase tracking-wide4 text-primary/80 md:text-xs">Fasilitas Pembelajaran</span>
                <h2 class="mt-1 text-lg font-semibold text-secondary md:text-xl lg:text-2xl">Lingkungan Belajar Modern</h2>
            </div>
            <a href="{{ route('fasilitas') }}"
                class="hidden items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft md:inline-flex">
                Selengkapnya
                <span aria-hidden="true">></span>
            </a>
        </div>
        <div class="grid gap-4 md:grid-cols-2 md:gap-5 lg:grid-cols-3">
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80" alt="Laboratorium Inovasi" class="h-36 w-full object-cover md:h-40">
                <div class="space-y-2 p-4 md:space-y-2.5 md:p-5">
                    <h3 class="text-xs font-semibold text-textDark md:text-sm">Laboratorium Inovasi</h3>
                    <p class="text-[10px] text-textMuted md:text-xs">Fasilitas modern untuk kegiatan penelitian dan pengembangan teknologi berbasis data dan otomasi.</p>
                </div>
            </article>
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park" class="h-36 w-full object-cover md:h-40">
                <div class="space-y-2 p-4 md:space-y-2.5 md:p-5">
                    <h3 class="text-xs font-semibold text-textDark md:text-sm">Agro Tech Park</h3>
                    <p class="text-[10px] text-textMuted md:text-xs">Ruang praktik terbuka bagi mahasiswa untuk menerapkan teknologi pertanian presisi di lingkungan nyata.</p>
                </div>
            </article>
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card md:col-span-2 lg:col-span-1">
                <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio" class="h-36 w-full object-cover md:h-40">
                <div class="space-y-2 p-4 md:space-y-2.5 md:p-5">
                    <h3 class="text-xs font-semibold text-textDark md:text-sm">Learning Studio</h3>
                    <p class="text-[10px] text-textMuted md:text-xs">Ruang belajar interaktif yang mendukung pembelajaran kolaboratif dan pengembangan ide kreatif mahasiswa.</p>
                </div>
            </article>
        </div>
        <div class="mt-4 flex justify-end md:hidden">
            <a href="{{ route('fasilitas') }}"
                class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft">
                Selengkapnya
                <span aria-hidden="true">></span>
            </a>
        </div>
    </div>
</section>

{{-- Mitra Strategis --}}
@if(isset($profilProdi) && $profilProdi->mitra_logo && is_array($profilProdi->mitra_logo) && count($profilProdi->mitra_logo) > 0)
<section class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-6 md:p-5 lg:p-6">
    <div class="text-center">
        <span class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary md:text-xs">Mitra Prodi PTB</span>
    </div>
    <div class="mt-4 grid grid-cols-3 gap-2 md:grid-cols-6 lg:grid-cols-9 md:gap-3">
        @if(isset($profilProdi) && $profilProdi->mitra_logo && is_array($profilProdi->mitra_logo))
        @foreach($profilProdi->mitra_logo as $logo)
        <div class="flex items-center justify-center overflow-hidden rounded-lg bg-white p-2 transition hover:border-primary/20 hover:shadow-soft md:p-2.5">
            <img src="{{ asset('storage/' . $logo) }}" alt="Mitra Logo" class="h-auto max-h-8 w-full object-contain md:max-h-10">
        </div>
        @endforeach
        @endif
    </div>
</section>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.profil-lulusan-toggle');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const item = this.closest('.profil-lulusan-accordion-item');
                const content = item.querySelector('.profil-lulusan-content');
                const icon = item.querySelector('.profil-lulusan-icon');
                
                // Toggle active class
                const isActive = item.classList.contains('active');
                
                // Close all items
                document.querySelectorAll('.profil-lulusan-accordion-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherContent = otherItem.querySelector('.profil-lulusan-content');
                        const otherIcon = otherItem.querySelector('.profil-lulusan-icon');
                        otherContent.style.maxHeight = '0';
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });
                
                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    content.style.maxHeight = '0';
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    item.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    });
</script>
@endpush
@endsection