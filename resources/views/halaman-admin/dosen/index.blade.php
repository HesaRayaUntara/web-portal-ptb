@extends('layouts.admin')

@section('title', 'Admin - Dosen')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
<div class="rounded-section border border-borderSoft bg-white shadow-soft">
    <div class="flex flex-col gap-8 lg:flex-row">
        <aside class="w-full border-borderSoft bg-[#F4F7F3] p-6 lg:w-80 lg:border-r">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-3 rounded-card bg-white px-4 py-3 shadow-soft">
                    <img src="{{ asset('gambar/logo-ptb.png') }}" alt="Logo PTB" class="h-12 w-12 rounded-full border border-primary/30 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-textDark">Pemuliaan Tanaman</p>
                        <p class="text-xs text-textMuted">dan Teknologi Benih</p>
                    </div>
                </div>
                <nav class="space-y-1 text-sm font-semibold text-textMuted">
                    <a href="{{ route('admin.dashboard') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Dasbor</a>
                    <a href="{{ route('admin.profil.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                    <a href="{{ route('admin.fasilitas.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Fasilitas</a>
                    <a href="{{ route('admin.kurikulum.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <a href="{{ route('admin.staf.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Staf</a>
                    <a href="{{ route('admin.dosen.index') }}" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Profil Dosen</a>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Galeri</button>
                </nav>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-primary/20 bg-white px-4 py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white">
                        <span>Keluar Admin</span>
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Dosen</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola data dosen dan portofolio</p>
            </div>

            {{-- Alert Messages --}}
            <div id="alert-container" class="mb-6"></div>

            {{-- Card 1: Dosen --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Dosen</h2>
                    <button onclick="openModalDosen()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($dosen->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Foto</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Nama</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dosen as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if($item->foto)
                                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}" class="h-16 w-16 rounded-lg object-cover">
                                            @else
                                                <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200 text-xs text-gray-400">No Image</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm font-semibold text-textDark whitespace-nowrap">{{ $item->nama }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->status }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-dosen="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-dosen="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada dosen yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- Card 2: Jenis Karya --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Jenis Karya</h2>
                    <button onclick="openModalJenisKarya()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($jenisKarya->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisKarya as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->j_karya }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-jenis-karya="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-jenis-karya="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada jenis karya yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- Card 3: Penelitian --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Penelitian</h2>
                    <button onclick="openModalPenelitian()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($penelitian->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Penelitian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penelitian as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_penelitian }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-penelitian="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-penelitian="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada penelitian yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- Card 4: Pengabdian Masyarakat --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Pengabdian Masyarakat</h2>
                    <button onclick="openModalPengabdian()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($pengabdian->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Pengabdian Masyarakat</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengabdian as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_pengabdian }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-pengabdian="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-pengabdian="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada pengabdian masyarakat yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- Card 5: Publikasi Karya --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Publikasi Karya</h2>
                    <button onclick="openModalPublikasi()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($publikasi->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publikasi as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->jenis_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-publikasi="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-publikasi="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada publikasi karya yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- Card 6: HKI/Paten --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">HKI/Paten</h2>
                    <button onclick="openModalHki()" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </button>
                </div>

                @if($hki->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hki as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->jenis_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <button data-edit-hki="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button data-delete-hki="{{ $item->id }}" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada HKI/Paten yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

{{-- Modal Dosen --}}
<div id="modal-dosen" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-2xl rounded-xl bg-white p-6 shadow-soft max-h-[90vh] overflow-y-auto">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-dosen-title">Tambah Dosen</h3>
            <button onclick="closeModalDosen()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-dosen" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dosen-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Nama <span class="text-red-500">*</span></label>
                    <input type="text" id="dosen-nama" name="nama" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Status <span class="text-red-500">*</span></label>
                    <select id="dosen-status" name="status" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Status</option>
                        <option value="dosen tetap">Dosen Tetap</option>
                        <option value="dosen tidak tetap">Dosen Tidak Tetap</option>
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Bidang Keahlian</label>
                    <textarea id="dosen-bidang-keahlian" name="bidang_keahlian" rows="4" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none" placeholder="Setiap poin dipisahkan dengan baris baru"></textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Pendidikan</label>
                    <textarea id="dosen-pendidikan" name="pendidikan" rows="4" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none" placeholder="Format: Jenjang Pendidikan - Perguruan Tinggi (tahun)&#10;Contoh: S3 - Institut Pertanian Bogor (2006)&#10;Setiap poin dipisahkan dengan baris baru"></textarea>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Email</label>
                    <input type="email" id="dosen-email" name="email" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Link Google Scholar</label>
                    <input type="url" id="dosen-gsch" name="gsch" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Foto</label>
                    <input type="file" id="dosen-foto" name="foto" accept="image/jpeg,image/jpg,image/png" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                    <div id="dosen-foto-preview" class="mt-2"></div>
                </div>
                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" id="dosen-kepala-prodi" name="kepala_program_studi" value="1" 
                            @if($hasKepalaProdi) disabled @endif
                            class="rounded border-borderSoft text-primary focus:ring-primary">
                        <span class="text-sm font-semibold text-textDark">Kepala Program Studi</span>
                        @if($hasKepalaProdi)
                            <span class="text-xs text-textMuted">(Sudah ada kepala program studi, hapus terlebih dahulu untuk menambahkan yang baru)</span>
                        @endif
                    </label>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalDosen()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Jenis Karya --}}
<div id="modal-jenis-karya" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-soft">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-jenis-karya-title">Tambah Jenis Karya</h3>
            <button onclick="closeModalJenisKarya()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-jenis-karya">
            @csrf
            <input type="hidden" id="jenis-karya-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Jenis Karya <span class="text-red-500">*</span></label>
                    <input type="text" id="jenis-karya-j_karya" name="j_karya" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalJenisKarya()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Penelitian --}}
<div id="modal-penelitian" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-soft">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-penelitian-title">Tambah Penelitian</h3>
            <button onclick="closeModalPenelitian()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-penelitian">
            @csrf
            <input type="hidden" id="penelitian-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Dosen</label>
                    <select id="penelitian-dosen-id" name="dosen_id" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Dosen (Opsional)</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Judul Penelitian <span class="text-red-500">*</span></label>
                    <input type="text" id="penelitian-judul" name="judul_penelitian" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" id="penelitian-tahun" name="tahun" required min="1900" max="{{ date('Y') }}" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalPenelitian()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Pengabdian --}}
<div id="modal-pengabdian" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-soft">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-pengabdian-title">Tambah Pengabdian Masyarakat</h3>
            <button onclick="closeModalPengabdian()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-pengabdian">
            @csrf
            <input type="hidden" id="pengabdian-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Dosen</label>
                    <select id="pengabdian-dosen-id" name="dosen_id" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Dosen (Opsional)</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Judul Pengabdian Masyarakat <span class="text-red-500">*</span></label>
                    <input type="text" id="pengabdian-judul" name="judul_pengabdian" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" id="pengabdian-tahun" name="tahun" required min="1900" max="{{ date('Y') }}" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalPengabdian()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Publikasi --}}
<div id="modal-publikasi" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-soft">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-publikasi-title">Tambah Publikasi Karya</h3>
            <button onclick="closeModalPublikasi()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-publikasi">
            @csrf
            <input type="hidden" id="publikasi-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Dosen</label>
                    <select id="publikasi-dosen-id" name="dosen_id" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Dosen (Opsional)</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Judul Karya <span class="text-red-500">*</span></label>
                    <input type="text" id="publikasi-judul" name="judul_karya" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Jenis Karya <span class="text-red-500">*</span></label>
                    <select id="publikasi-jenis" name="jenis_karya" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Jenis Karya</option>
                        @foreach($jenisKarya as $jk)
                            <option value="{{ $jk->j_karya }}">{{ $jk->j_karya }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" id="publikasi-tahun" name="tahun" required min="1900" max="{{ date('Y') }}" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalPublikasi()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal HKI --}}
<div id="modal-hki" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-soft">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-textDark" id="modal-hki-title">Tambah HKI/Paten</h3>
            <button onclick="closeModalHki()" class="text-textMuted hover:text-textDark">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="form-hki">
            @csrf
            <input type="hidden" id="hki-id" name="id">
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Dosen</label>
                    <select id="hki-dosen-id" name="dosen_id" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Dosen (Opsional)</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Judul Karya <span class="text-red-500">*</span></label>
                    <input type="text" id="hki-judul" name="judul_karya" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Jenis Karya <span class="text-red-500">*</span></label>
                    <select id="hki-jenis" name="jenis_karya" required class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                        <option value="">Pilih Jenis Karya</option>
                        @foreach($jenisKarya as $jk)
                            <option value="{{ $jk->j_karya }}">{{ $jk->j_karya }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-semibold text-textDark">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" id="hki-tahun" name="tahun" required min="1900" max="{{ date('Y') }}" class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModalHki()" class="rounded-lg border border-borderSoft px-4 py-2 text-sm font-semibold text-textDark transition hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white transition hover:bg-primaryDark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script id="admin-dosen-data" type="application/json">
{!! json_encode([
    'dosen' => $dosen,
    'hasKepalaProdi' => $hasKepalaProdi,
    'jenisKarya' => $jenisKarya,
    'penelitian' => $penelitian,
    'pengabdian' => $pengabdian,
    'publikasi' => $publikasi,
    'hki' => $hki
]) !!}
</script>
<script>
    // Parse data from JSON script tag
    const adminDosenData = JSON.parse(document.getElementById('admin-dosen-data').textContent);
    const dosenData = adminDosenData.dosen;
    const hasKepalaProdi = adminDosenData.hasKepalaProdi;
    const jenisKaryaData = adminDosenData.jenisKarya;
    const penelitianData = adminDosenData.penelitian;
    const pengabdianData = adminDosenData.pengabdian;
    const publikasiData = adminDosenData.publikasi;
    const hkiData = adminDosenData.hki;

    // Alert functions
    function showAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alert-container');
        const alertClass = type === 'success' ? 'border-green-300 bg-green-50 text-green-800' : 'border-red-300 bg-red-50 text-red-800';
        const iconColor = type === 'success' ? 'text-green-600' : 'text-red-600';
        
        alertContainer.innerHTML = `
            <div class="flex items-center justify-between rounded-xl border ${alertClass} px-4 py-3 text-sm shadow-soft animate-slide-down">
                <div class="flex items-center gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 ${iconColor}" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' 
                            ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
                            : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>'
                        }
                    </svg>
                    <span class="font-semibold">${message}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="${iconColor} hover:opacity-75">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        `;
        
        setTimeout(() => {
            const alert = alertContainer.querySelector('div');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    }

    // Dosen CRUD

    function openModalDosen(id = null) {
        const modal = document.getElementById('modal-dosen');
        const form = document.getElementById('form-dosen');
        const title = document.getElementById('modal-dosen-title');
        
        form.reset();
        document.getElementById('dosen-foto-preview').innerHTML = '';
        
        // Reset checkbox state
        const checkbox = document.getElementById('dosen-kepala-prodi');
        checkbox.checked = false;
        
        if (id) {
            const dosen = dosenData.find(d => d.id === id);
            if (dosen) {
                title.textContent = 'Edit Dosen';
                document.getElementById('dosen-id').value = dosen.id;
                document.getElementById('dosen-nama').value = dosen.nama;
                document.getElementById('dosen-status').value = dosen.status;
                document.getElementById('dosen-bidang-keahlian').value = dosen.bidang_keahlian || '';
                document.getElementById('dosen-pendidikan').value = dosen.pendidikan || '';
                document.getElementById('dosen-email').value = dosen.email || '';
                document.getElementById('dosen-gsch').value = dosen.gsch || '';
                // Check if kepala prodi checkbox should be disabled
                const checkbox = document.getElementById('dosen-kepala-prodi');
                // Check if this dosen is kepala prodi (handle null, false, true, 1, 0)
                const isKepalaProdi = dosen.kepala_program_studi === true || dosen.kepala_program_studi === 1 || dosen.kepala_program_studi === '1';
                
                // Disable checkbox if:
                // 1. There's already a kepala prodi AND this dosen is NOT the kepala prodi
                if (hasKepalaProdi && !isKepalaProdi) {
                    checkbox.disabled = true;
                    checkbox.checked = false; // Ensure unchecked when disabled
                } else {
                    checkbox.disabled = false;
                    // Set checked state only if enabled and this dosen is kepala prodi
                    checkbox.checked = isKepalaProdi;
                }
                
                if (dosen.foto) {
                    document.getElementById('dosen-foto-preview').innerHTML = `
                        <img src="/storage/${dosen.foto}" alt="Preview" class="h-32 w-32 rounded-lg object-cover">
                    `;
                }
            }
        } else {
            title.textContent = 'Tambah Dosen';
            const checkbox = document.getElementById('dosen-kepala-prodi');
            if (hasKepalaProdi) {
                checkbox.disabled = true;
                checkbox.checked = false; // Ensure unchecked when disabled
            } else {
                checkbox.disabled = false;
                checkbox.checked = false; // Default unchecked for new dosen
            }
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalDosen() {
        const modal = document.getElementById('modal-dosen');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-dosen').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('dosen-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updateDosen", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storeDosen") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        if (!formData.has('kepala_program_studi')) {
            formData.append('kepala_program_studi', '0');
        }
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalDosen();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editDosen(id) {
        openModalDosen(id);
    }

    async function deleteDosen(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus dosen ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyDosen", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // Preview foto
    document.getElementById('dosen-foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('dosen-foto-preview').innerHTML = `
                    <img src="${e.target.result}" alt="Preview" class="h-32 w-32 rounded-lg object-cover">
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Jenis Karya CRUD

    function openModalJenisKarya(id = null) {
        const modal = document.getElementById('modal-jenis-karya');
        const form = document.getElementById('form-jenis-karya');
        const title = document.getElementById('modal-jenis-karya-title');
        
        form.reset();
        
        if (id) {
            const item = jenisKaryaData.find(j => j.id === id);
            if (item) {
                title.textContent = 'Edit Jenis Karya';
                document.getElementById('jenis-karya-id').value = item.id;
                document.getElementById('jenis-karya-j_karya').value = item.j_karya;
            }
        } else {
            title.textContent = 'Tambah Jenis Karya';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalJenisKarya() {
        const modal = document.getElementById('modal-jenis-karya');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-jenis-karya').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('jenis-karya-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updateJenisKarya", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storeJenisKarya") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalJenisKarya();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editJenisKarya(id) {
        openModalJenisKarya(id);
    }

    async function deleteJenisKarya(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus jenis karya ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyJenisKarya", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // Penelitian CRUD

    function openModalPenelitian(id = null) {
        const modal = document.getElementById('modal-penelitian');
        const form = document.getElementById('form-penelitian');
        const title = document.getElementById('modal-penelitian-title');
        
        form.reset();
        
        if (id) {
            const item = penelitianData.find(p => p.id === id);
            if (item) {
                title.textContent = 'Edit Penelitian';
                document.getElementById('penelitian-id').value = item.id;
                document.getElementById('penelitian-dosen-id').value = item.dosen_id || '';
                document.getElementById('penelitian-judul').value = item.judul_penelitian;
                document.getElementById('penelitian-tahun').value = item.tahun;
            }
        } else {
            title.textContent = 'Tambah Penelitian';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalPenelitian() {
        const modal = document.getElementById('modal-penelitian');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-penelitian').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('penelitian-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updatePenelitian", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storePenelitian") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalPenelitian();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editPenelitian(id) {
        openModalPenelitian(id);
    }

    async function deletePenelitian(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus penelitian ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyPenelitian", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // Pengabdian CRUD

    function openModalPengabdian(id = null) {
        const modal = document.getElementById('modal-pengabdian');
        const form = document.getElementById('form-pengabdian');
        const title = document.getElementById('modal-pengabdian-title');
        
        form.reset();
        
        if (id) {
            const item = pengabdianData.find(p => p.id === id);
            if (item) {
                title.textContent = 'Edit Pengabdian Masyarakat';
                document.getElementById('pengabdian-id').value = item.id;
                document.getElementById('pengabdian-dosen-id').value = item.dosen_id || '';
                document.getElementById('pengabdian-judul').value = item.judul_pengabdian;
                document.getElementById('pengabdian-tahun').value = item.tahun;
            }
        } else {
            title.textContent = 'Tambah Pengabdian Masyarakat';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalPengabdian() {
        const modal = document.getElementById('modal-pengabdian');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-pengabdian').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('pengabdian-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updatePengabdian", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storePengabdian") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalPengabdian();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editPengabdian(id) {
        openModalPengabdian(id);
    }

    async function deletePengabdian(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus pengabdian masyarakat ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyPengabdian", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // Publikasi CRUD

    function openModalPublikasi(id = null) {
        const modal = document.getElementById('modal-publikasi');
        const form = document.getElementById('form-publikasi');
        const title = document.getElementById('modal-publikasi-title');
        
        form.reset();
        
        if (id) {
            const item = publikasiData.find(p => p.id === id);
            if (item) {
                title.textContent = 'Edit Publikasi Karya';
                document.getElementById('publikasi-id').value = item.id;
                document.getElementById('publikasi-dosen-id').value = item.dosen_id || '';
                document.getElementById('publikasi-judul').value = item.judul_karya;
                document.getElementById('publikasi-jenis').value = item.jenis_karya;
                document.getElementById('publikasi-tahun').value = item.tahun;
            }
        } else {
            title.textContent = 'Tambah Publikasi Karya';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalPublikasi() {
        const modal = document.getElementById('modal-publikasi');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-publikasi').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('publikasi-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updatePublikasi", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storePublikasi") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalPublikasi();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editPublikasi(id) {
        openModalPublikasi(id);
    }

    async function deletePublikasi(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus publikasi karya ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyPublikasi", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // HKI CRUD

    function openModalHki(id = null) {
        const modal = document.getElementById('modal-hki');
        const form = document.getElementById('form-hki');
        const title = document.getElementById('modal-hki-title');
        
        form.reset();
        
        if (id) {
            const item = hkiData.find(h => h.id === id);
            if (item) {
                title.textContent = 'Edit HKI/Paten';
                document.getElementById('hki-id').value = item.id;
                document.getElementById('hki-dosen-id').value = item.dosen_id || '';
                document.getElementById('hki-judul').value = item.judul_karya;
                document.getElementById('hki-jenis').value = item.jenis_karya;
                document.getElementById('hki-tahun').value = item.tahun;
            }
        } else {
            title.textContent = 'Tambah HKI/Paten';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModalHki() {
        const modal = document.getElementById('modal-hki');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('form-hki').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const id = document.getElementById('hki-id').value;
        const url = id 
            ? '{{ route("admin.dosen.updateHki", ":id") }}'.replace(':id', id)
            : '{{ route("admin.dosen.storeHki") }}';
        const method = id ? 'PUT' : 'POST';
        
        formData.append('_method', method === 'PUT' ? 'PUT' : 'POST');
        
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                closeModalHki();
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    });

    function editHki(id) {
        openModalHki(id);
    }

    async function deleteHki(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus HKI/Paten ini?')) return;
        
        try {
            const response = await fetch('{{ route("admin.dosen.destroyHki", ":id") }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showAlert(data.message, 'error');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan: ' + error.message, 'error');
        }
    }

    // Event listeners for edit/delete buttons using data attributes
    document.addEventListener('click', function(e) {
        // Dosen
        if (e.target.closest('[data-edit-dosen]')) {
            const id = parseInt(e.target.closest('[data-edit-dosen]').getAttribute('data-edit-dosen'));
            editDosen(id);
        }
        if (e.target.closest('[data-delete-dosen]')) {
            const id = parseInt(e.target.closest('[data-delete-dosen]').getAttribute('data-delete-dosen'));
            deleteDosen(id);
        }
        // Jenis Karya
        if (e.target.closest('[data-edit-jenis-karya]')) {
            const id = parseInt(e.target.closest('[data-edit-jenis-karya]').getAttribute('data-edit-jenis-karya'));
            editJenisKarya(id);
        }
        if (e.target.closest('[data-delete-jenis-karya]')) {
            const id = parseInt(e.target.closest('[data-delete-jenis-karya]').getAttribute('data-delete-jenis-karya'));
            deleteJenisKarya(id);
        }
        // Penelitian
        if (e.target.closest('[data-edit-penelitian]')) {
            const id = parseInt(e.target.closest('[data-edit-penelitian]').getAttribute('data-edit-penelitian'));
            editPenelitian(id);
        }
        if (e.target.closest('[data-delete-penelitian]')) {
            const id = parseInt(e.target.closest('[data-delete-penelitian]').getAttribute('data-delete-penelitian'));
            deletePenelitian(id);
        }
        // Pengabdian
        if (e.target.closest('[data-edit-pengabdian]')) {
            const id = parseInt(e.target.closest('[data-edit-pengabdian]').getAttribute('data-edit-pengabdian'));
            editPengabdian(id);
        }
        if (e.target.closest('[data-delete-pengabdian]')) {
            const id = parseInt(e.target.closest('[data-delete-pengabdian]').getAttribute('data-delete-pengabdian'));
            deletePengabdian(id);
        }
        // Publikasi
        if (e.target.closest('[data-edit-publikasi]')) {
            const id = parseInt(e.target.closest('[data-edit-publikasi]').getAttribute('data-edit-publikasi'));
            editPublikasi(id);
        }
        if (e.target.closest('[data-delete-publikasi]')) {
            const id = parseInt(e.target.closest('[data-delete-publikasi]').getAttribute('data-delete-publikasi'));
            deletePublikasi(id);
        }
        // HKI
        if (e.target.closest('[data-edit-hki]')) {
            const id = parseInt(e.target.closest('[data-edit-hki]').getAttribute('data-edit-hki'));
            editHki(id);
        }
        if (e.target.closest('[data-delete-hki]')) {
            const id = parseInt(e.target.closest('[data-delete-hki]').getAttribute('data-delete-hki'));
            deleteHki(id);
        }
    });

    // Close modal when clicking outside
    document.querySelectorAll('[id^="modal-"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
            }
        });
    });
</script>
@endsection

