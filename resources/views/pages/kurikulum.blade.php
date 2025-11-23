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

    {{-- Kurikulum --}}
    <section class="mt-12 rounded-section bg-white p-6 shadow-soft md:mt-8 md:p-8 lg:p-10">
        {{-- Kurikulum yang Digunakan --}}
        <div class="mb-6 border-b border-primary/10 pb-6">
            <div class="mb-3 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary shadow-sm md:h-12 md:w-12">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 md:h-6 md:w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-secondary md:text-xl lg:text-2xl">
                    Kurikulum
                </h2>
            </div>
            <p class="text-xs leading-relaxed text-textMuted md:text-sm">
                Program Studi Pemuliaan Tanaman dan Teknologi Benih menggunakan Kurikulum Merdeka Belajar yang berbasis Outcome Based Education (OBE), dirancang untuk menghasilkan lulusan yang kompeten di bidang pemuliaan tanaman dan teknologi benih dengan fokus pada pengembangan kompetensi praktis dan inovasi teknologi.
            </p>
        </div>

        {{-- Mata Kuliah --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary shadow-sm md:h-12 md:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 md:h-6 md:w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-secondary md:text-xl lg:text-2xl">
                        Mata Kuliah
                    </h2>
                </div>
                <a href="{{ route('kurikulum.detail') }}"
                   class="hidden items-center gap-1.5 rounded-full bg-primary px-3 py-1.5 text-[10px] font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-primaryDark md:inline-flex md:text-xs">
                    <span>Detail</span>
                    <span class="text-xs">></span>
                </a>
            </div>
            <div class="grid gap-3 md:grid-cols-2">
                <div class="group rounded-lg border border-primary/10 bg-white/60 p-3 transition-all duration-200 hover:border-primary/20 hover:bg-white">
                    <h3 class="mb-1.5 text-xs font-semibold text-textDark md:text-sm">Semester 1-2</h3>
                    <p class="text-[10px] leading-relaxed text-textMuted md:text-xs">{{ $deskripsiKurikulum->deskripsi_semester_1_2 }}</p>
                </div>
                <div class="group rounded-lg border border-primary/10 bg-white/60 p-3 transition-all duration-200 hover:border-primary/20 hover:bg-white">
                    <h3 class="mb-1.5 text-xs font-semibold text-textDark md:text-sm">Semester 3-4</h3>
                    <p class="text-[10px] leading-relaxed text-textMuted md:text-xs">{{ $deskripsiKurikulum->deskripsi_semester_3_4 }}</p>
                </div>
                <div class="group rounded-lg border border-primary/10 bg-white/60 p-3 transition-all duration-200 hover:border-primary/20 hover:bg-white">
                    <h3 class="mb-1.5 text-xs font-semibold text-textDark md:text-sm">Semester 5-6</h3>
                    <p class="text-[10px] leading-relaxed text-textMuted md:text-xs">{{ $deskripsiKurikulum->deskripsi_semester_5_6 }}</p>
                </div>
                <div class="group rounded-lg border border-primary/10 bg-white/60 p-3 transition-all duration-200 hover:border-primary/20 hover:bg-white">
                    <h3 class="mb-1.5 text-xs font-semibold text-textDark md:text-sm">Semester 7-8</h3>
                    <p class="text-[10px] leading-relaxed text-textMuted md:text-xs">{{ $deskripsiKurikulum->deskripsi_semester_7_8 }}</p>
                </div>
            </div>
            <div class="mt-4 flex justify-end md:hidden">
                <a href="{{ route('kurikulum.detail') }}"
                   class="inline-flex items-center gap-1.5 rounded-full bg-primary px-3 py-1.5 text-[10px] font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-primaryDark md:text-xs">
                    <span>Detail</span>
                    <span class="text-xs">></span>
                </a>
            </div>
        </div>
    </section>
@endsection
