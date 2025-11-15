<?php $__env->startSection('title', 'Dosen'); ?>

<?php $__env->startSection('content'); ?>
    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Dosen</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Profil Dosen</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Mengenal para pengajar profesional yang menjadi mentor sekaligus mitra riset di Program Studi PTB.</p>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <div class="grid gap-10 md:grid-cols-[1.1fr_0.9fr] md:items-center">
            <div class="space-y-6">
                <div class="overflow-hidden rounded-card shadow-soft">
                    <img src="<?php echo e(asset('gambar/contoh.png')); ?>" alt="Dr. Undang" class="w-full object-cover">
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Dr. Undang, S.P., M.P.</h2>
                    <span class="mt-3 inline-flex rounded-full bg-primary/15 px-4 py-1 text-sm font-semibold text-primary">Kepala Program Studi</span>
                </div>
                <p class="text-sm leading-relaxed text-textMuted md:text-base">
                    Spesialisasi pada agroekologi, ketahanan pangan, dan model pertanian regeneratif. Aktif dalam riset pengelolaan tanah berkelanjutan dan pemberdayaan petani muda melalui komunitas inovasi desa.
                </p>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                        <span class="block text-base font-semibold text-textDark">Pendidikan</span>
                        S3 Agroekologi - Wageningen University
                    </div>
                    <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                        <span class="block text-base font-semibold text-textDark">Riset Aktif</span>
                        Teknologi biochar &amp; circular agriculture
                    </div>
                    <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                        <span class="block text-base font-semibold text-textDark">Penghargaan</span>
                        Green Innovation Award 2024
                    </div>
                    <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted">
                        <span class="block text-base font-semibold text-textDark">Publikasi</span>
                        Lebih dari 15 jurnal internasional terindeks Scopus
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
        <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Tim Dosen</h2>
        <div class="mt-8 overflow-hidden rounded-section border border-primary/10 bg-white shadow-soft">
            <table class="w-full table-auto text-left text-sm text-textDark">
                <thead class="bg-accent text-primary">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nama</th>
                        <th class="px-6 py-4 font-semibold">Bidang Keahlian</th>
                        <th class="px-6 py-4 font-semibold">Kontak</th>
                        <th class="px-6 py-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10">
                    <?php
                        $dosenList = [
                            [
                                'name' => 'Ir. Bagus Raharjo, M.Sc.',
                                'slug' => 'ir-bagus-raharjo-msc',
                                'expertise' => 'Teknologi Irigasi Cerdas',
                                'contact' => 'bagus.raharjo@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. Nurma Hidayati, S.P., M.Si.',
                                'slug' => 'dr-nurma-hidayati-sp-msi',
                                'expertise' => 'Keamanan Pangan & Nutrisi',
                                'contact' => 'nurma.hidayati@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. (Cand.) Ardi Prakoso, S.P., M.P.',
                                'slug' => 'dr-cand-ardi-prakoso-sp-mp',
                                'expertise' => 'Agribisnis Digital',
                                'contact' => 'ardi.prakoso@ptb.ac.id',
                            ],
                            [
                                'name' => 'Dr. Silvi Lestari, S.P., M.P.',
                                'slug' => 'dr-silvi-lestari-sp-mp',
                                'expertise' => 'Manajemen Sumber Daya Lahan',
                                'contact' => 'silvi.lestari@ptb.ac.id',
                            ],
                        ];
                    ?>

                    <?php $__currentLoopData = $dosenList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-accent/60">
                            <td class="px-6 py-4 font-semibold"><?php echo e($row['name']); ?></td>
                            <td class="px-6 py-4"><?php echo e($row['expertise']); ?></td>
                            <td class="px-6 py-4 text-primary"><?php echo e($row['contact']); ?></td>
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route('dosen.detail', $row['slug'])); ?>"
                                   class="inline-flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/dosen.blade.php ENDPATH**/ ?>