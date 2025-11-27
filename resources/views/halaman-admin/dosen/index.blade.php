@extends('layouts.admin')

@section('title', 'Admin - Dosen')

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
<div class="rounded-section border border-borderSoft bg-white shadow-soft">
    <div class="flex flex-col gap-8 lg:flex-row lg:items-stretch">
        @include('partials.admin-sidebar')
        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Dosen</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola data dosen dan portofolio</p>
            </div>

            {{-- Success Alert --}}
            @if(session('success'))
                <div id="success-alert" class="mb-6 flex items-center justify-between rounded-xl border border-green-300 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="text-green-600 hover:text-green-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Error Alert --}}
            @if(session('error') || $errors->any())
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold">{{ session('error') ?? $errors->first() }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="text-red-600 hover:text-red-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Card 1: Dosen --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Dosen</h2>
                    <a href="{{ route('admin.dosen.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($dosen->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Nama</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dosen as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->nama }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->status }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.dosen.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.dosen.destroyDosen', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
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
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Jenis Karya</h2>
                
                {{-- Form Tambah Jenis Karya --}}
                <form method="POST" action="{{ route('admin.dosen.storeJenisKarya') }}" class="mb-6">
                    @csrf
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <input type="text" name="j_karya" id="j_karya" value="{{ old('j_karya') }}" 
                            class="flex-1 rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            placeholder="Masukkan jenis karya" required>
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto sm:px-6">
                            Tambah
                        </button>
                    </div>
                </form>

                {{-- Tabel Jenis Karya --}}
                @if($jenisKarya->count() > 0)
                    <div class="overflow-x-auto -mx-4 sm:mx-0" id="jenis-karya-container">
                        <table class="w-full min-w-[300px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">No.</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Jenis Karya</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="jenis-karya-tbody">
                                @foreach($jenisKarya as $index => $item)
                                    <tr class="jenis-karya-row border-t border-borderSoft transition hover:bg-gray-50" data-index="{{ $index }}">
                                        <td class="jenis-karya-no px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm">{{ $item->j_karya }}</td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center">
                                                <form method="POST" action="{{ route('admin.dosen.destroyJenisKarya', $item) }}" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis karya ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-600 transition hover:bg-red-100 sm:p-2"
                                                        title="Hapus">
                                                        <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Jenis Karya --}}
                    <div id="jenis-karya-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted"></div>
                @else
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada jenis karya.</p>
                @endif
            </div>

            {{-- Card 3: Penelitian --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Penelitian</h2>
                    <a href="{{ route('admin.dosen.penelitian.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($penelitian->count() > 0)
                    <div class="overflow-x-auto" id="penelitian-container">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Judul Penelitian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="penelitian-tbody">
                                @foreach($penelitian as $index => $item)
                                    <tr class="penelitian-row border-b border-borderSoft transition hover:bg-gray-50" data-index="{{ $index }}">
                                        <td class="penelitian-no px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_penelitian }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.dosen.penelitian.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.dosen.destroyPenelitian', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penelitian ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Penelitian --}}
                    <div id="penelitian-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted"></div>
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
                    <a href="{{ route('admin.dosen.pengabdian.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($pengabdian->count() > 0)
                    <div class="overflow-x-auto" id="pengabdian-container">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Judul Pengabdian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengabdian-tbody">
                                @foreach($pengabdian as $index => $item)
                                    <tr class="pengabdian-row border-b border-borderSoft transition hover:bg-gray-50" data-index="{{ $index }}">
                                        <td class="pengabdian-no px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_pengabdian }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.dosen.pengabdian.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.dosen.destroyPengabdian', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengabdian masyarakat ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Pengabdian --}}
                    <div id="pengabdian-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted"></div>
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
                    <a href="{{ route('admin.dosen.publikasi.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($publikasi->count() > 0)
                    <div class="overflow-x-auto" id="publikasi-container">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="publikasi-tbody">
                                @foreach($publikasi as $index => $item)
                                    <tr class="publikasi-row border-b border-borderSoft transition hover:bg-gray-50" data-index="{{ $index }}">
                                        <td class="publikasi-no px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->jenis_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.dosen.publikasi.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.dosen.destroyPublikasi', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus publikasi karya ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Publikasi --}}
                    <div id="publikasi-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted"></div>
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
                    <a href="{{ route('admin.dosen.hki.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($hki->count() > 0)
                    <div class="overflow-x-auto" id="hki-container">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="hki-tbody">
                                @foreach($hki as $index => $item)
                                    <tr class="hki-row border-b border-borderSoft transition hover:bg-gray-50" data-index="{{ $index }}">
                                        <td class="hki-no px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-textDark">{{ $item->judul_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->jenis_karya }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->tahun }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.dosen.hki.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.dosen.destroyHki', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus HKI/Paten ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination HKI --}}
                    <div id="hki-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted"></div>
                @else
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada HKI/Paten yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

<script>
    // Auto-hide alerts
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        [successAlert, errorAlert].forEach(alert => {
            if (alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            }
        });

        // Pagination function
        function initPagination(containerId, rowClass, paginationId, noClass, itemsPerPage = 5) {
            const container = document.getElementById(containerId);
            if (!container) return;

            const rows = container.querySelectorAll('.' + rowClass);
            const paginationEl = document.getElementById(paginationId);
            if (!paginationEl || rows.length === 0) return;

            const totalItems = rows.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            let currentPage = 1;

            function showPage(page) {
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = '';
                        // Update nomor urut berdasarkan halaman aktif
                        const noCell = row.querySelector('.' + noClass);
                        if (noCell) {
                            noCell.textContent = (page - 1) * itemsPerPage + (index - start) + 1;
                        }
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update pagination display
                let paginationHTML = '';
                if (totalPages > 1) {
                    const prevDisabled = currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    const nextDisabled = currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    
                    paginationHTML = `
                        <button onclick="goToPage('${containerId}', '${rowClass}', ${currentPage - 1}, ${totalPages}, ${itemsPerPage}, '${noClass}')" 
                            ${currentPage === 1 ? 'disabled' : ''} 
                            class="${prevDisabled} px-2 py-1 rounded transition">
                            &lt;
                        </button>
                        <span class="px-3">${currentPage} dari ${totalPages}</span>
                        <button onclick="goToPage('${containerId}', '${rowClass}', ${currentPage + 1}, ${totalPages}, ${itemsPerPage}, '${noClass}')" 
                            ${currentPage === totalPages ? 'disabled' : ''} 
                            class="${nextDisabled} px-2 py-1 rounded transition">
                            &gt;
                        </button>
                    `;
                }
                paginationEl.innerHTML = paginationHTML;
            }

            // Store pagination state
            window[containerId + '_pagination'] = {
                currentPage: 1,
                totalPages: totalPages,
                showPage: showPage,
                noClass: noClass
            };

            // Show first page
            showPage(1);
        }

        // Global function to navigate pages
        window.goToPage = function(containerId, rowClass, page, totalPages, itemsPerPage, noClass) {
            if (page < 1 || page > totalPages) return;
            
            const pagination = window[containerId + '_pagination'];
            if (pagination) {
                pagination.currentPage = page;
                
                // Update rows visibility and numbers
                const container = document.getElementById(containerId);
                const rows = container.querySelectorAll('.' + rowClass);
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = '';
                        const noCell = row.querySelector('.' + noClass);
                        if (noCell) {
                            noCell.textContent = (page - 1) * itemsPerPage + (index - start) + 1;
                        }
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update pagination display
                const paginationEl = document.getElementById(containerId.replace('-container', '-pagination'));
                if (paginationEl && totalPages > 1) {
                    const prevDisabled = page === 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    const nextDisabled = page === totalPages ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    
                    paginationEl.innerHTML = `
                        <button onclick="goToPage('${containerId}', '${rowClass}', ${page - 1}, ${totalPages}, ${itemsPerPage}, '${noClass}')" 
                            ${page === 1 ? 'disabled' : ''} 
                            class="${prevDisabled} px-2 py-1 rounded transition">
                            &lt;
                        </button>
                        <span class="px-3">${page} dari ${totalPages}</span>
                        <button onclick="goToPage('${containerId}', '${rowClass}', ${page + 1}, ${totalPages}, ${itemsPerPage}, '${noClass}')" 
                            ${page === totalPages ? 'disabled' : ''} 
                            class="${nextDisabled} px-2 py-1 rounded transition">
                            &gt;
                        </button>
                    `;
                }
            }
        };

        // Initialize pagination for each table
        initPagination('jenis-karya-container', 'jenis-karya-row', 'jenis-karya-pagination', 'jenis-karya-no', 5);
        initPagination('penelitian-container', 'penelitian-row', 'penelitian-pagination', 'penelitian-no', 5);
        initPagination('pengabdian-container', 'pengabdian-row', 'pengabdian-pagination', 'pengabdian-no', 5);
        initPagination('publikasi-container', 'publikasi-row', 'publikasi-pagination', 'publikasi-no', 5);
        initPagination('hki-container', 'hki-row', 'hki-pagination', 'hki-no', 5);
    });
</script>
@endsection
