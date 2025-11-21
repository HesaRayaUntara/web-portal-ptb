@extends('layouts.admin')

@section('title', 'Admin - Galeri')

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
                    <a href="{{ route('admin.profil.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                    <a href="{{ route('admin.kurikulum.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</button>
                    <a href="{{ route('admin.berita.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</a>
                    <a href="{{ route('admin.galeri.index') }}" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Galeri</a>
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
        <main class="flex-1 p-4 md:p-6 lg:p-8">
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-bold text-textDark sm:text-2xl">Galeri</h1>
                    <p class="mt-1 text-xs text-textMuted sm:text-sm">Kelola galeri dan kategori galeri</p>
                </div>
            </div>

            {{-- Success Alert --}}
            @if(session('success'))
                <div id="success-alert" class="mb-6 flex items-center justify-between rounded-xl border border-green-300 bg-green-50 px-3 py-2 text-xs text-green-800 shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-green-600 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold break-words">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="ml-2 flex-shrink-0 text-green-600 hover:text-green-800 sm:ml-0">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Error Alert --}}
            @if(session('error'))
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-3 py-2 text-xs text-red-800 shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-red-600 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold break-words">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="ml-2 flex-shrink-0 text-red-600 hover:text-red-800 sm:ml-0">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div id="validation-alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 px-3 py-2 text-xs shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-start gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-red-600 mt-0.5 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1 min-w-0">
                            <h3 class="mb-2 font-semibold text-red-800">Terjadi kesalahan validasi:</h3>
                            <ul class="list-inside list-disc space-y-1 text-xs text-red-700 sm:text-sm">
                                @foreach($errors->all() as $error)
                                    <li class="break-words">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="document.getElementById('validation-alert').remove()" class="ml-2 flex-shrink-0 text-red-600 hover:text-red-800 sm:ml-0">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Card 1: Kategori Galeri --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Kategori Galeri</h2>
                
                {{-- Form Tambah Kategori --}}
                <form method="POST" action="{{ route('admin.galeri.storeKategori') }}" class="mb-6">
                    @csrf
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                            class="flex-1 rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            placeholder="Masukkan kategori galeri" required>
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto sm:px-6">
                            Tambah
                        </button>
                    </div>
                </form>

                {{-- Tabel Kategori --}}
                @if($kategoris->count() > 0)
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="w-full min-w-[300px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Kategori Galeri</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kategori)
                                    <tr class="border-t border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm">{{ $kategori->nama }}</td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center">
                                                <form method="POST" action="{{ route('admin.galeri.deleteKategori', $kategori->id) }}" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                @else
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada kategori galeri.</p>
                @endif
            </div>

            {{-- Card 2: Form Galeri --}}
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Tambah Galeri</h2>
                
                <form method="POST" action="{{ route('admin.galeri.storeGaleri') }}" enctype="multipart/form-data" id="galeriForm">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="judul" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Judul</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                        </div>

                        <div>
                            <label for="deskripsi" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div>
                            <label for="kategori_galeri_id" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Kategori</label>
                            <select name="kategori_galeri_id" id="kategori_galeri_id" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_galeri_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="tipe" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Tipe</label>
                            <select name="tipe" id="tipe" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                                <option value="">Pilih Tipe</option>
                                <option value="photo" {{ old('tipe') == 'photo' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ old('tipe') == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        {{-- Photo Input --}}
                        <div id="photo-input" style="display: none;">
                            <label for="foto" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Gambar <span class="text-red-500">*</span></label>
                            <input type="file" name="foto" id="foto" accept="image/jpeg,image/jpg,image/png" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-xs focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4 sm:text-sm">
                            <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 10MB)</p>
                        </div>

                        {{-- Video Input --}}
                        <div id="video-input" style="display: none;">
                            <label for="youtube_url" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Link YouTube <span class="text-red-500">*</span></label>
                            <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url') }}" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                placeholder="Masukkan link YouTube">
                        </div>

                        <div class="flex flex-col gap-2 pt-4 sm:flex-row sm:justify-end">
                            <button type="submit" 
                                onclick="return confirm('Apakah anda yakin untuk menambahkan galeri ini?');"
                                class="w-full rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto">
                                Tambah Galeri
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Card 3: Tabel Galeri yang Sudah Dipublikasikan --}}
            <div class="rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Galeri yang Sudah Dipublikasikan</h2>
                
                @if($galeriList->count() > 0)
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="w-full min-w-[500px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Judul</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Tipe</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galeriList as $galeri)
                                    <tr class="border-t border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm">{{ $galeri->judul }}</td>
                                        <td class="px-3 py-2 text-center sm:px-4 sm:py-3">
                                            <span class="inline-block rounded-full px-2 py-1 text-xs font-semibold {{ $galeri->tipe === 'photo' ? 'bg-blue-100 text-blue-700' : 'bg-red-100 text-red-700' }}">
                                                {{ $galeri->tipe === 'photo' ? 'Foto' : 'Video' }}
                                            </span>
                                        </td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.galeri.editGaleri', $galeri->id) }}"
                                                    class="flex items-center justify-center rounded-lg bg-blue-50 p-1.5 text-blue-600 transition hover:bg-blue-100 sm:p-2"
                                                    title="Edit">
                                                    <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.galeri.destroyGaleri', $galeri->id) }}" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');">
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
                @else
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada galeri yang dipublikasikan.</p>
                @endif
            </div>
        </main>
    </div>
</div>

<script>
    // Toggle input berdasarkan tipe
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('tipe');
        const photoInput = document.getElementById('photo-input');
        const videoInput = document.getElementById('video-input');
            const imageInput = document.getElementById('foto');
        const youtubeInput = document.getElementById('youtube_url');

        function toggleInputs() {
            const selectedType = typeSelect.value;
            
            if (selectedType === 'photo') {
                photoInput.style.display = 'block';
                videoInput.style.display = 'none';
                imageInput.setAttribute('required', 'required');
                youtubeInput.removeAttribute('required');
                youtubeInput.value = '';
            } else if (selectedType === 'video') {
                photoInput.style.display = 'none';
                videoInput.style.display = 'block';
                imageInput.removeAttribute('required');
                imageInput.value = '';
                youtubeInput.setAttribute('required', 'required');
            } else {
                photoInput.style.display = 'none';
                videoInput.style.display = 'none';
                imageInput.removeAttribute('required');
                youtubeInput.removeAttribute('required');
            }
        }

        // Set initial state based on old input
        @if(old('tipe'))
            toggleInputs();
        @endif

        typeSelect.addEventListener('change', toggleInputs);
    });

    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        const validationAlert = document.getElementById('validation-alert');

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

        if (validationAlert) {
            setTimeout(function() {
                validationAlert.style.transition = 'opacity 0.5s ease-out';
                validationAlert.style.opacity = '0';
                setTimeout(function() {
                    validationAlert.remove();
                }, 500);
            }, 5000);
        }
    });
</script>
@endsection

