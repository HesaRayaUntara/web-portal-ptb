<?php $__env->startSection('title', 'Berita'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Berita dan Kegiatan PTB</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">
                Temukan informasi terbaru seputar kegiatan, inovasi, dan kolaborasi dari Program Studi Pemuliaan Tanaman dan Teknologi Benih.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-white px-6 py-3 text-sm font-semibold text-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-card"
                   href="#kegiatan">Kegiatan Terkini</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:border-white"
                   href="#arsip">Arsip Berita</a>
            </div>
        </div>
    </section>

    <!-- Kegiatan Terkini -->
    <section id="kegiatan" class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Kegiatan Terkini</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Sorotan Kegiatan</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php $__currentLoopData = [
                [
                    'title' => 'Workshop Digital Farming',
                    'desc' => 'Mahasiswa PTB mengadakan pelatihan penggunaan teknologi digital dalam sistem pertanian cerdas untuk meningkatkan efisiensi produksi.',
                    'image' => 'https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Field Trip ke Lembaga Riset Pertanian',
                    'desc' => 'Kunjungan lapangan ke Balai Penelitian Tanaman Pangan memberikan pengalaman langsung tentang inovasi benih unggul dan pemuliaan tanaman.',
                    'image' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Konferensi Nasional Teknologi Pertanian',
                    'desc' => 'Dosen dan mahasiswa PTB berpartisipasi dalam konferensi nasional untuk mempresentasikan hasil penelitian inovatif di bidang pertanian presisi.',
                    'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80',
                ],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?>" class="h-44 w-full object-cover">
                    <div class="space-y-3 p-6">
                        <h3 class="text-lg font-semibold text-textDark"><?php echo e($item['title']); ?></h3>
                        <p class="text-sm text-textMuted"><?php echo e($item['desc']); ?></p>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <!-- Arsip Berita -->
    <section id="arsip" class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Arsip Berita</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Jejak Kegiatan</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php $__currentLoopData = [
                [
                    'title' => 'Program Inkubasi Startup Pertanian',
                    'desc' => 'Mahasiswa PTB terpilih dalam program inkubasi startup berbasis pertanian berkelanjutan yang mendukung inovasi teknologi hijau.',
                    'image' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Pengabdian Masyarakat di Desa Mitra',
                    'desc' => 'Kegiatan pengabdian masyarakat fokus pada pelatihan pemuliaan benih dan manajemen pertanian berbasis lingkungan di desa mitra binaan.',
                    'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'title' => 'Kolaborasi Internasional Riset Tanaman',
                    'desc' => 'Kerja sama riset antara PTB dan universitas luar negeri dalam pengembangan varietas tanaman adaptif terhadap perubahan iklim.',
                    'image' => 'https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=800&q=80',
                ],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?>" class="h-44 w-full object-cover">
                    <div class="space-y-3 p-6">
                        <h3 class="text-lg font-semibold text-textDark"><?php echo e($item['title']); ?></h3>
                        <p class="text-sm text-textMuted"><?php echo e($item['desc']); ?></p>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/berita.blade.php ENDPATH**/ ?>