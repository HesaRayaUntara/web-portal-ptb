@extends('layouts.main')

@section('title', __('site.nav.profile'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.profile_page.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.profile_page.hero.subtitle') }}</p>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.profile_page.philosophy.title') }}</h2>
        <p>{{ __('site.profile_page.philosophy.description') }}</p>
        <div class="highlight-grid" style="margin-top: 30px;">
            <div class="highlight-card">
                <h3>{{ __('site.profile_page.philosophy.cards.values.title') }}</h3>
                <p>{{ __('site.profile_page.philosophy.cards.values.description') }}</p>
            </div>
            <div class="highlight-card">
                <h3>{{ __('site.profile_page.philosophy.cards.approach.title') }}</h3>
                <p>{{ __('site.profile_page.philosophy.cards.approach.description') }}</p>
            </div>
            <div class="highlight-card">
                <h3>{{ __('site.profile_page.philosophy.cards.competency.title') }}</h3>
                <p>{{ __('site.profile_page.philosophy.cards.competency.description') }}</p>
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.profile_page.facilities.title') }}</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1573497491765-dccce02b29df?auto=format&fit=crop&w=800&q=80" alt="Laboratorium Inovasi">
                <div class="card-body">
                    <h3>{{ __('site.profile_page.facilities.cards.lab.title') }}</h3>
                    <p>{{ __('site.profile_page.facilities.cards.lab.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park">
                <div class="card-body">
                    <h3>{{ __('site.profile_page.facilities.cards.park.title') }}</h3>
                    <p>{{ __('site.profile_page.facilities.cards.park.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio">
                <div class="card-body">
                    <h3>{{ __('site.profile_page.facilities.cards.studio.title') }}</h3>
                    <p>{{ __('site.profile_page.facilities.cards.studio.description') }}</p>
                </div>
            </article>
        </div>
    </section>
@endsection

