

<?php $__env->startSection('title', 'Detail Kurikulum'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('kurikulum')); ?>" class="transition hover:text-primary">Kurikulum</a>
        <span> > </span>
        <a href="<?php echo e(route('kurikulum.detail')); ?>" class="transition hover:text-primary text-primaryDark">Detail Kurikulum</a>
    </nav>

    
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">
                Detail Kurikulum
            </span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                Struktur Mata Kuliah per Semester
            </h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">
                Rincian mata kuliah dari Semester 1 sampai Semester 8, lengkap dengan kode, status mata kuliah, dan jumlah SKS.
            </p>
        </div>
    </section>

    
    <section class="mt-12 space-y-10 md:mt-16">
        <?php if($kurikulumBySemester->count() > 0): ?>
            <?php $__currentLoopData = $kurikulumBySemester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $kurikulumItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <section class="rounded-section bg-white p-6 shadow-soft md:p-8">
                    <div class="mb-4 flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold text-secondary md:text-3xl">
                            Semester <?php echo e($semester); ?>

                        </h2>
                        <span class="rounded-full bg-primary/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-primary">
                            Kurikulum PTB
                        </span>
                    </div>

                    <div class="overflow-x-auto rounded-section border border-primary/10 bg-white">
                        <table class="min-w-full table-auto text-left text-sm text-textDark">
                            <thead class="bg-accent text-primary">
                            <tr>
                                <th class="px-4 py-3 font-semibold md:px-6 md:py-4">No</th>
                                <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Kode</th>
                                <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Nama Mata Kuliah</th>
                                <th class="px-4 py-3 font-semibold md:px-6 md:py-4">Status MK</th>
                                <th class="px-4 py-3 font-semibold md:px-6 md:py-4">SKS</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-primary/10">
                            <?php $__currentLoopData = $kurikulumItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-accent/60">
                                    <td class="px-4 py-3 md:px-6 md:py-4"><?php echo e($index + 1); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4"><?php echo e($item->kode_mata_kuliah); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4"><?php echo e($item->nama_mata_kuliah); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4"><?php echo e($item->status_mata_kuliah); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4"><?php echo e($item->sks_kuliah + $item->sks_praktikum); ?> (<?php echo e($item->sks_kuliah); ?>-<?php echo e($item->sks_praktikum); ?>)</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <section class="rounded-section bg-white p-6 shadow-soft md:p-8">
                <div class="py-12 text-center">
                    <p class="text-textMuted">Data kurikulum belum tersedia.</p>
                </div>
            </section>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/kurikulum-detail.blade.php ENDPATH**/ ?>