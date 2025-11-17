@extends('layouts.main')

@section('title', 'Detail Kurikulum')

@section('content')
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('kurikulum') }}" class="transition hover:text-primary">Kurikulum</a>
        <span> > </span>
        <a href="{{ route('kurikulum.detail') }}" class="transition hover:text-primary text-primaryDark">Detail Kurikulum</a>
    </nav>

    {{-- Hero Section --}}
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">
                Detail Kurikulum
            </span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                Struktur Mata Kuliah per Semester
            </h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">
                Rincian mata kuliah dari Semester 1 sampai Semester 8, lengkap dengan kode, status mata kuliah, dan jumlah SKS.
            </p>
        </div>
    </section>

    {{-- Tabel Kurikulum per Semester --}}
    <section class="mt-12 space-y-10 md:mt-16">
        @php
            $semesters = [
                1 => 'Semester 1',
                2 => 'Semester 2',
                3 => 'Semester 3',
                4 => 'Semester 4',
                5 => 'Semester 5',
                6 => 'Semester 6',
                7 => 'Semester 7',
                8 => 'Semester 8',
            ];
        @endphp

        @foreach($semesters as $number => $label)
            <section class="rounded-section bg-white p-6 shadow-soft md:p-8">
                <div class="mb-4 flex items-center justify-between gap-4">
                    <h2 class="text-2xl font-semibold text-secondary md:text-3xl">
                        {{ $label }}
                    </h2>
                    <span class="rounded-full bg-primary/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-primary">
                        Kurikulum PTB
                    </span>
                </div>

                <div class="overflow-x-auto rounded-section border border-primary/10 bg-white">
                    <table class="min-w-full table-auto text-left text-sm text-textDark">
                        <thead class="bg-accent text-primary">
                        <tr>
                            <th class="px-4 py-3 font-semibold md:px-6 md:py-4">No</th>
                            <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Kode</th>
                            <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Nama</th>
                            <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Status MK</th>
                            <th class="px-4 py-3 font-semibold md:px-6 md:py-4">SKS</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-primary/10">
                        {{-- Contoh baris data; silakan sesuaikan dengan data kurikulum riil --}}
                        <tr class="hover:bg-accent/60">
                            <td class="px-4 py-3 md:px-6 md:py-4">1</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">PTB{{ sprintf('%01d', $number) }}01</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Nama Mata Kuliah 1</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Vokasi</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">3</td>
                        </tr>
                        <tr class="hover:bg-accent/60">
                            <td class="px-4 py-3 md:px-6 md:py-4">2</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">PTB{{ sprintf('%01d', $number) }}02</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Nama Mata Kuliah 2</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Vokasi</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">3</td>
                        </tr>
                        <tr class="hover:bg-accent/60">
                            <td class="px-4 py-3 md:px-6 md:py-4">3</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">PTB{{ sprintf('%01d', $number) }}03</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Nama Mata Kuliah 3</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">Vokasi</td>
                            <td class="px-4 py-3 md:px-6 md:py-4">2</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        @endforeach
    </section>
@endsection


