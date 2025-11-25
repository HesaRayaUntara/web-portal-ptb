@extends('layouts.main')

@section('title', 'Kurikulum')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-4 flex items-center gap-2 text-xs text-textMuted md:mb-6 md:text-sm">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('kurikulum') }}" class="transition hover:text-primary text-primaryDark">Kurikulum</a>
    </nav>


    {{-- Hero Section --}}
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-4 p-6 md:space-y-5 md:p-10 lg:p-12 xl:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-wide4 text-white md:px-4 md:text-xs">Kurikulum</span>
            <h1 class="text-2xl font-bold leading-tight md:text-3xl lg:text-4xl xl:text-5xl">Struktur Kurikulum</h1>
            <p class="max-w-2xl text-sm text-white/85 md:text-base lg:text-lg">Rangkaian pembelajaran yang dirancang untuk mengembangkan kompetensi teknis dan profesional mahasiswa.</p>
        </div>
    </section>

    {{-- Kurikulum --}}
    <section class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-8 md:p-6 lg:p-8">
        {{-- Kurikulum yang Digunakan --}}
        <div class="mb-6 border-b border-primary/10 pb-6">
            <div class="mb-3 flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h2 class="text-sm font-semibold text-secondary md:text-base">Kurikulum</h2>
            </div>
            <p class="text-xs leading-relaxed text-textMuted md:text-sm">
                Program Studi Pemuliaan Tanaman dan Teknologi Benih menggunakan Kurikulum Merdeka Belajar yang berbasis Outcome Based Education (OBE), dirancang untuk menghasilkan lulusan yang kompeten di bidang pemuliaan tanaman dan teknologi benih dengan fokus pada pengembangan kompetensi praktis dan inovasi teknologi.
            </p>
        </div>

        {{-- Mata Kuliah --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-semibold text-secondary md:text-base">Mata Kuliah</h2>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="downloadPDF()" class="flex items-center justify-center rounded-full border border-primary/20 p-1.5 text-primary transition hover:border-primary hover:bg-primary/5 hover:shadow-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </button>
                    <a href="{{ route('kurikulum.detail') }}"
                       class="hidden items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft md:inline-flex">
                        <span>Selengkapnya</span>
                        <span aria-hidden="true">></span>
                    </a>
                </div>
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
            <div class="mt-4 flex items-center justify-end gap-2 md:hidden">
                <a href="{{ route('kurikulum.detail') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft">
                    <span>Detail</span>
                    <span aria-hidden="true">></span>
                </a>
            </div>
        </div>
    </section>

    @if(session('error'))
    <meta name="error-message" content="{{ session('error') }}">
    @endif

    @push('scripts')
    <script>
        function downloadPDF() {
            window.location.href = '{{ route("kurikulum.download") }}';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var errorMeta = document.querySelector('meta[name="error-message"]');
            if (errorMeta) {
                alert(errorMeta.getAttribute('content'));
            }
        });
    </script>
    @endpush
@endsection
