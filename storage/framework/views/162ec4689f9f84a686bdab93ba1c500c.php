

<?php $__env->startSection('title', 'Detail Dosen - ' . $dosen['name']); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-8 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span>/</span>
        <a href="<?php echo e(route('dosen')); ?>" class="transition hover:text-primary">Dosen</a>
        <span>/</span>
        <span class="text-textDark"><?php echo e($dosen['name']); ?></span>
    </nav>

    <!-- Hero Section -->
    <section class="mb-12 rounded-section bg-white p-8 shadow-soft md:p-10 lg:p-12">
        <div class="grid gap-10 md:grid-cols-[1.1fr_0.9fr] md:items-start">
            <div class="space-y-6">
                <div class="overflow-hidden rounded-card shadow-soft">
                    <img src="<?php echo e($dosen['image']); ?>" alt="<?php echo e($dosen['name']); ?>" class="h-full w-full object-cover">
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-semibold text-secondary md:text-4xl"><?php echo e($dosen['name']); ?></h1>
                    <span class="mt-3 inline-flex rounded-full bg-primary/15 px-4 py-1 text-sm font-semibold text-primary"><?php echo e($dosen['position']); ?></span>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Bidang Keahlian</h3>
                    <p class="text-base text-textMuted"><?php echo e($dosen['expertise']); ?></p>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Kontak</h3>
                    <a href="mailto:<?php echo e($dosen['contact']); ?>" class="text-base text-primary transition hover:text-primaryDark"><?php echo e($dosen['contact']); ?></a>
                </div>
                <div>
                    <h3 class="mb-2 text-lg font-semibold text-textDark">Tentang</h3>
                    <p class="text-sm leading-relaxed text-textMuted md:text-base"><?php echo e($dosen['description']); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Detail -->
    <section class="mb-12 rounded-section bg-white p-8 shadow-soft md:p-10 lg:p-12">
        <h2 class="mb-8 text-3xl font-semibold text-secondary md:text-4xl">Informasi Detail</h2>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Pendidikan</span>
                <?php echo e($dosen['education']); ?>

            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Riset Aktif</span>
                <?php echo e($dosen['research']); ?>

            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Penghargaan</span>
                <?php echo e($dosen['awards']); ?>

            </div>
            <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                <span class="block text-base font-semibold text-textDark">Publikasi</span>
                <?php echo e($dosen['publications']); ?>

            </div>
        </div>
    </section>

    <!-- Back Button -->
    <div class="mb-8">
        <a href="<?php echo e(route('dosen')); ?>" 
           class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-6 py-3 text-sm font-semibold text-primary transition hover:border-primary hover:bg-primary/5 hover:shadow-soft">
            <span aria-hidden="true">←</span>
            Kembali ke Daftar Dosen
        </a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/detail-dosen.blade.php ENDPATH**/ ?>