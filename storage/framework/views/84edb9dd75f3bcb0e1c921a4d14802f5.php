

<?php
    use Illuminate\Support\Facades\Storage;
?>

<?php $__env->startSection('title', 'Staf'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('staf')); ?>" class="transition hover:text-primary text-primaryDark">Staf</a>
    </nav>

    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Staf</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Tim Staf</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Mengenal para staf profesional yang mendukung kelancaran operasional dan layanan di Program Studi PTB.</p>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <?php $__empty_1 = true; $__currentLoopData = $staf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex flex-col items-center text-center">
                    <div class="mb-4 aspect-square h-32 w-32 overflow-hidden rounded-full border-2 border-[#1e3a5f] bg-gray-200">
                        <?php if($item->foto): ?>
                            <img src="<?php echo e(Storage::url($item->foto)); ?>" alt="<?php echo e($item->nama); ?>" class="h-full w-full object-cover object-center">
                        <?php else: ?>
                            <div class="flex h-full w-full items-center justify-center bg-gray-200">
                                <svg class="h-16 w-16 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3 class="mb-1 text-base font-bold text-textDark"><?php echo e($item->nama); ?></h3>
                    <p class="text-sm text-textMuted"><?php echo e($item->jabatan); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full py-8 text-center">
                    <p class="text-sm text-textMuted">Belum ada data staf yang ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/staf.blade.php ENDPATH**/ ?>