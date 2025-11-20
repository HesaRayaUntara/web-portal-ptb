<?php $__env->startSection('title', 'Admin - Kurikulum'); ?>

<?php $__env->startSection('content'); ?>
<div class="rounded-section border border-borderSoft bg-white shadow-soft">
    <div class="flex flex-col gap-8 lg:flex-row">
        <aside class="w-full border-borderSoft bg-[#F4F7F3] p-6 lg:w-80 lg:border-r">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-3 rounded-card bg-white px-4 py-3 shadow-soft">
                    <img src="<?php echo e(asset('gambar/logo-ptb.png')); ?>" alt="Logo PTB" class="h-12 w-12 rounded-full border border-primary/30 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-textDark">Pemuliaan Tanaman</p>
                        <p class="text-xs text-textMuted">dan Teknologi Benih</p>
                    </div>
                </div>
                <nav class="space-y-1 text-sm font-semibold text-textMuted">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Dasbor</a>
                    <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                    <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Kurikulum</a>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Galeri</button>
                </nav>
                <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-primary/20 bg-white px-4 py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white">
                        <span>Keluar Admin</span>
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Kurikulum</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola kurikulum program studi</p>
            </div>

            
            <?php if(session('success')): ?>
                <div id="success-alert" class="mb-6 flex items-center justify-between rounded-xl border border-green-300 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?php echo e(session('success')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="text-green-600 hover:text-green-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?php echo e(session('error')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="text-red-600 hover:text-red-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div id="validation-alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 px-4 py-3 shadow-soft animate-slide-down">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1">
                            <h3 class="mb-2 font-semibold text-red-800">Terjadi kesalahan validasi:</h3>
                            <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <button type="button" onclick="document.getElementById('validation-alert').remove()" class="text-red-600 hover:text-red-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            
            <form method="POST" action="<?php echo e(route('admin.kurikulum.updateDeskripsi')); ?>" class="mb-8 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <?php echo csrf_field(); ?>
                
                <div class="space-y-6">
                    <div>
                        <label for="deskripsi_semester_1_2" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Semester 1 dan 2</label>
                        <textarea id="deskripsi_semester_1_2" name="deskripsi_semester_1_2" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan deskripsi semester 1 dan 2"><?php echo e(old('deskripsi_semester_1_2', $deskripsiKurikulum->deskripsi_semester_1_2 ?? '')); ?></textarea>
                    </div>

                    <div>
                        <label for="deskripsi_semester_3_4" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Semester 3 dan 4</label>
                        <textarea id="deskripsi_semester_3_4" name="deskripsi_semester_3_4" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan deskripsi semester 3 dan 4"><?php echo e(old('deskripsi_semester_3_4', $deskripsiKurikulum->deskripsi_semester_3_4 ?? '')); ?></textarea>
                    </div>

                    <div>
                        <label for="deskripsi_semester_5_6" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Semester 5 dan 6</label>
                        <textarea id="deskripsi_semester_5_6" name="deskripsi_semester_5_6" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan deskripsi semester 5 dan 6"><?php echo e(old('deskripsi_semester_5_6', $deskripsiKurikulum->deskripsi_semester_5_6 ?? '')); ?></textarea>
                    </div>

                    <div>
                        <label for="deskripsi_semester_7_8" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Semester 7 dan 8</label>
                        <textarea id="deskripsi_semester_7_8" name="deskripsi_semester_7_8" rows="4"
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan deskripsi semester 7 dan 8"><?php echo e(old('deskripsi_semester_7_8', $deskripsiKurikulum->deskripsi_semester_7_8 ?? '')); ?></textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        Simpan Deskripsi
                    </button>
                </div>
            </form>

            
            <div class="rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Daftar Mata Kuliah</h2>
                    <a href="<?php echo e(route('admin.kurikulum.create')); ?>"
                        class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($kurikulumBySemester->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Semester</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Kode</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Mata Kuliah</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">SKS</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $semesterKeys = $kurikulumBySemester->keys()->toArray();
                                ?>
                                <?php $__currentLoopData = $kurikulumBySemester; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $kurikulumItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $semesterIndex = array_search($semester, $semesterKeys);
                                        $isLastSemester = $semesterIndex === count($semesterKeys) - 1;
                                    ?>
                                    <?php $__currentLoopData = $kurikulumItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isLastItem = $index === $kurikulumItems->count() - 1;
                                        ?>
                                        <tr class="transition <?php echo e($isLastItem && !$isLastSemester ? 'border-b border-borderSoft' : ''); ?>">
                                            <?php if($index === 0): ?>
                                                <td class="px-4 py-2 text-sm font-semibold text-textDark whitespace-nowrap align-top" rowspan="<?php echo e($kurikulumItems->count()); ?>">Semester <?php echo e($semester); ?></td>
                                            <?php endif; ?>
                                            <td class="px-4 py-2 text-sm text-textMuted whitespace-nowrap">
                                                <?php echo e($item->kode_mata_kuliah); ?>

                                            </td>
                                            <td class="px-4 py-2 text-sm text-textMuted whitespace-nowrap">
                                                <?php echo e($item->nama_mata_kuliah); ?>

                                            </td>
                                            <td class="px-4 py-2 text-sm text-textMuted whitespace-nowrap">
                                            <?php echo e($item->sks_kuliah + $item->sks_praktikum); ?> (<?php echo e($item->sks_kuliah); ?>-<?php echo e($item->sks_praktikum); ?>)
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="<?php echo e(route('admin.kurikulum.edit', $item->id)); ?>"
                                                        class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100 flex-shrink-0"
                                                        title="Edit">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form method="POST" action="<?php echo e(route('admin.kurikulum.destroy', $item->id)); ?>" class="inline flex-shrink-0"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100"
                                                            title="Hapus">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada mata kuliah yang ditambahkan.</p>
                        <a href="<?php echo e(route('admin.kurikulum.create')); ?>"
                            class="mt-4 inline-block rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                            Tambah Kurikulum Pertama
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<script>
    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        const validationAlert = document.getElementById('validation-alert');

        if (successAlert) {
            setTimeout(function() {
                successAlert.style.transition = 'opacity 0.5s ease-out';
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.remove();
                }, 500);
            }, 5000);
        }

        if (errorAlert) {
            setTimeout(function() {
                errorAlert.style.transition = 'opacity 0.5s ease-out';
                errorAlert.style.opacity = '0';
                setTimeout(function() {
                    errorAlert.remove();
                }, 500);
            }, 5000);
        }

        if (validationAlert) {
            setTimeout(function() {
                validationAlert.style.transition = 'opacity 0.5s ease-out';
                validationAlert.style.opacity = '0';
                setTimeout(function() {
                    validationAlert.remove();
                }, 500);
            }, 5000);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/admin-pages/admin-kurikulum.blade.php ENDPATH**/ ?>