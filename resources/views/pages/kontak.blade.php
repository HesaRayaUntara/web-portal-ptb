@extends('layouts.main')

@section('title', __('site.nav.contact'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.contact.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.contact.hero.subtitle') }}</p>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.contact.info.title') }}</h2>
        <div class="info-grid">
            @foreach(__('site.contact.info.items') as $item)
                <div class="info-badge">
                    <strong>{{ $item['title'] }}</strong><br>{{ $item['description'] }}
                </div>
            @endforeach
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.contact.form.title') }}</h2>
        <form class="info-grid" style="gap: 20px;">
            <label>
                <span>{{ __('site.contact.form.name') }}</span>
                <input type="text" placeholder="{{ __('site.contact.form.name_placeholder') }}" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7;">
            </label>
            <label>
                <span>{{ __('site.contact.form.email') }}</span>
                <input type="email" placeholder="{{ __('site.contact.form.email_placeholder') }}" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7;">
            </label>
            <label style="grid-column: 1 / -1;">
                <span>{{ __('site.contact.form.message') }}</span>
                <textarea rows="4" placeholder="{{ __('site.contact.form.message_placeholder') }}" style="width: 100%; padding: 14px; border-radius: var(--radius-sm); border: 1px solid #d7ded7; resize: vertical;"></textarea>
            </label>
            <div style="grid-column: 1 / -1; display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary">{{ __('site.contact.form.submit') }}</button>
            </div>
        </form>
    </section>
@endsection

