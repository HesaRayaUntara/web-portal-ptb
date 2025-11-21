<?php
    use Illuminate\Support\Facades\Storage;
?>

<?php $__env->startSection('title', 'Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb -->
    <nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
        <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
        <span> > </span>
        <a href="<?php echo e(route('galeri')); ?>" class="transition hover:text-primary text-primaryDark">Galeri</a>
    </nav>

    <section
        class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
        style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80');">
        <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Galeri</span>
            <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Galeri Kegiatan</h1>
            <p class="max-w-2xl text-base text-white/85 md:text-lg">Dokumentasi kegiatan, riset lapang, dan karya mahasiswa yang menggambarkan dinamika pembelajaran di PTB.</p>
        </div>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Sorotan</span>
                <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Momen Terbaik</h2>
            </div>
            <?php if(isset($categories) && count($categories) > 0): ?>
            <div class="relative">
                <div class="group inline-flex w-full items-center justify-end md:justify-start">
                    <button type="button"
                        class="flex w-full items-center justify-center gap-2 rounded-badge border border-primary/15 bg-white px-4 py-2 text-sm font-medium text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40 md:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span id="selected-category"><?php echo e(request('kategori') ?: 'Semua Kategori'); ?></span>
                        <span class="text-xs" aria-hidden="true">&#x25BE;</span>
                    </button>
                    <div class="absolute right-0 top-full z-50 mt-2 hidden min-w-[180px] flex-col rounded-badge border border-primary/10 bg-white text-sm text-textDark shadow-soft transition group-hover:flex group-focus-within:flex">
                        <a href="<?php echo e(route('galeri')); ?>"
                           class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e(!request('kategori') ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                            <span>Semua Kategori</span>
                        </a>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('galeri', ['kategori' => $category])); ?>"
                               class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e(request('kategori') === $category ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                                <span><?php echo e($category); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="mt-8 grid grid-cols-2 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $displayImage = $item->foto ? Storage::url($item->foto) : '';
                    if ($item->tipe === 'video' && $item->youtube_url) {
                        $videoId = null;
                        if (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/embed\/)([^\s&]+)/', $item->youtube_url, $matches)) {
                            $videoId = $matches[1];
                        } elseif (preg_match('/youtu\.be\/([^\s?&]+)/', $item->youtube_url, $matches)) {
                            $videoId = $matches[1];
                        }
                        if ($videoId) {
                            $displayImage = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
                        }
                    }
                ?>
                <article class="gallery-item group relative overflow-hidden rounded-card cursor-pointer" 
                         data-type="<?php echo e($item->tipe); ?>"
                         data-image="<?php echo e($displayImage); ?>"
                         data-title="<?php echo e($item->judul); ?>"
                         data-desc="<?php echo e($item->deskripsi); ?>"
                         <?php if($item->youtube_url): ?> data-youtube-url="<?php echo e($item->youtube_url); ?>" <?php endif; ?>>
                    <div class="relative overflow-hidden aspect-video">
                        <img src="<?php echo e($displayImage); ?>" alt="<?php echo e($item->judul); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                        <div class="absolute top-1.5 left-1.5 flex gap-1 md:top-3 md:left-3 md:gap-2">
                            <span class="rounded-full bg-white/90 px-1.5 py-0.5 text-[9px] font-semibold text-primary shadow-soft md:px-3 md:py-1 md:text-xs">
                                <?php echo e($item->kategori ? $item->kategori->nama : 'Umum'); ?>

                            </span>
                            <?php if($item->tipe === 'video'): ?>
                                <span class="flex items-center justify-center rounded-full bg-primary/90 px-1 py-0.5 text-white shadow-soft md:px-2.5 md:py-1">
                                    <svg class="h-2 w-2 md:h-3.5 md:w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                    </svg>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent p-1.5 text-white md:p-3">
                            <h3 class="text-[10px] font-semibold leading-tight line-clamp-1 md:text-base">
                                <?php echo e($item->judul); ?>

                            </h3>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <?php if($item->tipe === 'video'): ?>
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-lg">
                                    <svg class="ml-1 h-8 w-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                    </svg>
                                </div>
                            <?php else: ?>
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-lg">
                                    <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($gallery->hasPages()): ?>
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center gap-2 rounded-full border border-primary/10 bg-white px-5 py-2 text-sm shadow-soft">
                    <?php $__currentLoopData = range(1, $gallery->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a
                            href="<?php echo e($gallery->url($page)); ?>"
                            class="min-w-[36px] rounded-full px-3 py-1 text-center font-semibold transition
                                <?php echo e($page == $gallery->currentPage() ? 'bg-primary text-white shadow-card' : 'text-textMuted hover:bg-primary/10 hover:text-primary'); ?>">
                            <?php echo e($page); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </div>
        <?php endif; ?>
    </section>

    <section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-secondary md:text-4xl">Galeri Virtual</h2>
            <p class="text-sm leading-relaxed text-textMuted md:text-base">
                Jelajahi lebih banyak dokumentasi kegiatan melalui kanal digital kami. Gunakan pencarian untuk menemukan kegiatan spesifik, lokasi riset, atau kolaborasi dengan mitra industri.
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center gap-2 rounded-badge bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-primaryDark"
                   href="https://maps.app.goo.gl/eNiDgAiGJYbsjy346" target="_blank">Kunjungi Galeri 360°</a>
                <a class="inline-flex items-center gap-2 rounded-badge border border-primary/20 px-6 py-3 text-sm font-semibold text-primary transition hover:-translate-y-0.5 hover:border-primary"
                   href="#">Unduh Katalog</a>
            </div>
        </div>
    </section>

    <!-- Media Modal -->
    <div id="mediaModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
        <div class="relative max-w-full max-h-full">
            <button id="closeModal" class="absolute -right-2 -top-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-textDark shadow-lg transition hover:bg-gray-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <!-- Video Container -->
            <div id="videoContainer" class="relative w-full bg-black hidden" style="padding-bottom: 56.25%; min-width: 640px;">
                <iframe id="modalVideo" class="absolute inset-0 h-full w-full" src="" title="Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <!-- Title and Description for Video -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                    <h3 id="modalTitle" class="text-sm font-bold md:text-base"></h3>
                    <p id="modalDesc" class="mt-1 text-xs text-white/80 md:text-sm"></p>
                </div>
            </div>
            <!-- Image Container -->
            <div id="imageContainer" class="relative hidden">
                <img id="modalImage" src="" alt="" class="max-w-full max-h-[90vh] w-auto h-auto object-contain">
                <!-- Title and Description for Image -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/70 to-transparent p-4 text-white">
                    <h3 id="modalTitleImage" class="text-xs font-bold md:text-sm"></h3>
                    <p id="modalDescImage" class="mt-1 text-[10px] text-white/90 md:text-xs"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.getElementById('mediaModal');
            const modalImage = document.getElementById('modalImage');
            const modalVideo = document.getElementById('modalVideo');
            const modalTitle = document.getElementById('modalTitle');
            const modalDesc = document.getElementById('modalDesc');
            const closeModal = document.getElementById('closeModal');

            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function showImage({ image, title, desc }) {
                // Hide video container
                const videoContainer = document.getElementById('videoContainer');
                const imageContainer = document.getElementById('imageContainer');
                const modalTitleImage = document.getElementById('modalTitleImage');
                const modalDescImage = document.getElementById('modalDescImage');
                
                videoContainer.classList.add('hidden');
                modalVideo.src = '';
                
                // Show image container
                imageContainer.classList.remove('hidden');
                
                // Load image first to get natural dimensions
                const img = new Image();
                img.onload = function() {
                    modalImage.src = image;
                    modalImage.alt = title;
                    modalTitleImage.textContent = title;
                    modalDescImage.textContent = desc;
                    openModal();
                };
                img.src = image;
            }

            function getYoutubeEmbedUrl(url) {
                if (!url) return null;
                const standardMatch = url.match(/(?:youtube\.com\/watch\?v=|youtube\.com\/embed\/)([^\s&]+)/);
                const shortMatch = url.match(/youtu\.be\/([^\s?&]+)/);
                const videoId = standardMatch ? standardMatch[1] : (shortMatch ? shortMatch[1] : null);
                return videoId ? `https://www.youtube.com/embed/${videoId}` : null;
            }

            function showVideo({ youtubeUrl, title, desc }) {
                const embedUrl = getYoutubeEmbedUrl(youtubeUrl);
                if (!embedUrl) {
                    window.open(youtubeUrl, '_blank');
                    return;
                }
                
                // Hide image container
                const videoContainer = document.getElementById('videoContainer');
                const imageContainer = document.getElementById('imageContainer');
                
                imageContainer.classList.add('hidden');
                modalImage.src = '';
                
                // Show video container
                videoContainer.classList.remove('hidden');
                modalVideo.src = `${embedUrl}?autoplay=1&rel=0`;
                
                modalTitle.textContent = title;
                modalDesc.textContent = desc;
                openModal();
            }

            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    const image = this.getAttribute('data-image');
                    const title = this.getAttribute('data-title');
                    const desc = this.getAttribute('data-desc');
                    const youtubeUrl = this.getAttribute('data-youtube-url');

                    if (type === 'video' && youtubeUrl) {
                        showVideo({ youtubeUrl, title, desc });
                    } else if (type === 'photo') {
                        showImage({ image, title, desc });
                    }
                });
            });

            // Close modal functions
            function closeImageModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
                
                // Reset image
                modalImage.src = '';
                const imageContainer = document.getElementById('imageContainer');
                imageContainer.classList.add('hidden');
                
                // Reset video
                modalVideo.src = '';
                const videoContainer = document.getElementById('videoContainer');
                videoContainer.classList.add('hidden');
            }

            closeModal.addEventListener('click', closeImageModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeImageModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeImageModal();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/galeri.blade.php ENDPATH**/ ?>