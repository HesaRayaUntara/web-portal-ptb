@extends('layouts.admin')

@section('title', 'Admin Dashboard')

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
                        <a href="{{ route('admin.dashboard') }}" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Dasbor</a>
                        <a href="{{ route('admin.profil.index') }}" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                        <button class="w-full rounded-xl bg-white py-3 text-left shadow-soft">Profil Dosen</button>
                        <button class="w-full rounded-xl bg-white py-3 text-left shadow-soft">Kurikulum</button>
                        <button class="w-full rounded-xl bg-white py-3 text-left shadow-soft">Formulir Kontak</button>
                        <button class="w-full rounded-xl bg-white py-3 text-left shadow-soft">Berita</button>
                        <button class="w-full rounded-xl bg-white py-3 text-left shadow-soft">Galeri</button>
                    </nav>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-xl border border-primary/20 bg-white px-4 py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white">
                            <span>Keluar Admin</span>
                            <span aria-hidden="true">↘</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 space-y-8 p-6 lg:p-10">
                <header class="flex flex-wrap items-center justify-between gap-4 rounded-card bg-gradient-to-r from-primary to-primaryDark px-6 py-4 text-white shadow-soft">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-white/80">Dasbor</p>
                        <h1 class="text-2xl font-semibold">Aktivitas Admin</h1>
                    </div>
                <div class="flex items-center gap-3 text-sm font-semibold">
                    <span class="inline-flex items-center gap-2 rounded-badge bg-white/15 px-4 py-2">
                        <img src="https://flagcdn.com/w20/id.png" alt="Bahasa" class="rounded-full">
                        Bahasa
                    </span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="rounded-badge bg-white/15 px-4 py-2 text-white transition hover:bg-white/30">Keluar</button>
                    </form>
                </div>
                </header>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="rounded-section border border-borderSoft bg-[#F1F8EF] p-6 shadow-soft">
                        <p class="text-sm font-semibold text-textMuted">Pemeliharaan</p>
                        <div class="mt-4 grid gap-4 md:grid-cols-2">
                            <div class="rounded-card bg-white/80 p-4 text-center shadow-soft">
                                <p class="text-4xl font-semibold text-primary">80%</p>
                                <p class="text-xs uppercase tracking-wide text-textMuted">Operational</p>
                            </div>
                            <div class="rounded-card bg-white/80 p-4 text-center shadow-soft">
                                <p class="text-4xl font-semibold text-primaryDark">29</p>
                                <p class="text-xs uppercase tracking-wide text-textMuted">Hari</p>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-wrap gap-3 text-xs font-semibold">
                            <button class="rounded-badge bg-primary px-4 py-2 text-white shadow-soft">Perawatan Terjadwal</button>
                            <button class="rounded-badge border border-primary/40 px-4 py-2 text-primary">Perawatan Tertunda</button>
                        </div>
                    </div>

                    <div class="rounded-section border border-borderSoft bg-[#ECF5F4] p-6 shadow-soft">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-textMuted">Statistik</p>
                            <span class="text-xs uppercase text-textMuted">Mingguan</span>
                        </div>
                        <div class="mt-6 h-32 rounded-card bg-white/70 p-4 shadow-inner">
                            <div class="flex h-full items-end justify-between gap-2">
                                @foreach ([50, 80, 65, 120, 90, 150, 110] as $value)
                                    <span class="flex-1 rounded-t-md bg-primary/80" style="height: {{ round($value / 1.8) }}px"></span>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-3 gap-4 text-center text-sm font-semibold text-secondary">
                            <div>
                                <p class="text-3xl text-primary">226</p>
                                <p class="text-xs text-textMuted">Halaman</p>
                            </div>
                            <div>
                                <p class="text-3xl text-primary">186</p>
                                <p class="text-xs text-textMuted">Mahasiswa</p>
                            </div>
                            <div>
                                <p class="text-3xl text-primary">815</p>
                                <p class="text-xs text-textMuted">Sukses</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-section border border-borderSoft bg-[#F7FBF7] p-6 shadow-soft">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-primary/80">Pembaharuan Halaman Terbaru</p>
                            <h2 class="text-2xl font-semibold text-secondary">Log Aktivitas</h2>
                        </div>
                        <button class="rounded-badge bg-primary px-5 py-2 text-sm font-semibold text-white shadow-soft">
                            Atur Manual
                        </button>
                    </div>
                    <div class="mt-6 divide-y divide-borderSoft rounded-card bg-white text-sm shadow-soft">
                        @foreach ([
                            ['name' => 'Beranda umum', 'status' => 'Live', 'time' => '5 menit lalu'],
                            ['name' => 'Kurikulum 2025', 'status' => 'Draft', 'time' => '30 menit lalu'],
                            ['name' => 'Profil Prodi', 'status' => 'Review', 'time' => '1 jam lalu'],
                            ['name' => 'Berita terbaru', 'status' => 'Scheduled', 'time' => 'Kemarin'],
                            ['name' => 'Galeri', 'status' => 'Live', 'time' => '2 hari lalu'],
                        ] as $log)
                            <div class="flex items-center justify-between px-5 py-4">
                                <div>
                                    <p class="font-semibold text-textDark">{{ $log['name'] }}</p>
                                    <p class="text-xs text-textMuted">{{ $log['time'] }}</p>
                                </div>
                                <span class="rounded-badge px-4 py-1 text-xs font-semibold
                                    {{ $log['status'] === 'Live' ? 'bg-emerald-100 text-emerald-600' : '' }}
                                    {{ $log['status'] === 'Draft' ? 'bg-amber-100 text-amber-700' : '' }}
                                    {{ $log['status'] === 'Review' ? 'bg-indigo-100 text-indigo-600' : '' }}
                                    {{ $log['status'] === 'Scheduled' ? 'bg-rose-100 text-rose-600' : '' }}">
                                    {{ $log['status'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="grid gap-8 lg:grid-cols-2">
                    <div class="rounded-section border border-borderSoft bg-white p-6 shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary">Kurikulum</p>
                                <h2 class="text-2xl font-semibold text-secondary">Daftar Mata Kuliah</h2>
                                <p class="text-sm text-textMuted">Periksa kode mata kuliah dan SKS untuk penyesuaian halaman publik.</p>
                            </div>
                            <button class="rounded-badge bg-primary px-5 py-2 text-sm font-semibold text-white shadow-soft">Tambah Mata Kuliah</button>
                        </div>
                        <div class="mt-6 overflow-x-auto rounded-card border border-borderSoft">
                            <table class="min-w-full divide-y divide-borderSoft text-sm">
                                <thead class="bg-slate-50 text-left uppercase tracking-wide text-xs text-textMuted">
                                    <tr>
                                        <th class="px-4 py-3">Kode</th>
                                        <th class="px-4 py-3">Mata Kuliah</th>
                                        <th class="px-4 py-3">SKS</th>
                                        <th class="px-4 py-3">Semester</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-borderSoft bg-white">
                                    @foreach ([
                                        ['code' => 'PTB101', 'name' => 'Dasar Pemuliaan Tanaman', 'sks' => 3, 'semester' => '1', 'status' => 'Live'],
                                        ['code' => 'PTB203', 'name' => 'Teknik Produksi Benih', 'sks' => 2, 'semester' => '3', 'status' => 'Draft'],
                                        ['code' => 'PTB305', 'name' => 'Bioteknologi Tanaman', 'sks' => 3, 'semester' => '5', 'status' => 'Review'],
                                        ['code' => 'PTB402', 'name' => 'Manajemen Gudang Benih', 'sks' => 2, 'semester' => '7', 'status' => 'Scheduled'],
                                    ] as $course)
                                        <tr>
                                            <td class="px-4 py-3 font-semibold text-secondary">{{ $course['code'] }}</td>
                                            <td class="px-4 py-3 text-textDark">{{ $course['name'] }}</td>
                                            <td class="px-4 py-3 font-semibold text-primary">{{ $course['sks'] }} SKS</td>
                                            <td class="px-4 py-3">{{ $course['semester'] }}</td>
                                            <td class="px-4 py-3">
                                                <span class="rounded-badge px-3 py-1 text-xs font-semibold
                                                    {{ $course['status'] === 'Live' ? 'bg-emerald-100 text-emerald-600' : '' }}
                                                    {{ $course['status'] === 'Draft' ? 'bg-amber-100 text-amber-700' : '' }}
                                                    {{ $course['status'] === 'Review' ? 'bg-indigo-100 text-indigo-600' : '' }}
                                                    {{ $course['status'] === 'Scheduled' ? 'bg-rose-100 text-rose-600' : '' }}">
                                                    {{ $course['status'] }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <button class="text-xs font-semibold text-primary hover:underline">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="rounded-section border border-borderSoft bg-white p-6 shadow-soft">
                        <p class="text-xs font-semibold uppercase tracking-wide text-primary">Galeri</p>
                        <h2 class="text-2xl font-semibold text-secondary">Tambah Foto Baru</h2>
                        <p class="text-sm text-textMuted">Isi detail singkat untuk menambah dokumentasi kegiatan.</p>
                        <form class="mt-6 space-y-4">
                            <div>
                                <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">Judul</label>
                                <input type="text" placeholder="Misal: Greenhouse Project"
                                    class="mt-2 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">URL Gambar</label>
                                <input type="text" placeholder="https://"
                                    class="mt-2 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">Kategori</label>
                                <select
                                    class="mt-2 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                                    <option>Kegiatan Mahasiswa</option>
                                    <option>Laboratorium</option>
                                    <option>Kunjungan Lapang</option>
                                </select>
                            </div>
                            <button type="button"
                                class="w-full rounded-2xl bg-primary py-3 text-sm font-semibold uppercase tracking-[0.3em] text-white shadow-soft transition hover:bg-primaryDark">
                                Simpan Foto
                            </button>
                        </form>
                    </div>
                </div>
                <div class="rounded-section border border-borderSoft bg-white p-6 shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-primary">Berita</p>
                            <h2 class="text-2xl font-semibold text-secondary">Publikasi Berita</h2>
                            <p class="text-sm text-textMuted">Tulis judul, ringkasan, dan tautan gambar sebelum dipublikasikan.</p>
                        </div>
                        <button class="rounded-badge border border-primary/20 px-5 py-2 text-sm font-semibold text-primary transition hover:border-primary">Lihat Draft</button>
                    </div>
                    <form class="mt-6 space-y-4">
                        <div class="grid gap-4 lg:grid-cols-2">
                            <div>
                                <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">Judul</label>
                                <input type="text" placeholder="Misal: Workshop Teknologi Benih"
                                    class="mt-2 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">URL Gambar</label>
                                <input type="text" placeholder="https://"
                                    class="mt-2 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-semibold uppercase tracking-wide text-textMuted">Deskripsi Singkat</label>
                            <textarea rows="4" placeholder="Ringkas poin penting berita..."
                                class="mt-2 w-full rounded-2xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20"></textarea>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <button type="button"
                                class="rounded-2xl bg-primary px-6 py-3 text-sm font-semibold uppercase tracking-[0.3em] text-white shadow-soft transition hover:bg-primaryDark">
                                Simpan Draft
                            </button>
                            <button type="button"
                                class="rounded-2xl border border-primary/20 px-6 py-3 text-sm font-semibold uppercase tracking-[0.3em] text-primary transition hover:border-primary">
                                Jadwalkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('admin-menu-toggle');
            const panel = document.getElementById('admin-menu-panel');
            if (toggle && panel) {
                toggle.addEventListener('click', () => {
                    panel.classList.toggle('hidden');
                });
            }
        });
    </script>
@endpush
