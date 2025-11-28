<?php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
?>

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
    <div class="relative mx-auto max-w-4xl px-6 py-6 text-center md:py-8 lg:py-10">
        <div class="space-y-2 md:space-y-3">
            <h1 class="mx-auto max-w-3xl text-xl font-bold leading-[1.6] tracking-wide text-white md:text-2xl lg:text-3xl">
                <span class="block mb-1.5 md:mb-2">Selamat Datang di Website Resmi</span>
                <span class="block bg-gradient-to-r from-white via-white/95 to-white bg-clip-text text-transparent mb-1.5 md:mb-2">
                    Program Studi Pemuliaan Tanaman dan Teknologi Benih
                </span>
                <span class="block text-lg font-semibold text-white/90 tracking-normal md:text-xl lg:text-2xl">
                    Sekolah Vokasi IPB University
                </span>
            </h1>
        </div>
        <div class="mt-4 flex flex-wrap items-center justify-center gap-3 md:mt-5 md:gap-4">
            <a class="group inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-xs font-semibold text-primary shadow-md transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg md:px-6 md:py-2.5 md:text-sm"
                href="#profil-prodi">
                Kenali Program Studi
            </a>
            <a class="group inline-flex items-center gap-2 rounded-full border-2 border-white/50 bg-white/10 px-5 py-2.5 text-xs font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-white hover:bg-white/20 md:px-6 md:py-2.5 md:text-sm"
                href="<?php echo e(route('berita')); ?>">
                Lihat Berita
            </a>
        </div>
    </div>
</section>

<!--  -->
<section id="profil-prodi" class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-8 md:p-6 lg:p-8">
    <!-- Deskripsi Singkat Prodi -->
    <?php if(isset($profilProdi) && $profilProdi->deskripsi): ?>
    <div class="mb-6 rounded-card border border-primary/15 bg-gradient-to-br from-primary/5 to-primary/10 p-6 md:mb-8 md:p-8">
        <h2 class="text-lg uppercase tracking-wide4 font-semibold text-secondary md:text-xl">Pemuliaan Tanaman dan Teknologi Benih</h2>
        <p class="mt-4 text-sm leading-relaxed text-textMuted whitespace-pre-line md:text-sm">
            <?php echo e($profilProdi->deskripsi); ?>

        </p>
    </div>
    <?php endif; ?>

    <!-- Visi, Misi, dan Tujuan -->
    <div class="space-y-4 md:space-y-5">
        
        <?php if(isset($profilProdi) && $profilProdi->visi): ?>
        <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
            <div class="mb-3 flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Visi</h2>
            </div>
            <p class="text-xs leading-relaxed text-textMuted md:text-sm">
                <?php echo e($profilProdi->visi); ?>

            </p>
        </div>
        <?php endif; ?>

        
        <div class="grid gap-4 md:gap-5 lg:grid-cols-2">
            
            <?php if(isset($profilProdi) && $profilProdi->misi): ?>
            <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Misi</h2>
                </div>
                <ul class="space-y-2.5 text-xs text-textMuted md:text-sm">
                    <?php
                    $misiItems = explode("\n", $profilProdi->misi);
                    $misiItems = array_filter($misiItems, function($item) {
                    return trim($item) !== '';
                    });
                    ?>
                    <?php $__currentLoopData = $misiItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-primary/10 text-[10px] font-semibold text-primary md:h-6 md:w-6 md:text-xs"><?php echo e($index + 1); ?></span>
                        <span class="leading-relaxed"><?php echo e(trim($misi)); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            
            <?php if(isset($profilProdi) && $profilProdi->tujuan): ?>
            <div class="rounded-card border border-primary/15 bg-white/90 p-4 md:p-5">
                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-sm uppercase tracking-wide4 font-semibold text-secondary md:text-base">Tujuan</h2>
                </div>
                <ul class="space-y-2.5 text-xs text-textMuted md:text-sm">
                    <?php
                    $tujuanItems = explode("\n", $profilProdi->tujuan);
                    $tujuanItems = array_filter($tujuanItems, function($item) {
                    return trim($item) !== '';
                    });
                    ?>
                    <?php $__currentLoopData = $tujuanItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tujuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-primary/10 text-[10px] font-semibold text-primary md:h-6 md:w-6 md:text-xs"><?php echo e($index + 1); ?></span>
                        <span class="leading-relaxed"><?php echo e(trim($tujuan)); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</section>


