<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>

<!-- Breadcrumb -->
<nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
    <a href="/" class="transition hover:text-primary text-primaryDark">Beranda</a>
</nav>

<!-- Hero Section -->
<section
    class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
    style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1518976024611-28bf4b48222e?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-6 p-10 md:p-12 lg:p-16">
        <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Selamat Datang Di Portal Web PTB</h1>
        <p class="max-w-2xl text-base text-white/85 md:text-lg">
            Mengembangkan pendidikan pertanian terapan yang inovatif, berkelanjutan, dan berdampak bagi masyarakat luas dan Indonesia.
        </p>
        <div class="flex flex-wrap gap-4">
            <a class="inline-flex items-center gap-2 rounded-badge bg-white px-6 py-3 text-sm font-semibold text-primary shadow-soft transition hover:-translate-y-0.5 hover:shadow-card"
                href="<?php echo e(route('profil')); ?>">Kenali Program Studi</a>
            <a class="inline-flex items-center gap-2 rounded-badge border border-white/40 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:border-white"
                href="<?php echo e(route('berita')); ?>">Lihat Berita</a>
        </div>
    </div>
</section>

<!-- Profil Program Studi -->
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-16 md:p-10 lg:p-12">
    <div class="grid gap-8 md:grid-cols-2 md:items-center lg:gap-10">
        <div class="space-y-6">
            <div>
                <span class="inline-block rounded-full bg-primary/15 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-primary">Program Studi PTB</span>
                <h2 class="mt-4 text-3xl font-semibold text-secondary md:text-4xl">Pemuliaan Tanaman dan Teknologi Benih</h2>
            </div>
            <p class="text-sm leading-relaxed text-textMuted md:text-base">
                Program Studi PTB mempersiapkan lulusan yang mampu merancang, mengaplikasikan, dan mengevaluasi teknologi pertanian
                berkelanjutan melalui pembelajaran berbasis proyek, kerja lapang, dan kolaborasi lintas disiplin.
            </p>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted shadow-soft">
                    <span class="block text-base font-semibold text-textDark">8 Semester</span>
                    Lama studi reguler
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted shadow-soft">
                    <span class="block text-base font-semibold text-textDark">Profesional</span>
                    Magang industri &amp; komunitas
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted shadow-soft">
                    <span class="block text-base font-semibold text-textDark">Global</span>
                    Program pertukaran dan riset kolaboratif
                </div>
                <div class="rounded-badge border border-primary/15 bg-accent p-5 text-sm text-textMuted shadow-soft">
                    <span class="block text-base font-semibold text-textDark">Terapan</span>
                    Kolaborasi lintas disiplin berbasis inovasi
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-card shadow-soft aspect-square">
            <img src="https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80" alt="Mahasiswa PTB" class="h-full w-full object-cover">
        </div>
    </div>
</section>

