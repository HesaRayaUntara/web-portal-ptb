@extends('layouts.admin')

@section('title', 'Admin - Tambah Dosen')

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
                <h1 class="text-2xl font-bold text-textDark">Tambah Dosen</h1>
                <p class="mt-1 text-sm text-textMuted">Tambahkan dosen baru</p>
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

            {{-- Validation Errors --}}
            @if($errors->any())
                <div id="validation-alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 px-4 py-3 shadow-soft animate-slide-down">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1">
                            <h3 class="mb-2 font-semibold text-red-800">Terjadi kesalahan validasi:</h3>
                            <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="document.getElementById('validation-alert').remove()" class="text-red-600 hover:text-red-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Form Tambah Dosen --}}
            <form method="POST" action="{{ route('admin.dosen.storeDosen') }}" enctype="multipart/form-data" class="rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label for="nama" class="mb-2 block text-sm font-semibold text-textDark">Nama <span class="text-red-500">*</span></label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Contoh: Prof. Dr. Ir. Ahmad Hidayat">
                        @error('nama')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="mb-2 block text-sm font-semibold text-textDark">Status <span class="text-red-500">*</span></label>
                        <select id="status" name="status" required
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                            <option value="">Pilih Status</option>
                            <option value="dosen tetap" {{ old('status') == 'dosen tetap' ? 'selected' : '' }}>Dosen Tetap</option>
                            <option value="dosen tidak tetap" {{ old('status') == 'dosen tidak tetap' ? 'selected' : '' }}>Dosen Tidak Tetap</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bidang_keahlian" class="mb-2 block text-sm font-semibold text-textDark">Bidang Keahlian</label>
                        <textarea id="bidang_keahlian" name="bidang_keahlian" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Setiap poin dipisahkan dengan baris baru">{{ old('bidang_keahlian') }}</textarea>
                        <p class="mt-1 text-xs text-textMuted">*Pisahkan setiap poin bidang keahlian dengan baris baru</p>
                        @error('bidang_keahlian')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pendidikan" class="mb-2 block text-sm font-semibold text-textDark">Pendidikan</label>
                        <textarea id="pendidikan" name="pendidikan" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan riwayat pendidikan">{{ old('pendidikan') }}</textarea>
                        <p class="mt-1 text-xs text-textMuted">*Format: Jenjang Pendidikan - Perguruan Tinggi (tahun). Pisahkan setiap poin dengan baris baru</p>
                        @error('pendidikan')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-textDark">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Contoh: ahmad.hidayat@example.com">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gsch" class="mb-2 block text-sm font-semibold text-textDark">Link Google Scholar</label>
                        <input type="url" id="gsch" name="gsch" value="{{ old('gsch') }}"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Contoh: https://scholar.google.com/citations?user=...">
                        @error('gsch')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="foto" class="mb-2 block text-sm font-semibold text-textDark">Foto</label>
                        <input type="file" id="foto" name="foto" accept="image/jpeg,image/jpg,image/png"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                        <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 10MB)</p>
                        @error('foto')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                        <div id="image-preview" class="mt-3 hidden">
                            <img id="preview-img" src="" alt="Preview" class="h-32 w-32 rounded-lg border-2 border-primary object-cover">
                        </div>
                    </div>

                    <div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" id="kepala_program_studi" name="kepala_program_studi" value="1" 
                                {{ old('kepala_program_studi') ? 'checked' : '' }}
                                @if($hasKepalaProdi) disabled @endif
                                class="rounded border-borderSoft text-primary focus:ring-primary">
                            <span class="text-sm font-semibold text-textDark">Kepala Program Studi</span>
                            @if($hasKepalaProdi)
                                <span class="text-xs text-textMuted">(Sudah ada kepala program studi, hapus terlebih dahulu untuk menambahkan yang baru)</span>
                            @endif
                        </label>
                        @error('kepala_program_studi')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('admin.dosen.index') }}"
                        class="flex-1 rounded-xl border border-primary bg-white px-4 py-3 text-center text-sm font-semibold text-primary shadow-soft transition hover:bg-primary/5">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 rounded-xl bg-primary px-4 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        Simpan
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    // Image preview
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image-preview').classList.add('hidden');
        }
    });

    // Auto-hide alerts
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        const validationAlert = document.getElementById('validation-alert');

        [successAlert, errorAlert, validationAlert].forEach(alert => {
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
    });
</script>
@endsection

