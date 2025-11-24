@extends('layouts.main')

@section('title', 'Dosen')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
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

    @if($kepalaProdi)
    <section class="mt-4 rounded-section bg-white p-4 shadow-soft md:mt-3 md:p-6 lg:p-8">
        <div class="w-full">
            <div class="grid gap-3 md:grid-cols-[1fr_1.5fr]">
                <div class="space-y-2 text-center">
                    <div>
                        <h2 class="text-lg font-semibold text-secondary md:text-xl">{{ $kepalaProdi->nama }}</h2>
                        <span class="mt-1 inline-flex rounded-full bg-primary/15 px-3 py-0.5 text-xs font-semibold text-primary">Kepala Program Studi</span>
                    </div>
                <div class="flex justify-center">
                        <div class="w-full max-w-[160px] overflow-hidden rounded-card shadow-soft">
                            <div class="relative w-full pb-[133.33%] bg-gray-200">
                                @if($kepalaProdi->foto)
                                    <img src="{{ Storage::url($kepalaProdi->foto) }}" alt="{{ $kepalaProdi->nama }}" class="absolute inset-0 h-full w-full object-cover">
                                @else
                                    <div class="absolute inset-0 flex h-full w-full items-center justify-center bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-16 w-16 text-[#1e3a5f]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="grid gap-2 sm:grid-cols-2">
                        <!-- Card Pendidikan (Span 2 kolom) -->
                        @if($kepalaProdi->slug)
                            <a href="{{ route('dosen.detail', $kepalaProdi->slug) }}" class="sm:col-span-2 w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50 transition-all">
                        @else
                            <div class="sm:col-span-2 w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50">
                        @endif
                            <div class="mb-2 flex items-center gap-2">
                                <div class="flex-shrink-0 rounded-full bg-primary/15 p-1.5">
                                    <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold text-textDark">Pendidikan</span>
                            </div>
                            <ul class="space-y-1.5 text-xs text-textMuted">
                                @if($kepalaProdi->pendidikan)
                                    @foreach(explode("\n", $kepalaProdi->pendidikan) as $pendidikan)
                                        @if(trim($pendidikan))
                                            <li>{{ trim($pendidikan) }}</li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="text-textMuted">-</li>
                                @endif
                            </ul>
                        @if($kepalaProdi->slug)
                            </a>
                        @else
                            </div>
                        @endif
                        
                        <!-- Card Penelitian -->
                        @if($kepalaProdi->slug)
                            <a href="{{ route('dosen.detail', $kepalaProdi->slug) }}" class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50 transition-all">
                        @else
                            <div class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50">
                        @endif
                            <div class="mb-2 flex items-center gap-2">
                                <div class="rounded-full bg-primary/15 p-1">
                                    <svg class="h-3.5 w-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-textDark">Penelitian</span>
                            </div>
                            <div class="mt-auto">
                                <p class="text-xl font-bold text-primary md:text-2xl">{{ \App\Models\Penelitian::where('dosen_id', $kepalaProdi->id_dosen)->count() }}+</p>
                            </div>
                        @if($kepalaProdi->slug)
                            </a>
                        @else
                            </div>
                        @endif
                        
                        <!-- Card Pengabdian Masyarakat -->
                        @if($kepalaProdi->slug)
                            <a href="{{ route('dosen.detail', $kepalaProdi->slug) }}" class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50 transition-all">
                        @else
                            <div class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50">
                        @endif
                            <div class="mb-2 flex items-center gap-2">
                                <div class="rounded-full bg-primary/15 p-1">
                                    <svg class="h-3.5 w-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-textDark">Pengabdian Masyarakat</span>
                            </div>
                            <div class="mt-auto">
                                <p class="text-xl font-bold text-primary md:text-2xl">{{ \App\Models\Pengabdian::where('dosen_id', $kepalaProdi->id_dosen)->count() }}+</p>
                            </div>
                        @if($kepalaProdi->slug)
                            </a>
                        @else
                            </div>
                        @endif
                        
                        <!-- Card Publikasi Karya -->
                        @if($kepalaProdi->slug)
                            <a href="{{ route('dosen.detail', $kepalaProdi->slug) }}" class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50 transition-all">
                        @else
                            <div class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50">
                        @endif
                            <div class="mb-2 flex items-center gap-2">
                                <div class="rounded-full bg-primary/15 p-1">
                                    <svg class="h-3.5 w-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-textDark">Publikasi Karya</span>
                            </div>
                            <div class="mt-auto">
                                <p class="text-xl font-bold text-primary md:text-2xl">{{ \App\Models\Publikasi::where('dosen_id', $kepalaProdi->id_dosen)->count() }}+</p>
                            </div>
                        @if($kepalaProdi->slug)
                            </a>
                        @else
                    </div>
                        @endif
                        
                        <!-- Card HKI/Paten -->
                        @if($kepalaProdi->slug)
                            <a href="{{ route('dosen.detail', $kepalaProdi->slug) }}" class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50 transition-all">
                        @else
                            <div class="flex h-full flex-col w-full rounded-badge border border-primary/15 border-l-4 border-l-primary p-3 cursor-pointer hover:bg-slate-50">
                        @endif
                            <div class="mb-2 flex items-center gap-2">
                                <div class="rounded-full bg-primary/15 p-1">
                                    <svg class="h-3.5 w-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                        </div>
                                <span class="text-xs font-medium text-textDark">HKI/Paten</span>
                        </div>
                            <div class="mt-auto">
                                <p class="text-xl font-bold text-primary md:text-2xl">{{ \App\Models\Hki::where('dosen_id', $kepalaProdi->id_dosen)->count() }}+</p>
                        </div>
                        @if($kepalaProdi->slug)
                            </a>
                        @else
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

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
                    @if(isset($dosenList) && $dosenList->count() > 0)
                        @foreach($dosenList as $dosen)
                            <tr class="hover:bg-accent/60">
                                <td class="px-6 py-4 font-semibold">{{ $dosen->nama ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    @if(!empty($dosen->bidang_keahlian))
                                        @php
                                            $bidangArray = array_filter(array_map('trim', explode("\n", $dosen->bidang_keahlian)));
                                            $bidangDisplay = array_slice($bidangArray, 0, 2);
                    @endphp
                                        {{ implode(', ', $bidangDisplay) }}
                                        @if(count($bidangArray) > 2)
                                            ...
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-primary">{{ $dosen->email ?? '-' }}</td>
                            <td class="px-6 py-4">
                                    @if($dosen->slug)
                                        <a href="{{ route('dosen.detail', $dosen->slug) }}"
                                   class="inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                                    Detail
                                </a>
                                    @else
                                        <span class="text-xs text-textMuted">-</span>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-textMuted">Belum ada data dosen.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
