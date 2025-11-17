@extends('layouts.main')

@section('title', 'Kurikulum')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('kurikulum') }}" class="transition hover:text-primary text-primaryDark">Kurikulum</a>
    </nav>


    {{-- Hero Section --}}
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Kurikulum</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Struktur Kurikulum</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Rangkaian pembelajaran yang dirancang untuk mengembangkan kompetensi teknis dan profesional mahasiswa.</p>
        </div>
    </section>

    {{-- Struktur Kurikulum --}}
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="space-y-6">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-3xl font-semibold text-secondary md:text-4xl">
                    Struktur Perkuliahan per Semester
                </h2>
                <a href="{{ route('kurikulum.detail') }}"
                   class="hidden items-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark md:inline-flex">
                    <span>Detail Kurikulum</span>
                    <span class="text-sm">➜</span>
                </a>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Semester 1–2</span>
                    Dasar-dasar sains, matematika, teknologi informasi, serta pengenalan rekayasa dan prinsip keteknikan.
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Semester 3–4</span>
                    Peningkatan kompetensi pada bidang pemrograman, sistem digital, elektronika, dan penerapan teknologi pertanian.
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Semester 5–6</span>
                    Penerapan teknologi berbasis proyek dan penelitian terapan, termasuk pengolahan data dan integrasi sistem.
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                    <span class="block text-base font-semibold text-textDark">Semester 7–8</span>
                    Praktik kerja lapang, pengembangan inovasi teknologi, dan penyusunan tugas akhir berbasis riset atau produk.
                </div>
            </div>
            <div class="mt-4 flex justify-end md:hidden">
                <a href="{{ route('kurikulum.detail') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                    <span>Detail Kurikulum</span>
                    <span class="text-sm">➜</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Fokus Pembelajaran --}}
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Fokus dan Keunggulan Program</h2>
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                    <h3 class="text-xl font-semibold text-primary">Presisi Teknologi</h3>
                    <p class="mt-3 text-sm text-textMuted">Mengintegrasikan teknologi presisi dalam bidang pertanian, termasuk sistem sensor, otomasi, dan Internet of Things (IoT).</p>
                </div>
                <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                    <h3 class="text-xl font-semibold text-primary">Pengolahan Data dan Sistem Pintar</h3>
                    <p class="mt-3 text-sm text-textMuted">Membekali mahasiswa dengan kemampuan mengolah data secara cerdas untuk mendukung pengambilan keputusan berbasis teknologi.</p>
                </div>
                <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                    <h3 class="text-xl font-semibold text-primary">Pemberdayaan Masyarakat</h3>
                    <p class="mt-3 text-sm text-textMuted">Mendorong penerapan teknologi tepat guna untuk meningkatkan efisiensi dan produktivitas masyarakat di bidang pertanian dan industri lokal.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
