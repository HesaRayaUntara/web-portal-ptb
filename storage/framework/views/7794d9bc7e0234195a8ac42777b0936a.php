

<?php $__env->startSection('title', 'Admin - Edit Galeri'); ?>

<?php
    use Illuminate\Support\Facades\Storage;
?>

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
                    <a href="<?php echo e(route('admin.berita.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</a>
                    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Galeri</a>
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
            <div class="mb-6">
                <h1 class="text-xl font-bold text-textDark sm:text-2xl">Edit Galeri</h1>
                <p class="mt-1 text-xs text-textMuted sm:text-sm">Edit galeri yang sudah dipublikasikan</p>
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

            
            <form method="POST" action="<?php echo e(route('admin.galeri.updateGaleri', $galeri->id)); ?>" enctype="multipart/form-data" id="galeriForm" class="rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:p-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="space-y-4">
                    <div>
                        <label for="judul" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Judul</label>
                        <input type="text" name="judul" id="judul" value="<?php echo e(old('judul', $galeri->judul)); ?>" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            required>
                    </div>

                    <div>
                        <label for="deskripsi" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Deskripsi Singkat</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            required><?php echo e(old('deskripsi', $galeri->deskripsi)); ?></textarea>
                    </div>

                    <div>
                        <label for="kategori_galeri_id" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Kategori</label>
                        <select name="kategori_galeri_id" id="kategori_galeri_id" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori->id); ?>" <?php echo e(old('kategori_galeri_id', $galeri->kategori_galeri_id) == $kategori->id ? 'selected' : ''); ?>>
                                    <?php echo e($kategori->nama); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label for="tipe" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Tipe</label>
                        <select name="tipe" id="tipe" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            required>
                            <option value="">Pilih Tipe</option>
                            <option value="photo" <?php echo e(old('tipe', $galeri->tipe) == 'photo' ? 'selected' : ''); ?>>Foto</option>
                            <option value="video" <?php echo e(old('tipe', $galeri->tipe) == 'video' ? 'selected' : ''); ?>>Video</option>
                        </select>
                    </div>

                    
                    <div id="photo-input" style="display: <?php echo e(old('tipe', $galeri->tipe) == 'photo' ? 'block' : 'none'); ?>;">
                        <label for="foto" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Gambar</label>
                        <?php if($galeri->tipe === 'photo' && $galeri->foto): ?>
                            <div class="mb-2">
                                <img src="<?php echo e(Storage::url($galeri->foto)); ?>" alt="Current image" class="h-24 w-auto rounded-lg border border-borderSoft object-cover sm:h-32">
                                <p class="mt-1 text-xs text-textMuted">Gambar saat ini</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" id="foto" accept="image/jpeg,image/jpg,image/png" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-xs focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4 sm:text-sm">
                        <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 10MB). Kosongkan jika tidak ingin mengubah gambar.</p>
                    </div>

                    
                    <div id="video-input" style="display: <?php echo e(old('tipe', $galeri->tipe) == 'video' ? 'block' : 'none'); ?>;">
                        <label for="youtube_url" class="mb-2 block text-xs font-semibold text-textDark sm:text-sm">Link YouTube</label>
                        <input type="url" name="youtube_url" id="youtube_url" value="<?php echo e(old('youtube_url', $galeri->youtube_url)); ?>" 
                            class="w-full rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            placeholder="Masukkan link YouTube">
                    </div>

                    <div class="flex flex-col gap-2 pt-4 sm:flex-row">
                        <a href="<?php echo e(route('admin.galeri.index')); ?>" 
                            class="w-full rounded-lg border border-primary bg-white px-4 py-2 text-center text-xs font-semibold text-primary shadow-soft transition hover:bg-primary/5 sm:flex-1 sm:text-sm sm:py-3">
                            < Kembali ke Galeri
                        </a>
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:flex-1 sm:text-sm sm:py-3">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    // Toggle input berdasarkan tipe
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('tipe');
        const photoInput = document.getElementById('photo-input');
        const videoInput = document.getElementById('video-input');
        const imageInput = document.getElementById('foto');
        const youtubeInput = document.getElementById('youtube_url');

        function toggleInputs() {
            const selectedType = typeSelect.value;
            
            if (selectedType === 'photo') {
                photoInput.style.display = 'block';
                videoInput.style.display = 'none';
                youtubeInput.removeAttribute('required');
            } else if (selectedType === 'video') {
                photoInput.style.display = 'none';
                videoInput.style.display = 'block';
                imageInput.removeAttribute('required');
                youtubeInput.setAttribute('required', 'required');
            } else {
                photoInput.style.display = 'none';
                videoInput.style.display = 'none';
                imageInput.removeAttribute('required');
                youtubeInput.removeAttribute('required');
            }
        }

        typeSelect.addEventListener('change', toggleInputs);
    });

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/admin-pages/admin-edit-galeri.blade.php ENDPATH**/ ?>