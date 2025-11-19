@extends('layouts.main')

@section('title', 'Profil Program Studi')

@section('content')
<!-- Breadcrumb -->
<nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
    <a href="{{ route('beranda') }}" class="transition hover:text-primary">Beranda</a>
    <span> > </span>
    <a href="{{ route('profil') }}" class="transition hover:text-primary text-primaryDark">Profil Prodi</a>
</nav>


{{-- Hero Section --}}
<section
    class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
    style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
        <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Profil Prodi</span>
        <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Profil Program Studi</h1>
        <p class="max-w-2xl text-base text-white/85 md:text-lg">Mengenal lebih dekat visi, filosofi, dan sarana pembelajaran yang membentuk karakter unggul mahasiswa.</p>
    </div>
</section>

<!-- {{-- Visi, Misi, Akreditasi, Mitra --}} -->
<section class="mt-8 rounded-section bg-white p-6 shadow-soft md:mt-6 md:p-6 lg:p-8">
    <div class="grid gap-5 lg:grid-cols-2">
        {{-- Visi --}}
        <div class="rounded-card border border-primary/15 bg-white/90 p-5">
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Visi</span>
            <h2 class="mt-2 text-xl font-semibold text-secondary md:text-2xl">Menjadi Prodi Unggulan</h2>
            <p class="mt-3 text-sm leading-relaxed text-textMuted">
                Mewujudkan program studi yang inovatif, berdaya saing global, dan memberikan dampak nyata bagi kemajuan
                agroindustri berkelanjutan melalui kolaborasi riset, teknologi, serta pemberdayaan masyarakat.
            </p>
        </div>

        {{-- Misi --}}
        <div class="rounded-card border border-primary/15 bg-white/90 p-5">
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Misi</span>
            <h2 class="mt-2 text-xl font-semibold text-secondary md:text-2xl">Langkah Strategis</h2>
            <ul class="mt-4 space-y-3 text-sm text-textMuted">
                <li class="flex items-start gap-2.5">
                    <span class="mt-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary">1</span>
                    Mengembangkan kurikulum adaptif berbasis teknologi dan kebutuhan industri.
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="mt-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary">2</span>
                    Mendorong riset terapan yang menghasilkan solusi inovatif bagi sektor pertanian dan pangan.
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="mt-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-primary/10 text-xs font-semibold text-primary">3</span>
                    Menjalin kemitraan strategis dengan industri, pemerintah, dan komunitas global.
                </li>
            </ul>
        </div>
    </div>
</section>

<div class="mt-8 grid gap-8 lg:grid-cols-2">
    <!-- {{-- Akreditasi --}} -->
    <div class="rounded-card border-secondary/20 bg-white p-8 shadow-card">
        <div class="flex items-center gap-4">
            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-secondary/10">
                <span class="text-2xl font-bold text-secondary">A</span>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide4 text-secondary/80">Akreditasi BAN-PT</p>
                <h3 class="text-2xl font-semibold text-textDark">Unggul / A</h3>
                <p class="text-sm text-textMuted">SK No. 1234/SK/BAN-PT/Akred/IV/2024</p>
            </div>
        </div>
        <p class="mt-6 text-sm leading-relaxed text-textMuted">
            Status akreditasi Unggul diperoleh melalui komitmen terhadap mutu pembelajaran, keunggulan riset, serta layanan
            tridharma yang konsisten dan terukur.
        </p>
    </div>

    <!-- {{-- Mitra --}} -->
    <div class="rounded-card border-secondary/20 bg-white p-8 shadow-card">
        <p class="text-xs font-semibold uppercase tracking-wide4 text-secondary/80">Mitra Strategis</p>
        <h3 class="mt-3 text-2xl font-semibold text-textDark">Jejaring Kolaboratif</h3>
        <p class="mt-4 text-sm text-textMuted">
            Kami berkolaborasi dengan lembaga nasional maupun internasional untuk menghadirkan pengalaman belajar dan riset
            kelas dunia.
        </p>
        <div class="mt-6 grid grid-cols-2 gap-4 text-center text-sm font-semibold text-textMuted">
            <div class="rounded-lg hover:bg-secondary/15 px-4 py-3 text-primary bg-secondary/10">PT Agrotech Nusantara</div>
            <div class="rounded-lg hover:bg-secondary/15 px-4 py-3 text-primary bg-secondary/10">GreenFarm Global</div>
            <div class="rounded-lg hover:bg-secondary/15 px-4 py-3 text-primary bg-secondary/10">SmartAgri Labs</div>
            <div class="rounded-lg hover:bg-secondary/15 px-4 py-3 text-primary bg-secondary/10">LIPI Agro</div>
        </div>
    </div>
</div>

{{-- Prospek Karir --}}
<section class="mt-10 rounded-3xl border border-primary/10 bg-white p-5 shadow-soft md:mt-8 md:p-6">
    <div class="text-center">
        <span class="text-xs font-semibold uppercase tracking-wide4 text-secondary/80">Prospek Karier</span>
        <h3 class="mt-2 text-2xl font-semibold text-textDark">Arah Karier Unggulan</h3>
    </div>
    <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-primary/10 bg-white p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-primary shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide4 text-primary/70">Industri / Tempat Bekerja</p>
                    <h3 class="text-lg font-semibold text-textDark">Jejaring Profesional</h3>
                </div>
            </div>
            <ul class="mt-4 space-y-2 text-sm font-semibold text-textDark">
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    Startup agritech
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    Laboratorium riset
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    Pabrik pangan & logistik
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    BUMN & instansi pemerintah
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    Konsultan keberlanjutan
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    Komunitas wirausaha agro
                </li>
            </ul>
        </article>
        <article class="rounded-2xl border border-secondary/10 bg-white p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-secondary shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide4 text-secondary/70">Posisi yang Banyak Dicari</p>
                    <h3 class="text-lg font-semibold text-textDark">Peran Favorit Industri</h3>
                </div>
            </div>
            <ul class="mt-4 space-y-2 text-sm font-semibold text-textDark">
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Quality control specialist
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Data & automation engineer
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Project manager inovasi
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Konsultan agro & ESG
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Dosen & peneliti terapan
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-secondary"></span>
                    Business development ekspor
                </li>
            </ul>
        </article>
    </div>
</section>

{{-- Filosofi dan Nilai Dasar --}}
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="space-y-6">
        <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Filosofi dan Nilai Dasar</h2>
        <p class="text-sm leading-relaxed text-textMuted md:text-base">
            Program studi ini berlandaskan pada semangat kolaborasi, inovasi, dan penerapan teknologi yang berorientasi pada keberlanjutan.
            Fokus utama kami adalah membentuk lulusan yang memiliki kemampuan berpikir kritis, etika kerja tinggi, serta kepedulian sosial.
        </p>
        <div class="mt-6 grid gap-6 md:grid-cols-3 xl:grid-cols-3">
            <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                <h3 class="text-xl font-semibold text-primary">Nilai dan Etika</h3>
                <p class="mt-3 text-sm text-textMuted">Kami menjunjung tinggi integritas, profesionalisme, serta tanggung jawab dalam setiap aspek pembelajaran dan penelitian.</p>
            </div>
            <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                <h3 class="text-xl font-semibold text-primary">Pendekatan Pembelajaran</h3>
                <p class="mt-3 text-sm text-textMuted">Penerapan metode berbasis proyek, studi kasus, dan kolaborasi lintas disiplin untuk meningkatkan pemahaman praktis mahasiswa.</p>
            </div>
            <div class="rounded-card border-t-4 border-primary bg-white/60 p-8 text-center shadow-soft">
                <h3 class="text-xl font-semibold text-primary">Kompetensi Lulusan</h3>
                <p class="mt-3 text-sm text-textMuted">Lulusan dipersiapkan untuk menjadi inovator di bidang teknologi dan penggerak kemajuan masyarakat berbasis pengetahuan.</p>
            </div>
        </div>
    </div>
</section>

{{-- Fasilitas Pembelajaran --}}
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Fasilitas Pembelajaran</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Lingkungan Belajar Modern</h2>
            </div>
            <a href="{{ route('fasilitas') }}"
                class="hidden items-center gap-2 rounded-full border border-primary/20 px-5 py-2 text-sm font-semibold text-primary transition hover:border-primary hover:shadow-soft md:inline-flex">
                Selengkapnya
                <span aria-hidden="true">></span>
            </a>
        </div>
        <div class="grid gap-6 md:grid-cols-3 xl:grid-cols-3">
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80" alt="Laboratorium Inovasi" class="h-44 w-full object-cover">
                <div class="space-y-3 p-6">
                    <h3 class="text-lg font-semibold text-textDark">Laboratorium Inovasi</h3>
                    <p class="text-sm text-textMuted">Fasilitas modern untuk kegiatan penelitian dan pengembangan teknologi berbasis data dan otomasi.</p>
                </div>
            </article>
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park" class="h-44 w-full object-cover">
                <div class="space-y-3 p-6">
                    <h3 class="text-lg font-semibold text-textDark">Agro Tech Park</h3>
                    <p class="text-sm text-textMuted">Ruang praktik terbuka bagi mahasiswa untuk menerapkan teknologi pertanian presisi di lingkungan nyata.</p>
                </div>
            </article>
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio" class="h-44 w-full object-cover">
                <div class="space-y-3 p-6">
                    <h3 class="text-lg font-semibold text-textDark">Learning Studio</h3>
                    <p class="text-sm text-textMuted">Ruang belajar interaktif yang mendukung pembelajaran kolaboratif dan pengembangan ide kreatif mahasiswa.</p>
                </div>
            </article>
        </div>
        <div class="mt-4 flex justify-end md:hidden">
            <a href="{{ route('fasilitas') }}"
                class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-5 py-2 text-sm font-semibold text-primary transition hover:border-primary hover:shadow-soft">
                Selengkapnya
                <span aria-hidden="true">></span>
            </a>
        </div>
    </div>
</section>
@endsection