<?php if(isset($profilProdi) && $profilProdi->industri_tempat_bekerja): ?>
<section class="mt-6 rounded-3xl border border-primary/10 bg-white p-4 shadow-soft md:mt-8 md:p-5 lg:p-6">
    <div class="text-center">
        <span class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/80 md:text-xs">Prospek Karier</span>
        <h3 class="mt-1.5 text-lg font-semibold text-textDark md:mt-2 md:text-xl">Arah Karier Unggulan</h3>
    </div>
    <div class="mt-4 grid gap-3 md:mt-6 md:grid-cols-2 md:gap-4">
        <article class="rounded-2xl border border-primary/10 bg-white p-4 md:p-5">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-primary shadow-soft md:h-9 md:w-9 lg:h-10 lg:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 md:h-5 md:w-5 lg:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wide4 text-primary/70 md:text-xs">Industri / Tempat Bekerja</p>
                    <h3 class="text-sm font-semibold text-textDark md:text-base">Jejaring Profesional</h3>
                </div>
            </div>
            <ul class="mt-3 space-y-1.5 text-xs font-semibold text-textDark md:mt-4 md:space-y-2 md:text-xs">
                <?php if(isset($profilProdi) && $profilProdi->industri_tempat_bekerja): ?>
                <?php
                $industriItems = explode("\n", $profilProdi->industri_tempat_bekerja);
                $industriItems = array_filter($industriItems, function($item) {
                return trim($item) !== '';
                });
                ?>
                <?php $__currentLoopData = $industriItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex items-start gap-3">
                    <span class="mt-1 h-2.5 w-2.5 rounded-full bg-primary"></span>
                    <?php echo e(trim($industri)); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </article>
        
        <?php if(isset($profilProdi) && $profilProdi->profilLulusan && $profilProdi->profilLulusan->count() > 0): ?>
        <article class="rounded-2xl border border-secondary/10 bg-white p-4 md:p-5">
            <div class="flex items-center gap-2 md:gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary shadow-soft md:h-9 md:w-9 lg:h-10 lg:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 md:h-5 md:w-5 lg:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary/70 md:text-xs">Profil Lulusan</p>
                    <h3 class="text-sm font-semibold text-textDark md:text-base">Kompetensi dan Peran Lulusan</h3>
                </div>
            </div>
            <div class="mt-3 space-y-1.5 md:mt-4 md:space-y-2">
                <?php $__currentLoopData = $profilProdi->profilLulusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $lulusan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="profil-lulusan-accordion-item overflow-hidden rounded-lg border border-secondary/20 transition-all duration-300 hover:border-secondary/40" data-index="<?php echo e($index); ?>">
                    <button type="button" class="profil-lulusan-toggle flex w-full items-center justify-between gap-2 px-2 py-1.5 text-left transition-colors duration-200 hover:bg-secondary/5 md:px-3 md:py-2">
                        <span class="text-xs font-semibold text-textDark md:text-xs"><?php echo e($lulusan->peran); ?></span>
                        <svg class="profil-lulusan-icon h-3 w-3 flex-shrink-0 text-secondary transition-transform duration-300 md:h-4 md:w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="profil-lulusan-content max-h-0 overflow-hidden transition-all duration-300">
                        <div class="px-2 pb-1.5 md:px-3 md:pb-2">
                            <p class="text-[10px] leading-relaxed text-textMuted md:text-xs"><?php echo e($lulusan->deskripsi_kemampuan); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </article>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- Galeri Carousel -->
