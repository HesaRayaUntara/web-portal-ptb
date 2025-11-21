

<?php $__env->startSection('title', 'Admin - Berita'); ?>

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
                    <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</button>
                    <a href="<?php echo e(route('admin.berita.index')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Berita</a>
                    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Galeri</a>
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
        <main class="flex-1 p-4 md:p-6 lg:p-8">
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-bold text-textDark sm:text-2xl">Berita</h1>
                    <p class="mt-1 text-xs text-textMuted sm:text-sm">Kelola berita dan kategori berita</p>
                </div>
                <a href="<?php echo e(route('admin.berita.draft')); ?>" 
                    class="flex items-center justify-center gap-2 rounded-lg border border-primary bg-white px-3 py-2 text-xs font-semibold text-primary shadow-soft transition hover:bg-primary/5 sm:px-4 sm:text-sm"
                    title="Lihat Draft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            </div>

            
            <?php if(session('success')): ?>
                <div id="success-alert" class="mb-6 flex items-center justify-between rounded-xl border border-green-300 bg-green-50 px-3 py-2 text-xs text-green-800 shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-green-600 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold break-words"><?php echo e(session('success')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="ml-2 flex-shrink-0 text-green-600 hover:text-green-800 sm:ml-0">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-3 py-2 text-xs text-red-800 shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-red-600 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold break-words"><?php echo e(session('error')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="ml-2 flex-shrink-0 text-red-600 hover:text-red-800 sm:ml-0">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div id="validation-alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 px-3 py-2 text-xs shadow-soft animate-slide-down sm:px-4 sm:py-3 sm:text-sm">
                    <div class="flex items-start gap-2 sm:gap-3">
                        <svg class="h-4 w-4 flex-shrink-0 text-red-600 mt-0.5 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1 min-w-0">
                            <h3 class="mb-2 font-semibold text-red-800">Terjadi kesalahan validasi:</h3>
                            <ul class="list-inside list-disc space-y-1 text-xs text-red-700 sm:text-sm">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="break-words"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <button type="button" onclick="document.getElementById('validation-alert').remove()" class="ml-2 flex-shrink-0 text-red-600 hover:text-red-800 sm:ml-0">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Kategori Berita</h2>
                
                
                <form method="POST" action="<?php echo e(route('admin.berita.storeKategori')); ?>" class="mb-6">
                    <?php echo csrf_field(); ?>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <input type="text" name="nama" id="nama" value="<?php echo e(old('nama')); ?>" 
                            class="flex-1 rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            placeholder="Masukkan kategori berita" required>
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto sm:px-6">
                            Tambah
                        </button>
                    </div>
                </form>

                
                <?php if($kategoris->count() > 0): ?>
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="w-full min-w-[300px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Kategori Berita</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm"><?php echo e($kategori->nama); ?></td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center">
                                                <form method="POST" action="<?php echo e(route('admin.berita.deleteKategori', $kategori->id)); ?>" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="flex items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-600 transition hover:bg-red-100 sm:p-2"
                                                        title="Hapus">
                                                        <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada kategori berita.</p>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Tambah Berita</h2>
                
                <form method="POST" action="<?php echo e(route('admin.berita.storeBerita')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="space-y-4">
                        <div>
                            <label for="judul" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="<?php echo e(old('judul')); ?>" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                        </div>

                        <div>
                            <label for="isi" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="8" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:rows-10 sm:px-4" 
                                required><?php echo e(old('isi')); ?></textarea>
                        </div>

                        <div>
                            <label for="kategori_berita_id" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Kategori</label>
                            <select name="kategori_berita_id" id="kategori_berita_id" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kategori->id); ?>" <?php echo e(old('kategori_berita_id') == $kategori->id ? 'selected' : ''); ?>>
                                        <?php echo e($kategori->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div>
                            <label for="penulis" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Penulis</label>
                            <input type="text" name="penulis" id="penulis" value="<?php echo e(old('penulis')); ?>" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                                required>
                        </div>

                        <div>
                            <label for="image" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Gambar <span class="text-red-500">*</span></label>
                            <input type="file" name="image" id="image" accept="image/jpeg,image/jpg,image/png" 
                                class="w-full rounded-lg border border-borderSoft px-3 py-2 text-xs focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4 sm:text-sm" 
                                required>
                            <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 10MB)</p>
                        </div>

                        <div class="flex flex-col gap-2 pt-4 sm:flex-row sm:justify-end">
                            <button type="submit" name="action" value="draf" 
                                class="w-full rounded-lg border border-borderSoft bg-white px-4 py-2 text-xs font-semibold text-textDark shadow-soft transition hover:bg-gray-100 sm:w-auto">
                                Simpan sebagai Draft
                            </button>
                            <button type="submit" name="action" value="publikasikan" 
                                onclick="return confirm('Apakah anda yakin untuk memublikasikan berita ini?');"
                                class="w-full rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto">
                                Publikasikan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            
            <div class="rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Berita yang Sudah Dipublikasikan</h2>
                
                <?php if($beritaList->count() > 0): ?>
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="w-full min-w-[500px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Judul Berita</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $beritaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm"><?php echo e($berita->judul); ?></td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.berita.editBerita', $berita->id)); ?>"
                                                    class="flex items-center justify-center rounded-lg bg-blue-50 p-1.5 text-blue-600 transition hover:bg-blue-100 sm:p-2"
                                                    title="Edit">
                                                    <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.berita.destroyBerita', $berita->id)); ?>" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="flex items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-600 transition hover:bg-red-100 sm:p-2"
                                                        title="Hapus">
                                                        <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada berita yang dipublikasikan.</p>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/admin-pages/admin-berita.blade.php ENDPATH**/ ?>