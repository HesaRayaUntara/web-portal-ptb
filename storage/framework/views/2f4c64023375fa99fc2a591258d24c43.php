

<?php $__env->startSection('title', $item['title']); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('berita')); ?>" class="transition hover:text-primary">Berita</a>
        <span> > </span>
        <span class="text-primaryDark"><?php echo e($item['title']); ?></span>
    </nav>

    <!-- Hero Banner -->
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(160deg, rgba(5, 86, 49, 0.85), rgba(12, 139, 76, 0.7)), url('<?php echo e($item['image']); ?>');">
        <div class="space-y-4 p-10 text-center md:p-14">
            <span class="inline-flex rounded-full bg-white/15 px-4 py-1 text-xs font-semibold uppercase tracking-wide4">Berita PTB</span>
            <h1 class="text-3xl font-semibold leading-tight md:text-4xl"><?php echo e($item['title']); ?></h1>
        </div>
    </section>

    <div class="-mt-10 flex justify-center">
        <div class="rounded-card border border-primary/10 bg-white px-8 py-4 text-center shadow-card">
            <p class="text-base font-semibold text-secondary"><?php echo e($item['author']); ?></p>
            <p class="text-sm text-textMuted">
                <?php echo e(\Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y')); ?>

            </p>
        </div>
    </div>

    <!-- Content -->
    <section class="mt-14 rounded-section bg-white p-8 shadow-soft md:p-10 lg:p-12">
        <div class="space-y-6 text-base leading-relaxed text-textMuted">
            <?php $__currentLoopData = $item['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($paragraph); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/berita-detail.blade.php ENDPATH**/ ?>