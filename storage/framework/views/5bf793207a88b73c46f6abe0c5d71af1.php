<?php $__env->startSection('title', 'Detail Kurikulum'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
<nav class="mb-4 flex items-center gap-2 text-xs text-textMuted md:mb-6 md:text-sm">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('kurikulum')); ?>" class="transition hover:text-primary">Kurikulum</a>
        <span> > </span>
        <a href="<?php echo e(route('kurikulum.detail')); ?>" class="transition hover:text-primary text-primaryDark">Detail Kurikulum</a>
    </nav>

    
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-4 p-6 md:space-y-5 md:p-10 lg:p-12 xl:p-16">
        <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-wide4 text-white md:px-4 md:text-xs">
                Detail Kurikulum
            </span>
        <h1 class="text-2xl font-bold leading-tight md:text-3xl lg:text-4xl xl:text-5xl">
                Struktur Mata Kuliah per Semester
            </h1>
        <p class="max-w-2xl text-sm text-white/85 md:text-base lg:text-lg">
            Rincian mata kuliah dari Semester 1 sampai Semester 8, lengkap dengan kode, jenis mata kuliah, dan jumlah SKS.
            </p>
        </div>
    </section>

    
<section class="mt-6 space-y-6 md:mt-8 md:space-y-8">
        <?php if($kurikulumBySemester->count() > 0): ?>
            <?php $__currentLoopData = $kurikulumBySemester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $kurikulumItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="rounded-section bg-white p-4 shadow-soft md:p-6 lg:p-8">
                    <div class="mb-4 flex items-center justify-between gap-4">
            <h2 class="text-lg font-semibold text-secondary md:text-xl lg:text-2xl">
                            Semester <?php echo e($semester); ?>

                        </h2>
                    </div>

                    <div class="overflow-x-auto rounded-section border border-primary/10 bg-white">
            <table class="min-w-full table-auto text-left text-xs text-textDark md:text-sm">
                            <thead class="bg-accent text-primary">
                            <tr>
                        <th class="whitespace-nowrap px-3 py-2 font-semibold md:px-4 md:py-3">No</th>
                        <th class="whitespace-nowrap px-3 py-2 font-semibold md:px-4 md:py-3">Kode</th>
                        <th class="whitespace-nowrap px-3 py-2 font-semibold md:px-4 md:py-3">Nama Mata Kuliah</th>
                        <th class="whitespace-nowrap px-3 py-2 font-semibold md:px-4 md:py-3">Jenis MK</th>
                        <th class="whitespace-nowrap px-3 py-2 font-semibold md:px-4 md:py-3">SKS</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-primary/10">
                            <?php $__currentLoopData = $kurikulumItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-accent/60">
                        <td class="whitespace-nowrap px-3 py-2 md:px-4 md:py-3"><?php echo e($index + 1); ?></td>
                        <td class="whitespace-nowrap px-3 py-2 md:px-4 md:py-3"><?php echo e($item->kode_mk); ?></td>
                        <td class="whitespace-nowrap px-3 py-2 md:px-4 md:py-3"><?php echo e($item->nama_mk); ?></td>
                        <td class="whitespace-nowrap px-3 py-2 md:px-4 md:py-3"><?php echo e($item->jenis_mk); ?></td>
                        <td class="whitespace-nowrap px-3 py-2 md:px-4 md:py-3"><?php echo e($item->sks_kuliah + $item->sks_praktikum); ?> (<?php echo e($item->sks_kuliah); ?>-<?php echo e($item->sks_praktikum); ?>)</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
        
        
        <?php
            $jenisMkMap = [
                'CCC' => 'Common Core Courses',
                'FC' => 'Foundational Courses',
                'FL' => 'Foundational Literacies Courses',
                'IC' => 'In-depth Study Program Courses',
                'ACC' => 'Vocational Core Courses',
                'EC' => 'Enrichment Courses',
                'FYP' => 'Final Year Project'
            ];
            $jenisMkInSemester = $kurikulumItems->pluck('jenis_mk')->unique()->sort()->values()->all();
        ?>
        <?php if(count($jenisMkInSemester) > 0): ?>
        <div class="mt-3 text-[8px] italic text-textMuted md:text-[10px]">
            <span>*</span>
            <?php $__currentLoopData = $jenisMkInSemester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span><span class="font-bold not-italic"><?php echo e($jenis); ?></span>: <?php echo e($jenisMkMap[$jenis] ?? $jenis); ?></span>
                <?php if(!$loop->last): ?>
                    <span class="mx-1"></span>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
                </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php
    $totalSksAll = 0;
    $totalSksKuliahAll = 0;
    $totalSksPraktikumAll = 0;
    foreach($kurikulumBySemester as $kurikulumItems) {
    $totalSksAll += $kurikulumItems->sum(function($item) {
    return $item->sks_kuliah + $item->sks_praktikum;
    });
    $totalSksKuliahAll += $kurikulumItems->sum('sks_kuliah');
    $totalSksPraktikumAll += $kurikulumItems->sum('sks_praktikum');
    }
    ?>
    <div class="rounded-lg border border-primary/20 bg-gradient-to-r from-primary/5 via-primary/10 to-primary/5 px-4 py-3 shadow-soft">
        <div class="flex items-center justify-between gap-2 whitespace-nowrap text-[10px] md:text-sm">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3.5 w-3.5 text-primary md:h-4 md:w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                <span class="font-semibold text-textDark">Total SKS</span>
            </div>
            <div class="flex items-center gap-2 text-textDark md:gap-3">
                <span class="text-textMuted"><span class="font-bold text-primary"><?php echo e($totalSksAll); ?></span> SKS</span>
                <span class="text-textMuted">• Kuliah: <span class="font-semibold text-secondary"><?php echo e($totalSksKuliahAll); ?></span> SKS</span>
                <span class="text-textMuted">• Praktikum: <span class="font-semibold text-secondary"><?php echo e($totalSksPraktikumAll); ?></span> SKS</span>
            </div>
        </div>
    </div>
        <?php else: ?>
    <section class="rounded-section bg-white p-4 shadow-soft md:p-6 lg:p-8">
                <div class="py-12 text-center">
            <p class="text-xs text-textMuted md:text-sm">Data kurikulum belum tersedia.</p>
                </div>
            </section>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-pengunjung/kurikulum/detail.blade.php ENDPATH**/ ?>