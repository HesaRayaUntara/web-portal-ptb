@extends('layouts.main')

@section('title', __('site.nav.gallery'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.gallery.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.gallery.hero.subtitle') }}</p>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.gallery.highlight.title') }}</h2>
        <div class="gallery-grid">
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80" alt="Budidaya sayur">
                <div class="card-body">
                    <h3>{{ __('site.gallery.highlight.cards.greenhouse.title') }}</h3>
                    <p>{{ __('site.gallery.highlight.cards.greenhouse.description') }}</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1441123285228-1448e608f3d5?auto=format&fit=crop&w=800&q=80" alt="Pelatihan petani">
                <div class="card-body">
                    <h3>{{ __('site.gallery.highlight.cards.community.title') }}</h3>
                    <p>{{ __('site.gallery.highlight.cards.community.description') }}</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80" alt="Produk pangan">
                <div class="card-body">
                    <h3>{{ __('site.gallery.highlight.cards.lab.title') }}</h3>
                    <p>{{ __('site.gallery.highlight.cards.lab.description') }}</p>
                </div>
            </article>
            <article class="gallery-card">
                <img src="https://images.unsplash.com/photo-1525026198548-4baa812f1183?auto=format&fit=crop&w=800&q=80" alt="Panen raya">
                <div class="card-body">
                    <h3>{{ __('site.gallery.highlight.cards.harvest.title') }}</h3>
                    <p>{{ __('site.gallery.highlight.cards.harvest.description') }}</p>
                </div>
            </article>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.gallery.virtual.title') }}</h2>
        <p>{{ __('site.gallery.virtual.description') }}</p>
        <div class="button-row" style="margin-top: 24px;">
            <a class="btn btn-primary" href="#">{{ __('site.gallery.virtual.cta_primary') }}</a>
            <a class="btn btn-light" href="#">{{ __('site.gallery.virtual.cta_secondary') }}</a>
        </div>
    </section>
@endsection

