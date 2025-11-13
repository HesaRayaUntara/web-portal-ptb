@extends('layouts.main')

@section('title', __('site.nav.curriculum'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.curriculum.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.curriculum.hero.subtitle') }}</p>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.curriculum.structure.title') }}</h2>
        <div class="info-grid">
            <div class="info-badge">
                <strong>{{ __('site.curriculum.structure.semesters.one_two.title') }}</strong><br>
                {{ __('site.curriculum.structure.semesters.one_two.description') }}
            </div>
            <div class="info-badge">
                <strong>{{ __('site.curriculum.structure.semesters.three_four.title') }}</strong><br>
                {{ __('site.curriculum.structure.semesters.three_four.description') }}
            </div>
            <div class="info-badge">
                <strong>{{ __('site.curriculum.structure.semesters.five_six.title') }}</strong><br>
                {{ __('site.curriculum.structure.semesters.five_six.description') }}
            </div>
            <div class="info-badge">
                <strong>{{ __('site.curriculum.structure.semesters.seven_eight.title') }}</strong><br>
                {{ __('site.curriculum.structure.semesters.seven_eight.description') }}
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.curriculum.focus.title') }}</h2>
        <div class="highlight-grid">
            <div class="highlight-card">
                <h3>{{ __('site.curriculum.focus.cards.precision.title') }}</h3>
                <p>{{ __('site.curriculum.focus.cards.precision.description') }}</p>
            </div>
            <div class="highlight-card">
                <h3>{{ __('site.curriculum.focus.cards.processing.title') }}</h3>
                <p>{{ __('site.curriculum.focus.cards.processing.description') }}</p>
            </div>
            <div class="highlight-card">
                <h3>{{ __('site.curriculum.focus.cards.community.title') }}</h3>
                <p>{{ __('site.curriculum.focus.cards.community.description') }}</p>
            </div>
        </div>
    </section>
@endsection

