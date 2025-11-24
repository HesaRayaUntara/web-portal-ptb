@extends('layouts.main')

@section('title', 'Detail Dosen - ' . $dosen->nama)

@section('content')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="{{ route('dosen') }}" class="transition hover:text-primary">Dosen</a>
        <span> > </span>
        <span class="text-primaryDark">{{ $dosen->nama }}</span>
    </nav>

    <!-- Hero Section -->
    <section class="mb-4 rounded-section bg-white p-4 shadow-soft md:mb-3 md:p-6 lg:p-8">
        <div class="w-full">
            <div class="grid gap-4 md:grid-cols-[1fr_1.5fr]">
                <div class="space-y-2 text-center">
                    <div>
                        <h1 class="text-lg font-semibold text-secondary md:text-xl">{{ $dosen->nama }}</h1>
                        <span class="mt-1 inline-flex rounded-full bg-primary/15 px-3 py-0.5 text-xs font-semibold text-primary">{{ $dosen->status }}</span>
                    </div>
                <div class="flex justify-center">
                        <div class="w-full max-w-[160px] overflow-hidden rounded-card shadow-soft">
                            <div class="relative w-full pb-[133.33%] bg-gray-200">
                                @if($dosen->foto)
                                    <img src="{{ Storage::url($dosen->foto) }}" alt="{{ $dosen->nama }}" class="absolute inset-0 h-full w-full object-cover">
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
                <div class="space-y-4 text-center md:text-left">
                    <!-- Bidang Keahlian -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm font-semibold text-textDark md:text-base">Bidang Keahlian</h3>
                    </div>
                        @if($dosen->bidang_keahlian)
                            @foreach(explode("\n", $dosen->bidang_keahlian) as $bidang)
                                @if(trim($bidang))
                                    <p class="flex items-start gap-2 pl-6 text-xs text-textMuted md:text-sm">
                                        <span class="flex-shrink-0 text-primary">•</span>
                                        <span>{{ trim($bidang) }}</span>
                                    </p>
                                @endif
                            @endforeach
                        @else
                            <p class="pl-6 text-xs text-textMuted md:text-sm">-</p>
                        @endif
                    </div>

                    <div class="border-t border-primary/10"></div>

                    <!-- Pendidikan -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm font-semibold text-textDark md:text-base">Pendidikan</h3>
                        </div>
                        <ul class="space-y-1.5 pl-6 text-xs text-textMuted md:text-sm">
                            @if($dosen->pendidikan)
                                @foreach(explode("\n", $dosen->pendidikan) as $pendidikan)
                                    @if(trim($pendidikan))
                                        <li class="flex items-start gap-2">
                                            <span class="flex-shrink-0 text-primary">•</span>
                                            <span>{{ trim($pendidikan) }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li class="text-textMuted">-</li>
                            @endif
                        </ul>
                    </div>

                    <div class="border-t border-primary/10"></div>

                    <!-- Kontak -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            @if($dosen->email)
                                <a href="mailto:{{ $dosen->email }}" class="flex items-center justify-center rounded-full bg-primary/10 p-2 text-primary transition-all duration-200 hover:bg-primary/20 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                </a>
                            @endif
                            @if($dosen->gsch)
                                <a href="{{ $dosen->gsch }}" target="_blank" class="flex items-center justify-center rounded-full bg-primary/10 p-2 text-primary transition-all duration-200 hover:bg-primary/20 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-4 w-4">
                                        <path d="M454.9 362.5C454.9 362.5 454.9 362.6 455 362.6C464.2 382 469.4 403.7 469.4 426.6C469.3 509.1 402.5 576 320 576C237.5 576 170.7 509.1 170.7 426.7C170.7 403.8 175.9 382.1 185.1 362.7C186.8 359.1 188.7 355.5 190.7 352C195.1 344.4 200.1 337.3 205.7 330.7C233.1 298.1 274.2 277.4 320.1 277.4C353.7 277.4 384.7 288.5 409.7 307.3C418.8 314.2 427.1 322 434.5 330.8C440.1 337.4 445.1 344.6 449.5 352.1C451.5 355.5 453.3 359.1 455 362.6L454.9 362.5zM481.3 343.7C451.2 285.3 390.3 245.3 320 245.3C249.7 245.3 188.8 285.3 158.7 343.7L64 266.7L320 64L576 266.7L481.3 343.8L481.3 343.7z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portofolio -->
    <section class="mb-8 rounded-section bg-white p-4 shadow-soft md:mb-6 md:p-6 lg:p-8">
        <div class="w-full">
            <h2 class="mb-4 text-xl font-semibold text-secondary md:text-2xl">Portofolio</h2>
            
            <!-- Tab Navigation -->
            <div class="mb-6 flex flex-wrap gap-2 border-b border-primary/10">
                <button onclick="showTab('penelitian')" id="tab-penelitian" class="tab-button active px-4 py-2 text-sm font-medium text-primary border-b-2 border-primary transition-colors">
                    Penelitian
                </button>
                <button onclick="showTab('pengabdian')" id="tab-pengabdian" class="tab-button px-4 py-2 text-sm font-medium text-textMuted border-b-2 border-transparent hover:text-primary transition-colors">
                    Pengabdian Masyarakat
                </button>
                <button onclick="showTab('publikasi')" id="tab-publikasi" class="tab-button px-4 py-2 text-sm font-medium text-textMuted border-b-2 border-transparent hover:text-primary transition-colors">
                    Publikasi Karya
                </button>
                <button onclick="showTab('hki')" id="tab-hki" class="tab-button px-4 py-2 text-sm font-medium text-textMuted border-b-2 border-transparent hover:text-primary transition-colors">
                    HKI/Paten
                </button>
            </div>

            <!-- Tabel Penelitian -->
            <div id="content-penelitian" class="tab-content">
                <div class="overflow-x-auto rounded-badge border border-primary/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-accent text-primary">
                            <tr>
                                <th class="px-4 py-3 font-semibold">No.</th>
                                <th class="px-4 py-3 font-semibold">Judul Penelitian</th>
                                <th class="px-4 py-3 font-semibold">Tahun</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-primary/10" id="table-penelitian-body">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="pagination-penelitian" class="mt-4 flex items-center justify-center gap-2"></div>
            </div>

            <!-- Tabel Pengabdian Masyarakat -->
            <div id="content-pengabdian" class="tab-content hidden">
                <div class="overflow-x-auto rounded-badge border border-primary/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-accent text-primary">
                            <tr>
                                <th class="px-4 py-3 font-semibold">No.</th>
                                <th class="px-4 py-3 font-semibold">Judul Pengabdian Masyarakat</th>
                                <th class="px-4 py-3 font-semibold">Tahun</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-primary/10" id="table-pengabdian-body">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="pagination-pengabdian" class="mt-4 flex items-center justify-center gap-2"></div>
            </div>

            <!-- Tabel Publikasi Karya -->
            <div id="content-publikasi" class="tab-content hidden">
                <div class="overflow-x-auto rounded-badge border border-primary/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-accent text-primary">
                            <tr>
                                <th class="px-4 py-3 font-semibold">No.</th>
                                <th class="px-4 py-3 font-semibold">Judul Karya</th>
                                <th class="px-4 py-3 font-semibold">Jenis Karya</th>
                                <th class="px-4 py-3 font-semibold">Tahun</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-primary/10" id="table-publikasi-body">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="pagination-publikasi" class="mt-4 flex items-center justify-center gap-2"></div>
            </div>

            <!-- Tabel HKI/Paten -->
            <div id="content-hki" class="tab-content hidden">
                <div class="overflow-x-auto rounded-badge border border-primary/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-accent text-primary">
                            <tr>
                                <th class="px-4 py-3 font-semibold">No.</th>
                                <th class="px-4 py-3 font-semibold">Judul Karya</th>
                                <th class="px-4 py-3 font-semibold">Jenis Karya</th>
                                <th class="px-4 py-3 font-semibold">Tahun</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-primary/10" id="table-hki-body">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="pagination-hki" class="mt-4 flex items-center justify-center gap-2"></div>
            </div>
        </div>
    </section>

    @php
        $dataPenelitian = $penelitian->map(function($item, $index) {
            return [
                'no' => $index + 1,
                'judul' => $item->judul_penelitian,
                'tahun' => $item->tahun
            ];
        })->values()->all();

        $dataPengabdian = $pengabdian->map(function($item, $index) {
            return [
                'no' => $index + 1,
                'judul' => $item->judul_pengabdian,
                'tahun' => $item->tahun
            ];
        })->values()->all();

        $dataPublikasi = $publikasi->map(function($item, $index) {
            return [
                'no' => $index + 1,
                'judul' => $item->judul_karya,
                'jenis' => $item->jenis_karya,
                'tahun' => $item->tahun
            ];
        })->values()->all();

        $dataHKI = $hki->map(function($item, $index) {
            return [
                'no' => $index + 1,
                'judul' => $item->judul_karya,
                'jenis' => $item->jenis_karya,
                'tahun' => $item->tahun
            ];
        })->values()->all();
    @endphp

    <script id="dosen-data" type="application/json">
        {!! json_encode([
            'penelitian' => $dataPenelitian,
            'pengabdian' => $dataPengabdian,
            'publikasi' => $dataPublikasi,
            'hki' => $dataHKI
        ]) !!}
    </script>
    <script>
        // Data dari database
        const dosenData = JSON.parse(document.getElementById('dosen-data').textContent);
        const dataPenelitian = dosenData.penelitian;
        const dataPengabdian = dosenData.pengabdian;
        const dataPublikasi = dosenData.publikasi;
        const dataHKI = dosenData.hki;

        const itemsPerPage = 10;
        let currentPage = {
            penelitian: 1,
            pengabdian: 1,
            publikasi: 1,
            hki: 1
        };

        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'text-primary', 'border-primary');
                btn.classList.add('text-textMuted', 'border-transparent');
            });
            
            // Show selected tab
            document.getElementById(`content-${tabName}`).classList.remove('hidden');
            
            // Add active class to selected button
            const activeBtn = document.getElementById(`tab-${tabName}`);
            activeBtn.classList.add('active', 'text-primary', 'border-primary');
            activeBtn.classList.remove('text-textMuted', 'border-transparent');
            
            // Render table for selected tab
            renderTable(tabName);
        }

        function renderTable(tabName) {
            let data, tableBodyId, paginationId;
            
            switch(tabName) {
                case 'penelitian':
                    data = dataPenelitian;
                    tableBodyId = 'table-penelitian-body';
                    paginationId = 'pagination-penelitian';
                    break;
                case 'pengabdian':
                    data = dataPengabdian;
                    tableBodyId = 'table-pengabdian-body';
                    paginationId = 'pagination-pengabdian';
                    break;
                case 'publikasi':
                    data = dataPublikasi;
                    tableBodyId = 'table-publikasi-body';
                    paginationId = 'pagination-publikasi';
                    break;
                case 'hki':
                    data = dataHKI;
                    tableBodyId = 'table-hki-body';
                    paginationId = 'pagination-hki';
                    break;
            }
            
            const page = currentPage[tabName];
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const pageData = data.slice(startIndex, endIndex);
            const totalPages = Math.ceil(data.length / itemsPerPage);
            
            // Render table rows
            const tbody = document.getElementById(tableBodyId);
            tbody.innerHTML = pageData.map(item => {
                if (tabName === 'publikasi' || tabName === 'hki') {
                    return `
                        <tr class="hover:bg-accent/50 transition-colors">
                            <td class="px-4 py-3 text-textMuted">${item.no}</td>
                            <td class="px-4 py-3 text-textDark">${item.judul}</td>
                            <td class="px-4 py-3 text-textMuted">${item.jenis}</td>
                            <td class="px-4 py-3 text-textMuted">${item.tahun}</td>
                        </tr>
                    `;
                } else {
                    return `
                        <tr class="hover:bg-accent/50 transition-colors">
                            <td class="px-4 py-3 text-textMuted">${item.no}</td>
                            <td class="px-4 py-3 text-textDark">${item.judul}</td>
                            <td class="px-4 py-3 text-textMuted">${item.tahun}</td>
                        </tr>
                    `;
                }
            }).join('');
            
            // Render pagination
            const pagination = document.getElementById(paginationId);
            if (totalPages > 1) {
                pagination.innerHTML = `
                    <button onclick="changePage('${tabName}', ${page - 1})" 
                            ${page === 1 ? 'disabled' : ''} 
                            class="px-3 py-1 rounded-badge border border-primary/20 text-sm font-medium text-primary transition-all disabled:opacity-50 disabled:cursor-not-allowed hover:bg-primary/5 hover:border-primary">
                        &lt;
                    </button>
                    <span class="px-4 py-1 text-sm text-textMuted">
                        ${page} dari ${totalPages}
                    </span>
                    <button onclick="changePage('${tabName}', ${page + 1})" 
                            ${page === totalPages ? 'disabled' : ''} 
                            class="px-3 py-1 rounded-badge border border-primary/20 text-sm font-medium text-primary transition-all disabled:opacity-50 disabled:cursor-not-allowed hover:bg-primary/5 hover:border-primary">
                        &gt;
                    </button>
                `;
            } else {
                pagination.innerHTML = '';
            }
        }

        function changePage(tabName, page) {
            let data;
            switch(tabName) {
                case 'penelitian': data = dataPenelitian; break;
                case 'pengabdian': data = dataPengabdian; break;
                case 'publikasi': data = dataPublikasi; break;
                case 'hki': data = dataHKI; break;
            }
            
            const totalPages = Math.ceil(data.length / itemsPerPage);
            if (page >= 1 && page <= totalPages) {
                currentPage[tabName] = page;
                renderTable(tabName);
            }
        }

        // Initialize with penelitian tab
        document.addEventListener('DOMContentLoaded', function() {
            showTab('penelitian');
        });
    </script>

    <!-- Back Button -->
    <div class="mb-8 flex justify-center">
        <a href="{{ route('dosen') }}" 
           class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-6 py-3 text-sm font-semibold text-primary transition hover:border-primary hover:bg-primary/5 hover:shadow-soft">
            <span aria-hidden="true"><</span>
            Kembali ke Daftar Dosen
        </a>
    </div>
@endsection

