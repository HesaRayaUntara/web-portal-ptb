

<?php
    use Illuminate\Support\Facades\Storage;
?>

<?php $__env->startSection('title', $berita->judul); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('berita')); ?>" class="transition hover:text-primary">Berita</a>
        <span> > </span>
        <span class="text-primaryDark"><?php echo e($berita->judul); ?></span>
    </nav>

    <article class="overflow-hidden rounded-section bg-white shadow-soft">
        <div class="relative">
            <img src="<?php echo e($berita->image ? Storage::url($berita->image) : 'https://via.placeholder.com/800x600'); ?>" alt="<?php echo e($berita->judul); ?>" class="h-80 w-full object-cover">
            <div class="absolute inset-x-0 bottom-0 bg-black/70 p-6 text-white">
                <?php if($berita->kategori): ?>
                    <div class="inline-block rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-primaryDark shadow-soft">
                        <p><?php echo e($berita->kategori->nama); ?></p>
                    </div>
                <?php endif; ?>
                <h1 class="mt-2 text-3xl font-semibold md:text-4xl"><?php echo e($berita->judul); ?></h1>
                <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-white/80">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                        </svg>
                        <?php echo e($berita->penulis); ?>

                    </span>
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v18m10.5-18v18M4.5 7.5h15m-15 9h15" />
                        </svg>
                        <?php echo e(($berita->tanggal_publikasi ?? $berita->created_at)->translatedFormat('d F Y')); ?>

                    </span>
                </div>
            </div>
        </div>

        <div class="space-y-6 p-8 md:p-12">
            <!-- Foto Sampul -->
            <div class="news-image-container flex justify-center" data-image="<?php echo e($berita->image ? Storage::url($berita->image) : 'https://via.placeholder.com/800x600'); ?>" data-alt="<?php echo e($berita->judul); ?>" style="max-width: 600px;">
                <img src="<?php echo e($berita->image ? Storage::url($berita->image) : 'https://via.placeholder.com/800x600'); ?>" alt="<?php echo e($berita->judul); ?>" class="max-w-full h-auto cursor-pointer" style="max-width: 300px; width: auto; height: auto;">
            </div>

            <!-- Isi Berita -->
            <div class="space-y-4 text-sm leading-relaxed text-textDark" style="max-width: 600px;">
                <?php $__currentLoopData = explode("\n", $berita->isi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(trim($paragraph)): ?>
                        <p><?php echo e($paragraph); ?></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-10 flex flex-col gap-6 rounded-3xl border border-primary/20 bg-primary/5 p-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs tracking-wide4 text-primary">Penulis</p>
                    <p class="text-sm font-semibold text-textDark"><?php echo e($berita->penulis); ?></p>
                    <p class="text-xs text-textMuted">Dipublikasikan pada <?php echo e(($berita->tanggal_publikasi ?? $berita->created_at)->translatedFormat('d F Y')); ?></p>
                </div>
                <a href="<?php echo e(route('berita')); ?>" class="inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-xs font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                    </svg>                    
                    Kembali ke Berita
                </a>
            </div>
        </div>
    </article>

    <!-- Image Modal -->
    <div id="newsImageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
        <div class="relative max-w-full max-h-full">
            <button id="closeNewsImageModal" class="absolute -right-2 -top-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-textDark shadow-lg transition hover:bg-gray-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="relative overflow-hidden rounded-lg bg-white shadow-xl">
                <img id="newsModalImage" src="" alt="" class="max-w-full max-h-[90vh] w-auto h-auto object-contain">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsImageContainer = document.querySelector('.news-image-container');
            const modal = document.getElementById('newsImageModal');
            const modalImage = document.getElementById('newsModalImage');
            const closeModal = document.getElementById('closeNewsImageModal');

            if (newsImageContainer) {
                newsImageContainer.addEventListener('click', function() {
                    const imageUrl = this.getAttribute('data-image');
                    const imageAlt = this.getAttribute('data-alt');
                    
                    // Load image first to get natural dimensions
                    const img = new Image();
                    img.onload = function() {
                        modalImage.src = imageUrl;
                        modalImage.alt = imageAlt;
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    };
                    img.src = imageUrl;
                });
            }

            // Close modal functions
            function closeNewsImageModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            closeModal.addEventListener('click', closeNewsImageModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeNewsImageModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeNewsImageModal();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/berita-detail.blade.php ENDPATH**/ ?>