<!--  -->
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="grid gap-8 lg:grid-cols-2">
        
        <div class="rounded-card border border-primary/15 bg-white/90 p-8">
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Visi</span>
            <h2 class="mt-3 text-3xl font-semibold text-secondary md:text-4xl">Menjadi Prodi Unggulan</h2>
            <p class="mt-4 text-sm leading-relaxed text-textMuted md:text-base">
                Mewujudkan program studi yang inovatif, berdaya saing global, dan memberikan dampak nyata bagi kemajuan
                agroindustri berkelanjutan melalui kolaborasi riset, teknologi, serta pemberdayaan masyarakat.
            </p>
        </div>

        
        <div class="rounded-card border border-primary/15 bg-white/90 p-8">
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Misi</span>
            <h2 class="mt-3 text-3xl font-semibold text-secondary md:text-4xl">Langkah Strategis</h2>
            <ul class="mt-6 space-y-4 text-sm text-textMuted md:text-base">
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary/10 text-sm font-semibold text-primary">1</span>
                    Mengembangkan kurikulum adaptif berbasis teknologi dan kebutuhan industri.
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary/10 text-sm font-semibold text-primary">2</span>
                    Mendorong riset terapan yang menghasilkan solusi inovatif bagi sektor pertanian dan pangan.
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-primary/10 text-sm font-semibold text-primary">3</span>
                    Menjalin kemitraan strategis dengan industri, pemerintah, dan komunitas global.
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Galeri Carousel -->
<?php if(isset($latestGalleryPhotos) && $latestGalleryPhotos->count() > 0): ?>
<section class="mt-8 rounded-section bg-white p-6 shadow-soft md:mt-6 md:p-8">
    <div class="space-y-4">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Galeri</span>
                <h2 class="mt-1 text-2xl font-semibold text-secondary md:text-3xl">Momen Terbaru</h2>
            </div>
            <a href="<?php echo e(route('galeri')); ?>" class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-5 py-2 text-sm font-semibold text-primary transition hover:border-primary hover:shadow-soft">
                Lihat semua galeri
                <span aria-hidden="true">></span>
            </a>
        </div>

        <!-- Carousel Container -->
        <div class="relative mt-4">
            <div class="gallery-carousel overflow-hidden rounded-card">
                <div class="carousel-track flex transition-transform duration-500 ease-in-out" id="carouselTrack">
                    <?php $__currentLoopData = $latestGalleryPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-slide min-w-full flex-shrink-0" data-index="<?php echo e($index); ?>">
                        <div class="relative h-48 md:h-64 overflow-hidden rounded-card">
                            <img src="<?php echo e($photo['image']); ?>" alt="<?php echo e($photo['title']); ?>" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4 text-white">
                                <span class="inline-block rounded-full bg-white/20 px-2 py-0.5 text-xs font-semibold text-white mb-1.5">
                                    <?php echo e($photo['category']); ?>

                                </span>
                                <h3 class="text-lg md:text-xl font-bold mb-1"><?php echo e($photo['title']); ?></h3>
                                <p class="text-xs text-white/90 line-clamp-2"><?php echo e($photo['desc']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Navigation Buttons -->
                <?php if($latestGalleryPhotos->count() > 1): ?>
                <button class="carousel-btn carousel-prev absolute left-2 top-1/2 -translate-y-1/2 z-10 flex h-8 w-8 md:h-10 md:w-10 items-center justify-center rounded-full bg-white/90 text-primary shadow-lg transition hover:bg-white hover:scale-110" aria-label="Previous slide">
                    <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="carousel-btn carousel-next absolute right-2 top-1/2 -translate-y-1/2 z-10 flex h-8 w-8 md:h-10 md:w-10 items-center justify-center rounded-full bg-white/90 text-primary shadow-lg transition hover:bg-white hover:scale-110" aria-label="Next slide">
                    <svg class="h-4 w-4 md:h-5 md:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Indicators -->
                <div class="absolute bottom-2 md:bottom-3 left-1/2 -translate-x-1/2 z-10 flex gap-1.5">
                    <?php $__currentLoopData = $latestGalleryPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="carousel-indicator h-1.5 rounded-full transition-all <?php echo e($index === 0 ? 'w-5 md:w-6 bg-white' : 'w-1.5 bg-white/50'); ?>" data-index="<?php echo e($index); ?>" aria-label="Go to slide <?php echo e($index + 1); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Berita Harian -->
<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Berita Harian</span>
            <h2 class="mt-2 text-3xl font-semibold text-secondary">Sorotan Terbaru</h2>
        </div>
        <a href="<?php echo e(route('berita')); ?>" class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-5 py-2 text-sm font-semibold text-primary transition hover:border-primary hover:shadow-soft">
            Jelajahi semua berita
            <span aria-hidden="true">></span>
        </a>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-3 lg:grid-cols-3">
        <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <img src="https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80" alt="Kegiatan berkebun" class="h-44 w-full object-cover">
            <div class="space-y-3 p-6">
                <h3 class="text-lg font-semibold text-textDark">Gardening With Us</h3>
                <p class="text-sm text-textMuted">Mahasiswa berkolaborasi dengan mitra desa untuk membangun kebun hidroponik komunitas.</p>
            </div>
        </article>

        <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=800&q=80" alt="Penelitian PTB" class="h-44 w-full object-cover">
            <div class="space-y-3 p-6">
                <h3 class="text-lg font-semibold text-textDark">Riset Teknologi Pangan</h3>
                <p class="text-sm text-textMuted">Pengembangan produk pangan fungsional rendah emisi berhasil meraih pendanaan inkubasi.</p>
            </div>
        </article>

        <article class="overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-1 hover:shadow-card">
            <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Pelatihan Petani" class="h-44 w-full object-cover">
            <div class="space-y-3 p-6">
                <h3 class="text-lg font-semibold text-textDark">Pelatihan Petani Mitra</h3>
                <p class="text-sm text-textMuted">Workshop digital farming untuk petani mitra menghasilkan peningkatan produktivitas 25%.</p>
            </div>
        </article>
    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<?php if(isset($latestGalleryPhotos) && $latestGalleryPhotos->count() > 1): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carouselTrack');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const indicators = document.querySelectorAll('.carousel-indicator');
    
    if (!track || slides.length === 0) return;
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    
    function updateCarousel() {
        const translateX = -currentIndex * 100;
        track.style.transform = `translateX(${translateX}%)`;
        
        // Update indicators
        indicators.forEach((indicator, index) => {
            if (index === currentIndex) {
                indicator.classList.remove('w-1.5', 'bg-white/50');
                indicator.classList.add('w-5', 'md:w-6', 'bg-white');
            } else {
                indicator.classList.remove('w-5', 'md:w-6', 'bg-white');
                indicator.classList.add('w-1.5', 'bg-white/50');
            }
        });
    }
    
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }
    
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }
    
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }
    
    // Event listeners
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }
    
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });
    
    // Auto-play (optional - uncomment if desired)
    // let autoPlayInterval = setInterval(nextSlide, 5000);
    // 
    // track.addEventListener('mouseenter', () => {
    //     clearInterval(autoPlayInterval);
    // });
    // 
    // track.addEventListener('mouseleave', () => {
    //     autoPlayInterval = setInterval(nextSlide, 5000);
    // });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
    
    // Touch/swipe support for mobile
    let startX = 0;
    let isDragging = false;
    
    track.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
    });
    
    track.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
    });
    
    track.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        isDragging = false;
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    });
});
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/beranda.blade.php ENDPATH**/ ?>