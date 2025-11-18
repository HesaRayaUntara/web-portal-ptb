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

        <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($gallery as $item)
                <article class="gallery-item group relative overflow-hidden rounded-card cursor-pointer" 
                         data-type="{{ $item['type'] }}"
                         data-image="{{ $item['image'] }}"
                         data-title="{{ $item['title'] }}"
                         data-desc="{{ $item['desc'] }}"
                         @if(isset($item['youtube_url'])) data-youtube-url="{{ $item['youtube_url'] }}" @endif>
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-primary shadow-soft">
                                {{ $item['category'] }}
                            </span>
                            @if($item['type'] === 'video')
                                <span class="flex items-center justify-center rounded-full bg-primary/90 px-2.5 py-1 text-white shadow-soft">
                                    <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h3 class="mb-2 text-lg font-bold leading-tight transition-transform duration-300 group-hover:translate-y-[-4px]">{{ $item['title'] }}</h3>
                            <p class="line-clamp-2 text-xs text-white/90 opacity-0 transition-opacity duration-300 group-hover:opacity-100 md:text-sm">{{ $item['desc'] }}</p>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            @if($item['type'] === 'video')
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-lg">
                                    <svg class="ml-1 h-8 w-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-lg">
                                    <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        @if ($gallery->hasPages())
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center gap-2 rounded-full border border-primary/10 bg-white px-5 py-2 text-sm shadow-soft">
                    @foreach (range(1, $gallery->lastPage()) as $page)
                        <a
                            href="{{ $gallery->url($page) }}"
                            class="min-w-[36px] rounded-full px-3 py-1 text-center font-semibold transition
                                {{ $page == $gallery->currentPage() ? 'bg-primary text-white shadow-card' : 'text-textMuted hover:bg-primary/10 hover:text-primary' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </nav>
            </div>
        @endif
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Galeri Virtual</h2>
            <p class="text-sm leading-relaxed text-textMuted md:text-base">
                Jelajahi lebih banyak dokumentasi kegiatan melalui kanal digital kami. Gunakan pencarian untuk menemukan kegiatan spesifik, lokasi riset, atau kolaborasi dengan mitra industri.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark"
                   href="https://maps.app.goo.gl/eNiDgAiGJYbsjy346" target="_blank">Kunjungi Galeri 360°</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-primary/20 px-6 py-3 text-sm font-semibold text-primary transition hover:-translate-y-0.5 hover:border-primary"
                   href="#">Unduh Katalog</a>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
        <div class="relative w-full max-w-md">
            <button id="closeModal" class="absolute -right-2 -top-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-textDark shadow-lg transition hover:bg-gray-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="relative w-full overflow-hidden rounded-lg bg-white shadow-xl">
                <div class="relative w-full" style="padding-bottom: 75%;">
                    <img id="modalImage" src="" alt="" class="absolute inset-0 h-full w-full object-cover">
                </div>
                <div class="bg-white p-3 text-center">
                    <h3 id="modalTitle" class="text-sm font-bold text-textDark md:text-base"></h3>
                    <p id="modalDesc" class="mt-1 text-xs text-textMuted"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDesc = document.getElementById('modalDesc');
            const closeModal = document.getElementById('closeModal');

            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    const image = this.getAttribute('data-image');
                    const title = this.getAttribute('data-title');
                    const desc = this.getAttribute('data-desc');
                    const youtubeUrl = this.getAttribute('data-youtube-url');

                    if (type === 'video' && youtubeUrl) {
                        // Redirect to YouTube
                        window.open(youtubeUrl, '_blank');
                    } else if (type === 'photo') {
                        // Open modal with image
                        modalImage.src = image;
                        modalImage.alt = title;
                        modalTitle.textContent = title;
                        modalDesc.textContent = desc;
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            // Close modal functions
            function closeImageModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            closeModal.addEventListener('click', closeImageModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeImageModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeImageModal();
                }
            });
        });
    </script>
@endsection
