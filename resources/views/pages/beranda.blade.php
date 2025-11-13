@extends('layouts.main')

@section('title', __('site.nav.home'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1518976024611-28bf4b48222e?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.home.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.home.hero.subtitle') }}</p>
            <div class="button-row">
                <a class="btn btn-primary" href="{{ route('profil') }}">{{ __('site.home.hero.cta_primary') }}</a>
                <a class="btn btn-light" href="{{ route('berita') }}">{{ __('site.home.hero.cta_secondary') }}</a>
            </div>
        </div>
    </section>

    <section class="section-card features-section">
        <div class="features-header">
            <div class="features-title">
                <span class="section-kicker">{{ __('site.home.strengths.kicker') }}</span>
                <h2>{{ __('site.home.strengths.heading') }}</h2>
                <p>{{ __('site.home.strengths.subtitle') }}</p>
            </div>
            <div class="features-image">
                <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=80" alt="Aktivitas pertanian berkelanjutan">
            </div>
        </div>
        <div class="feature-list">
            @foreach(__('site.home.strengths.items') as $feature)
                <article class="feature-item">
                    <span class="feature-icon" aria-hidden="true">
                        @switch($feature['icon'] ?? '')
                            @case('check')
                                ✓
                                @break
                            @case('globe')
                                🌍
                                @break
                            @case('lab')
                                ⚗️
                                @break
                            @case('users')
                                👥
                                @break
                            @default
                                ✔
                        @endswitch
                    </span>
                    <div class="feature-text">
                        <h3>{{ $feature['title'] }}</h3>
                        <p>{{ $feature['description'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.home.profile.title') }}</h2>
        <div class="profile-wrapper">
            <div class="profile-info">
                <h2>{{ __('site.brand.name') }}</h2>
                <span>{{ __('site.brand.tagline') }}</span>
                <p>{{ __('site.home.profile.description') }}</p>
                <div class="info-grid">
                    <div class="info-badge">
                        <strong>{{ __('site.home.profile.badges.study_duration.title') }}</strong><br>
                        {{ __('site.home.profile.badges.study_duration.description') }}
                    </div>
                    <div class="info-badge">
                        <strong>{{ __('site.home.profile.badges.professional.title') }}</strong><br>
                        {{ __('site.home.profile.badges.professional.description') }}
                    </div>
                    <div class="info-badge">
                        <strong>{{ __('site.home.profile.badges.global.title') }}</strong><br>
                        {{ __('site.home.profile.badges.global.description') }}
                    </div>
                </div>
            </div>
            <div class="profile-photo">
                <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=900&q=80" alt="Mahasiswa PTB">
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.home.news.title') }}</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80" alt="Kegiatan berkebun">
                <div class="card-body">
                    <h3>{{ __('site.home.news.cards.gardening.title') }}</h3>
                    <p>{{ __('site.home.news.cards.gardening.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=800&q=80" alt="Penelitian PTB">
                <div class="card-body">
                    <h3>{{ __('site.home.news.cards.research.title') }}</h3>
                    <p>{{ __('site.home.news.cards.research.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Pelatihan Petani">
                <div class="card-body">
                    <h3>{{ __('site.home.news.cards.training.title') }}</h3>
                    <p>{{ __('site.home.news.cards.training.description') }}</p>
                </div>
            </article>
        </div>
    </section>
@endsection

