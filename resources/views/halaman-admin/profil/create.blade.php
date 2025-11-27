@extends('layouts.admin')

@section('title', 'Admin - Tambah Profil Program Studi')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="rounded-section border border-borderSoft bg-white shadow-soft">
    <div class="flex flex-col gap-8 lg:flex-row lg:items-stretch">
        @include('partials.admin-sidebar')

        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Tambah Profil Program Studi</h1>
                <p class="mt-1 text-sm text-textMuted">Tambahkan profil program studi baru</p>
            </div>

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

            <form method="POST" action="{{ route('admin.profil.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Deskripsi --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Deskripsi Program Studi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="deskripsi" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan deskripsi program studi">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </section>

                {{-- Visi Misi --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Visi & Misi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="visi" class="mb-2 block text-sm font-semibold text-textDark">Visi</label>
                            <textarea id="visi" name="visi" rows="3" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan visi program studi">{{ old('visi') }}</textarea>
                        </div>
                        <div>
                            <label for="misi" class="mb-2 block text-sm font-semibold text-textDark">Misi</label>
                            <textarea id="misi" name="misi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan misi program studi (pisahkan dengan baris baru)">{{ old('misi') }}</textarea>
                            <p class="mt-1 text-xs text-textMuted">*Pisahkan setiap poin misi dengan baris baru</p>
                        </div>
                        <div>
                            <label for="tujuan" class="mb-2 block text-sm font-semibold text-textDark">Tujuan</label>
                            <textarea id="tujuan" name="tujuan" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan tujuan program studi (pisahkan dengan baris baru)">{{ old('tujuan') }}</textarea>
                            <p class="mt-1 text-xs text-textMuted">*Pisahkan setiap poin tujuan dengan baris baru</p>
                        </div>
                    </div>
                </section>

                {{-- Informasi Akademik --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Informasi Akademik</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="lama_studi" class="mb-2 block text-sm font-semibold text-textDark">Lama Studi (Semester)</label>
                            <input type="text" id="lama_studi" name="lama_studi" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. 8" value="{{ old('lama_studi') }}">
                        </div>
                        <div>
                            <label for="gelar_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Gelar Lulusan</label>
                            <input type="text" id="gelar_lulusan" name="gelar_lulusan" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. S.Kom." value="{{ old('gelar_lulusan') }}">
                        </div>
                        <div>
                            <label for="kepanjangan_gelar" class="mb-2 block text-sm font-semibold text-textDark">Kepanjangan Gelar</label>
                            <input type="text" id="kepanjangan_gelar" name="kepanjangan_gelar" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. Sarjana Komputer" value="{{ old('kepanjangan_gelar') }}">
                        </div>
                    </div>
                </section>

                {{-- SNBP --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBP 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbp_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbp_pelamar" name="snbp_pelamar" min="0" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="{{ old('snbp_pelamar') }}" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbp_diterima" name="snbp_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="{{ old('snbp_diterima') }}" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="text" id="snbp_keketatan" name="snbp_keketatan" readonly
                                class="w-full rounded-xl border border-borderSoft bg-gray-50 px-4 py-3 text-sm text-textDark placeholder:text-textMuted cursor-not-allowed"
                                placeholder="0.00" value="0.00">
                        </div>
                    </div>
                </section>

                {{-- SNBT --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBT 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbt_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbt_pelamar" name="snbt_pelamar" min="0" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="{{ old('snbt_pelamar') }}" oninput="calculateKeketatan('snbt')">
                        </div>
                        <div>
                            <label for="snbt_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbt_diterima" name="snbt_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="{{ old('snbt_diterima') }}" oninput="calculateKeketatan('snbt')">
                        </div>
                        <div>
                            <label for="snbt_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="text" id="snbt_keketatan" name="snbt_keketatan" readonly
                                class="w-full rounded-xl border border-borderSoft bg-gray-50 px-4 py-3 text-sm text-textDark placeholder:text-textMuted cursor-not-allowed"
                                placeholder="0.00" value="0.00">
                        </div>
                    </div>
                </section>

                {{-- Akreditasi --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Akreditasi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Akreditasi</label>
                            <input type="text" id="akreditasi" name="akreditasi" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                value="{{ old('akreditasi') }}">
                        </div>
                        <div>
                            <label for="no_sk" class="mb-2 block text-sm font-semibold text-textDark">No. SK</label>
                            <input type="text" id="no_sk" name="no_sk" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="" value="{{ old('no_sk') }}">
                        </div>
                        <div>
                            <label for="foto_akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Foto Akreditasi</label>
                            <input type="file" id="foto_akreditasi" name="foto_akreditasi" accept="image/jpeg,image/jpg,image/png" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                            <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 5MB)</p>
                        </div>
                    </div>
                </section>

                {{-- Industri --}}
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Industri</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="industri_tempat_bekerja" class="mb-2 block text-sm font-semibold text-textDark">Industri Tempat Bekerja</label>
                            <textarea id="industri_tempat_bekerja" name="industri_tempat_bekerja" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan industri atau tempat bekerja (pisahkan dengan baris baru)">{{ old('industri_tempat_bekerja') }}</textarea>
                        </div>
                    </div>
                </section>

                {{-- Submit Button --}}
                <div class="flex justify-end gap-4">
                    <a href="{{ route('admin.profil.index') }}"
                        class="inline-block rounded-xl border border-borderSoft bg-white px-6 py-3 text-sm font-semibold text-textDark shadow-soft transition hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        Simpan
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

@push('scripts')
<script>
    function calculateKeketatan(type) {
        const pelamar = parseFloat(document.getElementById(type + '_pelamar').value) || 0;
        const diterima = parseFloat(document.getElementById(type + '_diterima').value) || 0;
        const keketatan = diterima > 0 ? (pelamar / diterima).toFixed(2) : '0.00';
        document.getElementById(type + '_keketatan').value = keketatan;
    }
</script>
@endpush
@endsection