<?php if(isset($latestGalleryPhotos) && $latestGalleryPhotos->count() > 0): ?>
<section class="mt-8 rounded-section bg-white p-6 shadow-soft md:mt-6 md:p-8">
    <div class="space-y-4">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div>
                <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Galeri</span>
                <h2 class="mt-1 text-2xl font-semibold text-secondary md:text-3xl">Momen Terbaru</h2>
            </div>
            <a href="<?php echo e(route('galeri')); ?>" class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft">
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
                            <img src="<?php echo e($photo['image']); ?>" alt="<?php echo e($photo['title']); ?>" class="h-full w-full object-cover" loading="<?php echo e($index === 0 ? 'eager' : 'lazy'); ?>">
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
<section class="mt-8 rounded-section bg-white p-6 shadow-soft md:mt-6 md:p-6 lg:p-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Berita Harian</span>
            <h2 class="mt-1 text-2xl font-semibold text-secondary md:text-3xl">Sorotan Terbaru</h2>
        </div>
        <a href="<?php echo e(route('berita')); ?>" class="inline-flex items-center gap-2 rounded-full border border-primary/20 px-4 py-1.5 text-xs font-semibold text-primary transition hover:border-primary hover:shadow-soft">
            Jelajahi semua berita
            <span aria-hidden="true">></span>
        </a>
    </div>

    <div class="mt-4 space-y-2.5">
        <?php if(isset($latestNews) && $latestNews->count() > 0): ?>
        <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('berita.detail', $item->slug)); ?>" class="group block">
            <article class="flex flex-col overflow-hidden rounded-card border border-primary/10 bg-white shadow-soft transition hover:-translate-y-0.5 hover:border-primary/30 hover:shadow-card md:flex-row">
                <div class="relative h-24 w-full flex-shrink-0 md:h-32 md:w-28">
                    <img src="<?php echo e($item->image ? Storage::url($item->image) : 'https://via.placeholder.com/800x600'); ?>" alt="<?php echo e($item->judul); ?>" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy">
                    <div class="absolute right-1 top-1 rounded-full bg-white/90 px-1.5 py-0.5 text-[8px] font-semibold text-primaryDark shadow-soft">
                        <?php echo e(($item->kategori) ? $item->kategori->nama : 'Umum'); ?>

                    </div>
                </div>
                <div class="flex flex-1 flex-col justify-between space-y-2 p-3">
                    <div>
                        <h3 class="text-sm font-semibold text-textDark group-hover:text-primary line-clamp-1 md:text-base"><?php echo e($item->judul); ?></h3>
                        <p class="mt-1 text-xs text-textMuted line-clamp-2 md:text-sm md:line-clamp-3"><?php echo e(Str::limit(strip_tags($item->isi), 200)); ?></p>
                    </div>
                    <div class="flex items-center justify-between text-[10px] font-semibold text-textMuted/80 md:text-xs">
                        <span class="flex items-center gap-1 text-textMuted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c1.656 0 3-1.12 3-2.5S13.656 6 12 6s-3 1.12-3 2.5S10.344 11 12 11zm0 0c-3 0-6 1.567-6 3.5V18h12v-3.5c0-1.933-3-3.5-6-3.5z" />
                            </svg>
                            <?php echo e($item->penulis); ?>

                        </span>
                        <span class="text-primaryDark"><?php echo e(($item->tanggal_publikasi ?? $item->created_at)->translatedFormat('d M Y')); ?></span>
                    </div>
                </div>
            </article>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <p class="text-center text-sm text-textMuted py-8">Tidak ada berita tersedia.</p>
        <?php endif; ?>
    </div>
</section>


<?php if(isset($mitra) && $mitra->count() > 0): ?>
<section class="mt-6 rounded-section bg-white p-4 shadow-soft md:mt-6 md:p-5 lg:p-6">
    <div class="text-center">
        <span class="text-[10px] font-semibold uppercase tracking-wide4 text-secondary md:text-xs">Mitra Prodi PTB</span>
    </div>
    <div class="mt-4 overflow-hidden">
        <div class="mitra-scroll-container flex gap-2 md:gap-3">
            <?php
                $mitraWithLogo = $mitra->filter(function($item) {
                    return $item->logo;
                });
            ?>
            <?php $__currentLoopData = $mitraWithLogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mitra-item flex min-w-[80px] items-center justify-center overflow-hidden rounded-lg bg-white p-2 transition hover:border-primary/20 hover:shadow-soft md:min-w-[100px] md:p-2.5">
                <img src="<?php echo e(Storage::url($item->logo)); ?>" alt="404 not found" class="h-auto max-h-8 w-full object-contain md:max-h-10">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php $__currentLoopData = $mitraWithLogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mitra-item flex min-w-[80px] items-center justify-center overflow-hidden rounded-lg bg-white p-2 transition hover:border-primary/20 hover:shadow-soft md:min-w-[100px] md:p-2.5">
                <img src="<?php echo e(Storage::url($item->logo)); ?>" alt="404 not found" class="h-auto max-h-8 w-full object-contain md:max-h-10">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

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


<?php if(isset($profilProdi) && $profilProdi->profilLulusan && $profilProdi->profilLulusan->count() > 0): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.profil-lulusan-toggle');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const item = this.closest('.profil-lulusan-accordion-item');
                const content = item.querySelector('.profil-lulusan-content');
                const icon = item.querySelector('.profil-lulusan-icon');
                
                // Toggle active class
                const isActive = item.classList.contains('active');
                
                // Close all items
                document.querySelectorAll('.profil-lulusan-accordion-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherContent = otherItem.querySelector('.profil-lulusan-content');
                        const otherIcon = otherItem.querySelector('.profil-lulusan-icon');
                        otherContent.style.maxHeight = '0';
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });
                
                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    content.style.maxHeight = '0';
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    item.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    });
</script>
<?php endif; ?>


<style>
    html {
        scroll-behavior: smooth;
    }
</style>


<?php if(isset($mitra) && $mitra->count() > 0): ?>
<style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .mitra-scroll-container {
        animation: scroll 30s linear infinite;
    }

    .mitra-scroll-container:hover {
        animation-play-state: paused;
    }
</style>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-pengunjung/beranda.blade.php ENDPATH**/ ?>