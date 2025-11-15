<?php
    $locale = app()->getLocale();
    $flags = ['id' => '🇮🇩', 'en' => '🇺🇸'];
?>

<div class="mx-auto flex w-full max-w-content flex-col gap-6 px-6 py-5 md:flex-row md:items-center md:justify-between md:py-6 lg:px-12">
    <div class="flex items-center gap-4">
        <a href="/" class="relative inline-flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-primary shadow-soft">
            <img src="<?php echo e(asset('gambar/logo-ptb.jpg')); ?>" alt="Logo PTB" class="h-full w-full object-cover">
        </a>
        <div class="space-y-1">
            <span class="block text-lg font-semibold text-textDark">Program Studi PTB</span>
            <span class="block text-sm font-medium text-textMuted">Pemuliaan Tanaman dan Teknologi Benih</span>
        </div>
    </div>

    <nav class="w-full md:w-auto">
        <ul class="flex flex-wrap gap-x-6 gap-y-3 text-15 font-medium text-textDark/90">
            <li>
                <a href="<?php echo e(route('beranda')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('beranda') ? 'text-primary font-semibold' : ''); ?>">Beranda</a>
            </li>
            <li>
                <a href="<?php echo e(route('profil')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('profil') ? 'text-primary font-semibold' : ''); ?>">Profil Prodi</a>
            </li>
            <li>
                <a href="<?php echo e(route('kurikulum')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('kurikulum') ? 'text-primary font-semibold' : ''); ?>">Kurikulum</a>
            </li>
            <li>
                <a href="<?php echo e(route('dosen')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('dosen') ? 'text-primary font-semibold' : ''); ?>">Dosen</a>
            </li>
            <li>
                <a href="<?php echo e(route('berita')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('berita') ? 'text-primary font-semibold' : ''); ?>">Berita</a>
            </li>
            <li>
                <a href="<?php echo e(route('galeri')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('galeri') ? 'text-primary font-semibold' : ''); ?>">Galeri</a>
            </li>
            <!-- <li>
                <a href="<?php echo e(route('kontak')); ?>" class="transition-colors hover:text-primary <?php echo e(request()->routeIs('kontak') ? 'text-primary font-semibold' : ''); ?>">Kontak</a>
            </li> -->
        </ul>
    </nav>

    <div class="relative w-full md:w-auto">
        <div class="group inline-flex w-full items-center justify-end md:justify-start">
            <button type="button"
                class="flex w-full items-center justify-center gap-2 rounded-badge border border-primary/15 bg-white px-4 py-2 text-sm font-medium text-textDark shadow-soft transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/40 md:w-auto">
                <span class="text-base" aria-hidden="true"><?php echo e($flags[$locale] ?? '🌐'); ?></span>
                <span class="font-semibold"><?php echo e(strtoupper($locale)); ?></span>
                <span class="text-xs" aria-hidden="true">&#x25BE;</span>
            </button>
            <div class="absolute right-0 top-full z-50 mt-2 hidden min-w-[140px] flex-col rounded-badge border border-primary/10 bg-white text-sm text-textDark shadow-soft transition group-hover:flex group-focus-within:flex">
                <a href="<?php echo e(route('lang.switch', 'id')); ?>"
                   class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e($locale === 'id' ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                    <span class="text-base"><?php echo e($flags['id']); ?></span>
                    <span>Indonesia</span>
                </a>
                <a href="<?php echo e(route('lang.switch', 'en')); ?>"
                   class="flex items-center gap-3 rounded-badge px-4 py-2 transition hover:bg-primary/10 hover:text-primary <?php echo e($locale === 'en' ? 'bg-primary/10 text-primary font-semibold' : ''); ?>">
                    <span class="text-base"><?php echo e($flags['en']); ?></span>
                    <span>English</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/partials/navbar.blade.php ENDPATH**/ ?>