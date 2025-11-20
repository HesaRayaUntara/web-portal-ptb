<?php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
?>

<?php $__env->startSection('title', 'Berita'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('berita')); ?>" class="transition hover:text-primary text-primaryDark">Berita</a>
    </nav>

    <!-- Hero Section -->
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Berita</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Berita dan Kegiatan PTB</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">
                Temukan informasi terbaru seputar kegiatan, inovasi, dan kolaborasi dari Program Studi Pemuliaan Tanaman dan Teknologi Benih.
            </p>
            <!-- <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-white px-6 py-3 text-sm font-semibold text-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-card"
                   href="#kegiatan">Kegiatan Terkini</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:border-white"
                   href="#arsip">Arsip Berita</a>
            </div> -->
        </div>
    </section>

    <!-- Kegiatan Terkini -->
    <section id="kegiatan" class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Berita Terkini</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Jejak Kegiatan</h2>
            </div>
            <div class="relative">
                <div class="group inline-flex w-full items-center justify-end md:justify-start">
                    <button type="button"
                        class="flex w-full items-center justify-center gap-2 rounded-badge border border-primary/15 bg-white px-4 py-2 text-sm font-medium text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40 md:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span id="selected-category"><?php echo e(request('kategori') ?: 'Semua Kategori'); ?></span>
                        <span class="text-xs" aria-hidden="true">&#x25BE;</span>
                    </button>
                    <div class="absolute right-0 top-full z-50 mt-2 hidden min-w-[180px] flex-col rounded-badge border border-primary/10 bg-white text-sm text-textDark shadow-soft transition group-hover:flex group-focus-within:flex">
                        <a href="<?php echo e(route('berita')); ?>"
                           class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e(!request('kategori') ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                            <span>Semua Kategori</span>
                        </a>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('berita', ['kategori' => $category])); ?>"
                               class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e(request('kategori') === $category ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                                <span><?php echo e($category); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-3 xl:grid-cols-3">
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('berita.detail', $item->slug)); ?>" class="group block h-full">
                    <article class="flex h-full flex-col overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                        <div class="relative">
                            <img src="<?php echo e($item->image ? Storage::url($item->image) : 'https://via.placeholder.com/800x600'); ?>" alt="<?php echo e($item->judul); ?>" class="h-44 w-full object-cover">
                            <?php if($item->kategori): ?>
                                <div class="absolute right-3 top-3 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-primaryDark shadow-soft">
                                    <?php echo e($item->kategori->nama); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-1 flex-col justify-between space-y-3 p-6">
                            <div>
                                <h3 class="text-lg font-semibold text-textDark group-hover:text-primary"><?php echo e($item->judul); ?></h3>
                                <p class="mt-2 text-sm text-textMuted"><?php echo e(Str::limit(strip_tags($item->isi), 150)); ?></p>
                            </div>
                            <div class="flex items-center justify-between text-xs font-semibold text-textMuted/80">
                                <span class="flex items-center gap-2 text-textMuted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                                    </svg>
                                    <?php echo e($item->penulis); ?>

                                </span>
                                <span class="text-primaryDark"><?php echo e(($item->tanggal_publikasi ?? $item->created_at)->translatedFormat('d M Y')); ?></span>
                            </div>
                        </div>
                    </article>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($news->hasPages()): ?>
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center gap-2 rounded-full border border-primary/10 bg-white px-5 py-2 text-sm shadow-soft">
                    <?php $__currentLoopData = range(1, $news->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            href="<?php echo e($news->url($page)); ?>"
                            class="min-w-[36px] rounded-full px-3 py-1 text-center font-semibold transition
                                <?php echo e($page == $news->currentPage() ? 'bg-primary text-white shadow-card' : 'text-textMuted hover:bg-primary/10 hover:text-primary'); ?>">
                            <?php echo e($page); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </div>
        <?php endif; ?>
    </section>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/berita.blade.php ENDPATH**/ ?>