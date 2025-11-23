@extends('layouts.main')

@section('title', 'Fasilitas Prodi PTB')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
<!-- Breadcrumb -->
<nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
    <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
    <span> > </span>
    <a href="{{ route('profil') }}" class="transition hover:text-primary">Profil Prodi</a>
    <span> > </span>
    <a href="{{ route('fasilitas') }}" class="transition hover:text-primary text-primaryDark">Fasilitas</a>
</nav>

{{-- Hero Section --}}
<section
    class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
    style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
        <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Fasilitas</span>
        <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Fasilitas Prodi PTB</h1>
        <p class="max-w-2xl text-base text-white/85 md:text-lg">Dukungan fasilitas modern dan lengkap untuk mendukung proses pembelajaran, penelitian, dan pengembangan inovasi teknologi pertanian.</p>
    </div>
</section>

{{-- Fasilitas Cards --}}
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Fasilitas Pembelajaran</span>
        <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Lingkungan Belajar Modern</h2>
        <p class="mt-4 text-sm leading-relaxed text-textMuted md:text-base">
            Program Studi PTB dilengkapi dengan berbagai fasilitas modern yang mendukung kegiatan pembelajaran, praktikum, dan penelitian mahasiswa.
        </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        @forelse($fasilitas as $item)
            <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" 
                     data-image="{{ $item->foto ? Storage::url($item->foto) : '' }}" 
                     data-alt="{{ $item->nama_fasilitas }}">
                @if($item->foto)
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_fasilitas }}" class="h-32 w-full object-cover">
                @else
                    <div class="flex h-32 w-full items-center justify-center bg-gray-200 text-gray-400">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
                <div class="space-y-2 p-4">
                    <h3 class="text-lg font-semibold text-textDark">{{ $item->nama_fasilitas }}</h3>
                    <p class="text-xs text-textMuted leading-relaxed">{{ $item->deskripsi }}</p>
                </div>
            </article>
        @empty
            <div class="col-span-full py-12 text-center">
                <p class="text-sm text-textMuted">Belum ada fasilitas yang ditampilkan.</p>
            </div>
        @endforelse
    </div>
</section>

<!-- Image Modal -->
<div id="facilityModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
    <div class="relative max-h-[90vh] max-w-[90vw]">
        <button id="closeFacilityModal" class="absolute -right-2 -top-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-textDark shadow-lg transition hover:bg-gray-100">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="relative overflow-hidden bg-white shadow-xl">
            <img id="facilityModalImage" src="" alt="" class="max-h-[90vh] max-w-[90vw] object-contain">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const facilityCards = document.querySelectorAll('.facility-card');
        const modal = document.getElementById('facilityModal');
        const modalImage = document.getElementById('facilityModalImage');
        const closeModal = document.getElementById('closeFacilityModal');

        facilityCards.forEach(card => {
            card.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                const imageAlt = this.getAttribute('data-alt');
                
                if (imageUrl) {
                    modalImage.src = imageUrl;
                    modalImage.alt = imageAlt;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        // Close modal functions
        function closeFacilityModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        closeModal.addEventListener('click', closeFacilityModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeFacilityModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeFacilityModal();
            }
        });
    });
</script>
@endsection

