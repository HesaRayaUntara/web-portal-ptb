@php
    $locale = app()->getLocale();
    $flags = ['id' => '🇮🇩', 'en' => '🇺🇸'];
@endphp

<div class="mx-auto flex w-full max-w-content flex-col gap-6 px-6 py-5 md:flex-row md:items-center md:justify-between md:py-6 lg:px-12">
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="/" class="relative inline-flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-primary shadow-soft">
                <img src="{{ asset('gambar/logo-ptb.jpg') }}" alt="Logo PTB" class="h-full w-full object-cover">
            </a>
            <div class="space-y-1">
                <span class="block text-lg font-semibold text-textDark">Program Studi PTB</span>
                <span class="block text-sm font-medium text-textMuted">Pemuliaan Tanaman dan Teknologi Benih</span>
            </div>
        </div>
        
        {{-- Hamburger Button (Mobile Only) --}}
        <button type="button" id="mobile-menu-toggle" class="flex items-center justify-center rounded-badge border border-primary/15 bg-white p-2 text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40 md:hidden" aria-label="Toggle menu">
            <svg id="menu-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="close-icon" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden w-full flex-col gap-4 md:hidden">
        <nav class="w-full">
            <ul class="flex flex-col gap-3 text-15 font-medium text-textDark/90">
                <li>
                    <a href="{{ route('beranda') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('beranda') ? 'text-primary font-semibold' : '' }}">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('profil') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('profil') ? 'text-primary font-semibold' : '' }}">Profil Prodi</a>
                </li>
                <li>
                    <a href="{{ route('kurikulum') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('kurikulum') ? 'text-primary font-semibold' : '' }}">Kurikulum</a>
                </li>
                <li>
                    <a href="{{ route('dosen') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('dosen') ? 'text-primary font-semibold' : '' }}">Dosen</a>
                </li>
                <li>
                    <a href="{{ route('berita') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('berita') ? 'text-primary font-semibold' : '' }}">Berita</a>
                </li>
                <li>
                    <a href="{{ route('galeri') }}" class="block transition-colors hover:text-primary {{ request()->routeIs('galeri') ? 'text-primary font-semibold' : '' }}">Galeri</a>
                </li>
            </ul>
        </nav>
        
        <div class="relative w-full">
            <div class="group inline-flex w-full items-center justify-end">
                <button type="button"
                    class="flex w-full items-center justify-center gap-2 rounded-badge border border-primary/15 bg-white px-4 py-2 text-sm font-medium text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40">
                    <span class="text-base" aria-hidden="true">{{ $flags[$locale] ?? '🌐' }}</span>
                    <span class="font-semibold">{{ strtoupper($locale) }}</span>
                    <span class="text-xs" aria-hidden="true">&#x25BE;</span>
                </button>
                <div class="absolute right-0 top-full z-50 mt-2 hidden min-w-[140px] flex-col rounded-badge border border-primary/10 bg-white text-sm text-textDark shadow-soft transition group-hover:flex group-focus-within:flex">
                    <a href="{{ route('lang.switch', 'id') }}"
                       class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary {{ $locale === 'id' ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                        <span class="text-base">{{ $flags['id'] }}</span>
                        <span>Indonesia</span>
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary {{ $locale === 'en' ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                        <span class="text-base">{{ $flags['en'] }}</span>
                        <span>English</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Desktop Menu --}}
    <nav class="hidden w-full md:block md:w-auto">
        <ul class="flex flex-wrap gap-x-6 gap-y-3 text-15 font-medium text-textDark/90">
            <li>
                <a href="{{ route('beranda') }}" class="transition-colors hover:text-primary {{ request()->routeIs('beranda') ? 'text-primary font-semibold' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="transition-colors hover:text-primary {{ request()->routeIs('profil') ? 'text-primary font-semibold' : '' }}">Profil Prodi</a>
            </li>
            <li>
                <a href="{{ route('kurikulum') }}" class="transition-colors hover:text-primary {{ request()->routeIs('kurikulum') ? 'text-primary font-semibold' : '' }}">Kurikulum</a>
            </li>
            <li>
                <a href="{{ route('dosen') }}" class="transition-colors hover:text-primary {{ request()->routeIs('dosen') ? 'text-primary font-semibold' : '' }}">Dosen</a>
            </li>
            <li>
                <a href="{{ route('berita') }}" class="transition-colors hover:text-primary {{ request()->routeIs('berita') ? 'text-primary font-semibold' : '' }}">Berita</a>
            </li>
            <li>
                <a href="{{ route('galeri') }}" class="transition-colors hover:text-primary {{ request()->routeIs('galeri') ? 'text-primary font-semibold' : '' }}">Galeri</a>
            </li>
            <!-- <li>
                <a href="{{ route('kontak') }}" class="transition-colors hover:text-primary {{ request()->routeIs('kontak') ? 'text-primary font-semibold' : '' }}">Kontak</a>
            </li> -->
        </ul>
    </nav>

    {{-- Desktop Language Dropdown --}}
    <div class="hidden relative w-full md:block md:w-auto">
        <div class="group inline-flex w-full items-center justify-end md:justify-start">
            <button type="button"
                class="flex w-full items-center justify-center gap-2 rounded-badge border border-primary/15 bg-white px-4 py-2 text-sm font-medium text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40 md:w-auto">
                <span class="text-base" aria-hidden="true">{{ $flags[$locale] ?? '🌐' }}</span>
                <span class="font-semibold">{{ strtoupper($locale) }}</span>
                <span class="text-xs" aria-hidden="true">&#x25BE;</span>
            </button>
            <div class="absolute right-0 top-full z-50 mt-2 hidden min-w-[140px] flex-col rounded-badge border border-primary/10 bg-white text-sm text-textDark shadow-soft transition group-hover:flex group-focus-within:flex">
                <a href="{{ route('lang.switch', 'id') }}"
                   class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary {{ $locale === 'id' ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                    <span class="text-base">{{ $flags['id'] }}</span>
                    <span>Indonesia</span>
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                   class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary {{ $locale === 'en' ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                    <span class="text-base">{{ $flags['en'] }}</span>
                    <span>English</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (toggleButton && mobileMenu) {
            toggleButton.addEventListener('click', function() {
                const isHidden = mobileMenu.classList.contains('hidden');
                
                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    menuIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideMenu = mobileMenu.contains(event.target);
                const isClickOnToggle = toggleButton.contains(event.target);
                
                if (!isClickInsideMenu && !isClickOnToggle && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });

            // Close menu when window is resized to desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        }
    });
</script>
