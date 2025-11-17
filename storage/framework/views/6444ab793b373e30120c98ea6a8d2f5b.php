<?php $__env->startSection('title', 'Profil Program Studi'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('profil')); ?>" class="transition hover:text-primary text-primaryDark">Profil Prodi</a>
    </nav>


    
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Profil Prodi</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Profil Program Studi</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Mengenal lebih dekat visi, filosofi, dan sarana pembelajaran yang membentuk karakter unggul mahasiswa.</p>
        </div>
    </section>

    
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Filosofi dan Nilai Dasar</h2>
            <p class="text-sm leading-relaxed text-textMuted md:text-base">
                Program studi ini berlandaskan pada semangat kolaborasi, inovasi, dan penerapan teknologi yang berorientasi pada keberlanjutan.
                Fokus utama kami adalah membentuk lulusan yang memiliki kemampuan berpikir kritis, etika kerja tinggi, serta kepedulian sosial.
            </p>
            <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
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

    
    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Fasilitas Pembelajaran</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Lingkungan Belajar Modern</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1573497491765-dccce02b29df?auto=format&fit=crop&w=800&q=80" alt="Laboratorium Inovasi" class="h-44 w-full object-cover">
                <div class="space-y-3 p-6">
                    <h3 class="text-lg font-semibold text-textDark">Laboratorium Inovasi</h3>
                    <p class="text-sm text-textMuted">Fasilitas modern untuk kegiatan penelitian dan pengembangan teknologi berbasis data dan otomasi.</p>
                </div>
            </article>
            <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park" class="h-44 w-full object-cover">
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
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/profil.blade.php ENDPATH**/ ?>