<div class="topbar">
    <div class="logo">
        <a href="/"><img src="{{ asset('gambar/logo-ptb.jpg') }}" alt="Logo PTB"></a>
        <div>
            <strong>Program Studi PTB</strong>
            <small>Pemuliaan Tanaman dan Teknologi Benih</small>
        </div>
    </div>

    <nav>
        <ul>
            <li><a class="{{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a></li>
            <li><a class="{{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Prodi</a></li>
            <li><a class="{{ request()->routeIs('kurikulum') ? 'active' : '' }}" href="{{ route('kurikulum') }}">Kurikulum</a></li>
            <li><a class="{{ request()->routeIs('dosen') ? 'active' : '' }}" href="{{ route('dosen') }}">Dosen</a></li>
            <li><a class="{{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a></li>
            <li><a class="{{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a></li>
            <li><a class="{{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
        </ul>
    </nav>

    @php
        $locale = app()->getLocale();
        $flags = ['id' => '🇮🇩', 'en' => '🇺🇸'];
    @endphp

    <div class="language-select" aria-label="Pilih Bahasa">
        <button type="button">
            <span class="flag-icon" aria-hidden="true">{{ $flags[$locale] ?? '🌐' }}</span>
            <span class="language-code">{{ strtoupper($locale) }}</span>
            <span class="chevron" aria-hidden="true">&#x25BE;</span>
        </button>
        <div class="language-dropdown">
            <a class="{{ $locale === 'id' ? 'active' : '' }}" href="{{ route('lang.switch', 'id') }}">
                <span class="flag-icon" aria-hidden="true">{{ $flags['id'] }}</span>
                <span>IN</span>
            </a>
            <a class="{{ $locale === 'en' ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}">
                <span class="flag-icon" aria-hidden="true">{{ $flags['en'] }}</span>
                <span>EN</span>
            </a>
        </div>
    </div>
</div>
