@extends('layouts.main')

@section('title', 'Dosen')

@section('content')
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <h1 class="hero-title">Profil Dosen</h1>
            <p class="hero-subtitle">Mengenal para pengajar profesional yang menjadi mentor sekaligus mitra riset di Program Studi PTB.</p>
        </div>
    </section>

    <section class="section-card">
        <div class="profile-wrapper">
            <div class="profile-photo">
                <img src="gambar/contoh.png" alt="Dr. Undang">
            </div>
            <div class="profile-info">
                <h2>Dr. Undang, S.P., M.P.</h2>
                <span>Kepala Program Studi</span>
                <p>Spesialisasi pada agroekologi, ketahanan pangan, dan model pertanian regeneratif. Aktif dalam riset pengelolaan tanah berkelanjutan dan pemberdayaan petani muda melalui komunitas inovasi desa.</p>
                <div class="info-grid">
                    <div class="info-badge">
                        <strong>Pendidikan</strong><br>
                        S3 Agroekologi - Wageningen University
                    </div>
                    <div class="info-badge">
                        <strong>Riset Aktif</strong><br>
                        Teknologi biochar & circular agriculture
                    </div>
                    <div class="info-badge">
                        <strong>Penghargaan</strong><br>
                        Green Innovation Award 2024
                    </div>
                    <div class="info-badge">
                        <strong>Publikasi</strong><br>
                        Lebih dari 15 jurnal internasional terindeks Scopus
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2 class="section-header">Tim Dosen</h2>
        <table class="dosen-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Bidang Keahlian</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $dosenList = [
                        [
                            'name' => 'Ir. Bagus Raharjo, M.Sc.',
                            'expertise' => 'Teknologi Irigasi Cerdas',
                            'contact' => 'bagus.raharjo@ptb.ac.id',
                            'action' => 'Detail',
                        ],
                        [
                            'name' => 'Dr. Nurma Hidayati, S.P., M.Si.',
                            'expertise' => 'Keamanan Pangan & Nutrisi',
                            'contact' => 'nurma.hidayati@ptb.ac.id',
                            'action' => 'Detail',
                        ],
                        [
                            'name' => 'Dr. (Cand.) Ardi Prakoso, S.P., M.P.',
                            'expertise' => 'Agribisnis Digital',
                            'contact' => 'ardi.prakoso@ptb.ac.id',
                            'action' => 'Detail',
                        ],
                        [
                            'name' => 'Dr. Silvi Lestari, S.P., M.P.',
                            'expertise' => 'Manajemen Sumber Daya Lahan',
                            'contact' => 'silvi.lestari@ptb.ac.id',
                            'action' => 'Detail',
                        ],
                    ];
                @endphp

                @foreach($dosenList as $row)
                    <tr>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['expertise'] }}</td>
                        <td>{{ $row['contact'] }}</td>
                        <td>
                            <a href="/detail-dosen/{{ Str::slug($row['name']) }}" class="btn btn-primary btn-sm">{{ $row['action'] }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
