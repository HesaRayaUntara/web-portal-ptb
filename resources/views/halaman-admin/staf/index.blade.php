@extends('layouts.admin')

@section('title', 'Admin - Staf')

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
                    <a href="{{ route('admin.staf.index') }}" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Staf</a>
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
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Staf</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola data staf program studi</p>
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

            {{-- Tabel Staf --}}
            <div class="rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Daftar Staf</h2>
                    <a href="{{ route('admin.staf.tambah') }}"
                        class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                @if($staf->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Foto</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Nama</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Jabatan</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staf as $index => $item)
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3">
                                            @if($item->foto)
                                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}" class="h-16 w-16 rounded-lg object-cover">
                                            @else
                                                <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-200 text-xs text-gray-400">No Image</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm font-semibold text-textDark">{{ $item->nama }}</td>
                                        <td class="px-4 py-3 text-sm text-textMuted">{{ $item->jabatan }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.staf.edit', $item) }}"
                                                    class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100 flex-shrink-0"
                                                    title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.staf.destroy', $item) }}" class="inline flex-shrink-0"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus staf ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100"
                                                        title="Hapus">
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
                        <p class="text-sm text-textMuted">Belum ada staf yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

<script>
    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(function() {
                successAlert.style.transition = 'opacity 0.5s ease-out';
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.remove();
                }, 500);
            }, 5000);
        }

        if (errorAlert) {
            setTimeout(function() {
                errorAlert.style.transition = 'opacity 0.5s ease-out';
                errorAlert.style.opacity = '0';
                setTimeout(function() {
                    errorAlert.remove();
                }, 500);
            }, 5000);
        }
    });
</script>
@endsection

