@extends('layouts.main')

@section('title', __('site.nav.news'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.news_page.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.news_page.hero.subtitle') }}</p>
            <div class="button-row">
                <a class="btn btn-primary" href="#kegiatan">{{ __('site.news_page.hero.cta_primary') }}</a>
                <a class="btn btn-light" href="#arsip">{{ __('site.news_page.hero.cta_secondary') }}</a>
            </div>
        </div>
    </section>

    <section id="kegiatan" class="section-card">
        <h2 class="section-header">{{ __('site.news_page.highlight.title') }}</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Workshop">
                <div class="card-body">
                    <h3>{{ __('site.news_page.highlight.cards.workshop.title') }}</h3>
                    <p>{{ __('site.news_page.highlight.cards.workshop.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80" alt="Field Trip">
                <div class="card-body">
                    <h3>{{ __('site.news_page.highlight.cards.fieldtrip.title') }}</h3>
                    <p>{{ __('site.news_page.highlight.cards.fieldtrip.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1529158062015-cad636e69505?auto=format&fit=crop&w=800&q=80" alt="Konferensi">
                <div class="card-body">
                    <h3>{{ __('site.news_page.highlight.cards.conference.title') }}</h3>
                    <p>{{ __('site.news_page.highlight.cards.conference.description') }}</p>
                </div>
            </article>
        </div>
    </section>

    <section id="arsip" class="section-card">
        <h2 class="section-header">{{ __('site.news_page.archive.title') }}</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80" alt="Inkubasi Startup">
                <div class="card-body">
                    <h3>{{ __('site.news_page.archive.cards.incubation.title') }}</h3>
                    <p>{{ __('site.news_page.archive.cards.incubation.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" alt="Pengabdian">
                <div class="card-body">
                    <h3>{{ __('site.news_page.archive.cards.community.title') }}</h3>
                    <p>{{ __('site.news_page.archive.cards.community.description') }}</p>
                </div>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=800&q=80" alt="Kolaborasi Internasional">
                <div class="card-body">
                    <h3>{{ __('site.news_page.archive.cards.collaboration.title') }}</h3>
                    <p>{{ __('site.news_page.archive.cards.collaboration.description') }}</p>
                </div>
            </article>
        </div>
    </section>
@endsection

