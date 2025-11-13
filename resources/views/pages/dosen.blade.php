@extends('layouts.main')

@section('title', __('site.nav.lecturers'))

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">{{ __('site.lecturers.hero.title') }}</h1>
            <p class="hero-subtitle">{{ __('site.lecturers.hero.subtitle') }}</p>
        </div>
    </section>

    <section class="section-card">
        <div class="profile-wrapper">
            <div class="profile-photo">
                <img src="gambar/contoh.png" alt="Dr. Anindita">
            </div>
            <div class="profile-info">
                <h2>{{ __('site.lecturers.profile.name') }}</h2>
                <span>{{ __('site.lecturers.profile.role') }}</span>
                <p>{{ __('site.lecturers.profile.summary') }}</p>
                <div class="info-grid">
                    <div class="info-badge">
                        <strong>{{ __('site.lecturers.profile.badges.education.title') }}</strong><br>
                        {{ __('site.lecturers.profile.badges.education.description') }}
                    </div>
                    <div class="info-badge">
                        <strong>{{ __('site.lecturers.profile.badges.research.title') }}</strong><br>
                        {{ __('site.lecturers.profile.badges.research.description') }}
                    </div>
                    <div class="info-badge">
                        <strong>{{ __('site.lecturers.profile.badges.award.title') }}</strong><br>
                        {{ __('site.lecturers.profile.badges.award.description') }}
                    </div>
                    <div class="info-badge">
                        <strong>{{ __('site.lecturers.profile.badges.award.title') }}</strong><br>
                        {{ __('site.lecturers.profile.badges.award.description') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">{{ __('site.lecturers.team.title') }}</h2>
        <table class="dosen-table">
            <thead>
            <tr>
                <th>{{ __('site.lecturers.team.table.name') }}</th>
                <th>{{ __('site.lecturers.team.table.expertise') }}</th>
                <th>{{ __('site.lecturers.team.table.contact') }}</th>
                <th>{{ __('site.lecturers.team.table.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach(__('site.lecturers.team.table.rows') as $row)
                <tr>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['expertise'] }}</td>
                    <td>{{ $row['contact'] }}</td>
                    <td>
                        <a href="/detail-dosen/{{ Str::slug($row['name']) }}" class="btn btn-primary">{{ $row['action'] }}</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection

