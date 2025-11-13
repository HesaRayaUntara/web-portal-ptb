@extends('layouts.main')

@section('title', 'Kontak Kami')

@section('content')
    {{-- Hero Section --}}
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Kontak</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Hubungi Kami</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Kami siap membantu menjawab pertanyaan dan kebutuhan Anda.</p>
        </div>
    </section>

    {{-- Informasi Kontak --}}
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Informasi Kontak</h2>
        <div class="mt-8 grid gap-4 md:grid-cols-2">
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Alamat</span>
                Jl. Raya Pendidikan No. 45, Bogor, Jawa Barat
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Email</span>
                info@ptb.ac.id
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Telepon</span>
                (0251) 123-4567
            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Jam Operasional</span>
                Senin - Jumat, 08.00 - 16.00 WIB
            </div>
        </div>
    </section>

    {{-- Formulir Kontak --}}
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Kirim Pesan</h2>
        <form class="mt-8 grid gap-5 md:grid-cols-2">
            <label class="space-y-2 text-sm font-medium text-textDark/80">
                <span>Nama Lengkap</span>
                <input type="text" placeholder="Masukkan nama Anda"
                       class="w-full rounded-badge border border-primary/15 bg-white px-4 py-3 text-sm text-textDark placeholder:text-textMuted/60 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            </label>
            <label class="space-y-2 text-sm font-medium text-textDark/80">
                <span>Email</span>
                <input type="email" placeholder="Masukkan email Anda"
                       class="w-full rounded-badge border border-primary/15 bg-white px-4 py-3 text-sm text-textDark placeholder:text-textMuted/60 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            </label>
            <label class="md:col-span-2 space-y-2 text-sm font-medium text-textDark/80">
                <span>Pesan</span>
                <textarea rows="4" placeholder="Tulis pesan Anda di sini"
                          class="w-full rounded-badge border border-primary/15 bg-white px-4 py-3 text-sm text-textDark placeholder:text-textMuted/60 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30"></textarea>
            </label>
            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-badge bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                    Kirim
                </button>
            </div>
        </form>
    </section>
@endsection
