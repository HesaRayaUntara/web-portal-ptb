<div class="topbar">
    <div class="logo">
        <a href="/"><img src="gambar/logo-ptb.jpg" alt="Logo PTB"></a>
        <div>
            <strong>{{ __('site.brand.name') }}</strong>
            <small>{{ __('site.brand.tagline') }}</small>
        </div>
    </div>
    <nav>
        <ul>
            <li><a class="{{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">{{ __('site.nav.home') }}</a></li>
            <li><a class="{{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">{{ __('site.nav.profile') }}</a></li>
            <li><a class="{{ request()->routeIs('kurikulum') ? 'active' : '' }}" href="{{ route('kurikulum') }}">{{ __('site.nav.curriculum') }}</a></li>
            <li><a class="{{ request()->routeIs('dosen') ? 'active' : '' }}" href="{{ route('dosen') }}">{{ __('site.nav.lecturers') }}</a></li>
            <li><a class="{{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita') }}">{{ __('site.nav.news') }}</a></li>
            <li><a class="{{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">{{ __('site.nav.gallery') }}</a></li>
            <li><a class="{{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">{{ __('site.nav.contact') }}</a></li>
        </ul>
    </nav>
    @php
        $locale = app()->getLocale();
        $flags = ['id' => '🇮🇩', 'en' => '🇺🇸'];
    @endphp
    <div class="language-select" aria-label="{{ __('site.language.label') }}">
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
