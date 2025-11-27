@extends('layouts.admin')

@section('title', 'Admin - Profil Program Studi')

@section('content')
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
                    <a href="{{ route('admin.profil.index') }}" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Profil Program Studi</a>
                    <a href="{{ route('admin.fasilitas.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Fasilitas</a>
                    <a href="{{ route('admin.kurikulum.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <a href="{{ route('admin.staf.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Staf</a>
                    <a href="{{ route('admin.dosen.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</a>
                    <a href="{{ route('admin.berita.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</a>
                    <a href="{{ route('admin.galeri.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Galeri</a>
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
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-textDark">Profil Program Studi</h1>
                    <p class="mt-1 text-sm text-textMuted">Kelola informasi profil program studi</p>
                </div>
                @if(!$profilProdi)
                    <a href="{{ route('admin.profil.create') }}" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah Prodi
                    </a>
                @endif
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
            @if(session('error'))
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="text-red-600 hover:text-red-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Table Profil Prodi --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse table-fixed">
                        <colgroup>
                            <col style="width: auto;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead>
                            <tr class="bg-[#F4F7F3]">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Halaman</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($profilProdi)
                                <tr class="border-t border-borderSoft">
                                    <td class="px-4 py-3 text-sm text-textDark">Profil PTB</td>
                                    <td class="px-4 py-3 text-left">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.profil.edit', $profilProdi) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.profil.destroy', $profilProdi) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil program studi?');" class="inline">
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
                            @else
                                <tr class="border-t border-borderSoft">
                                    <td colspan="2" class="px-4 py-8 text-center text-sm text-textMuted">
                                        Belum ada profil program studi. Klik tombol "Tambah Prodi" untuk membuat profil baru.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Table Profil Lulusan --}}
            <div class="rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-textDark">Profil Lulusan</h2>
                    </div>
                    <a href="{{ route('admin.profil-lulusan.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-[#F4F7F3]">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Peran</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Deskripsi Kemampuan</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($profilLulusan) && $profilLulusan->count() > 0)
                                @foreach($profilLulusan as $index => $lulusan)
                                <tr class="border-t border-borderSoft">
                                    <td class="px-4 py-3 text-sm text-textDark">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-sm text-textDark">{{ Str::limit($lulusan->peran, 50) }}</td>
                                    <td class="px-4 py-3 text-sm text-textDark">{{ Str::limit($lulusan->deskripsi_kemampuan, 100) }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-start gap-2">
                                            <a href="{{ route('admin.profil-lulusan.edit', $lulusan) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.profil-lulusan.destroy', $lulusan) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil lulusan ini?');" class="inline">
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
                            @else
                                <tr class="border-t border-borderSoft">
                                    <td colspan="4" class="px-4 py-8 text-center text-sm text-textMuted">
                                        Belum ada profil lulusan. Klik tombol "Tambah Profil Lulusan" untuk membuat profil baru.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Table Mitra --}}
            <div class="mt-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-textDark">Mitra</h2>
                    </div>
                    <a href="{{ route('admin.mitra.create') }}" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-[#F4F7F3]">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Nama Mitra</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Logo</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Illuminate\Support\Facades\Storage;
                            @endphp
                            @if(isset($mitra) && $mitra->count() > 0)
                                @foreach($mitra as $index => $item)
                                <tr class="border-t border-borderSoft">
                                    <td class="px-4 py-3 text-sm text-textDark">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-sm text-textDark">{{ $item->nama_mitra }}</td>
                                    <td class="px-4 py-3">
                                        @if($item->logo)
                                            <img src="{{ Storage::url($item->logo) }}" alt="Logo {{ $item->nama_mitra }}" class="h-12 w-auto rounded-lg border border-borderSoft object-cover">
                                        @else
                                            <span class="text-xs text-textMuted">Tidak ada logo</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-start gap-2">
                                            <a href="{{ route('admin.mitra.edit', $item) }}" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.mitra.destroy', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra ini?');" class="inline">
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
                            @else
                                <tr class="border-t border-borderSoft">
                                    <td colspan="4" class="px-4 py-8 text-center text-sm text-textMuted">
                                        Belum ada mitra. Klik tombol "Tambah" untuk membuat mitra baru.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
