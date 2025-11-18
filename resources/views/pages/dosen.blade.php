@extends('layouts.main')

@section('title', 'Dosen')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('dosen') }}" class="transition hover:text-primary text-primaryDark">Dosen</a>
    </nav>

    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Dosen</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Profil Dosen</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Mengenal para pengajar profesional yang menjadi mentor sekaligus mitra riset di Program Studi PTB.</p>
        </div>
    </section>

    <section class="mt-8 rounded-section bg-white p-6 shadow-soft md:mt-6 md:p-8 lg:p-10">
        <div class="mx-auto max-w-5xl">
            <div class="grid gap-6 md:grid-cols-[1fr_1.5fr] md:items-center lg:gap-8">
                <div class="flex justify-center">
                    <div class="w-full max-w-[280px] overflow-hidden rounded-card shadow-soft">
                        <div class="relative w-full" style="padding-bottom: 133.33%;">
                            <img src="{{ asset('gambar/contoh.png') }}" alt="Dr. Undang" class="absolute inset-0 h-full w-full object-cover">
                        </div>
                    </div>
                </div>
                <div class="space-y-5 text-center md:text-left">
                    <div>
                        <h2 class="text-2xl font-semibold text-secondary md:text-3xl">Dr. Undang, S.P., M.P.</h2>
                        <span class="mt-2 inline-flex rounded-full bg-primary/15 px-4 py-1 text-sm font-semibold text-primary">Kepala Program Studi</span>
                    </div>
                    <p class="text-sm leading-relaxed text-textMuted md:text-base">
                        Spesialisasi pada agroekologi, ketahanan pangan, dan model pertanian regeneratif. Aktif dalam riset pengelolaan tanah berkelanjutan dan pemberdayaan petani muda melalui komunitas inovasi desa.
                    </p>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                            <span class="block text-base font-semibold text-textDark">Pendidikan</span>
                            S3 Agroekologi - Wageningen University
                        </div>
                        <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                            <span class="block text-base font-semibold text-textDark">Riset Aktif</span>
                            Teknologi biochar &amp; circular agriculture
                        </div>
                        <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                            <span class="block text-base font-semibold text-textDark">Penghargaan</span>
                            Green Innovation Award 2024
                        </div>
                        <div class="rounded-badge border border-primary/15 bg-accent p-4 text-sm text-textMuted">
                            <span class="block text-base font-semibold text-textDark">Publikasi</span>
                            Lebih dari 15 jurnal internasional terindeks Scopus
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Tim Dosen</h2>
        <div class="mt-8 overflow-hidden rounded-section border border-primary/10 bg-white shadow-soft">
            <table class="w-full table-auto text-left text-sm text-textDark">
                <thead class="bg-accent text-primary">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nama</th>
                        <th class="px-6 py-4 font-semibold">Bidang Keahlian</th>
                        <th class="px-6 py-4 font-semibold">Kontak</th>
                        <th class="px-6 py-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10">
                    @php
                        $dosenList = [
                            [
                                'name' => 'Ir. Bagus Raharjo, M.Sc.',
                                'slug' => 'ir-bagus-raharjo-msc',
                                'expertise' => 'Teknologi Irigasi Cerdas',
                                'contact' => 'bagus.raharjo@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. Nurma Hidayati, S.P., M.Si.',
                                'slug' => 'dr-nurma-hidayati-sp-msi',
                                'expertise' => 'Keamanan Pangan & Nutrisi',
                                'contact' => 'nurma.hidayati@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. (Cand.) Ardi Prakoso, S.P., M.P.',
                                'slug' => 'dr-cand-ardi-prakoso-sp-mp',
                                'expertise' => 'Agribisnis Digital',
                                'contact' => 'ardi.prakoso@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. Silvi Lestari, S.P., M.P.',
                                'slug' => 'dr-silvi-lestari-sp-mp',
                                'expertise' => 'Manajemen Sumber Daya Lahan',
                                'contact' => 'silvi.lestari@ptb.ac.id',
                            ],
                        ];
                    @endphp

                    @foreach($dosenList as $row)
                        <tr class="hover:bg-accent/60">
                            <td class="px-6 py-4 font-semibold">{{ $row['name'] }}</td>
                            <td class="px-6 py-4">{{ $row['expertise'] }}</td>
                            <td class="px-6 py-4 text-primary">{{ $row['contact'] }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('dosen.detail', $row['slug']) }}"
                                   class="inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
