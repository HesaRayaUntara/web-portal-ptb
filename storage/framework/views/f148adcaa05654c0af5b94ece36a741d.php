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
            <?php
                $currentRoute = Route::currentRouteName();
                $isActive = function($route) use ($currentRoute) {
                    if ($route === 'admin.dashboard') {
                        return $currentRoute === 'admin.dashboard';
                    }
                    if ($route === 'admin.profil.index') {
                        return str_starts_with($currentRoute, 'admin.profil');
                    }
                    if ($route === 'admin.fasilitas.index') {
                        return str_starts_with($currentRoute, 'admin.fasilitas');
                    }
                    if ($route === 'admin.kurikulum.index') {
                        return str_starts_with($currentRoute, 'admin.kurikulum');
                    }
                    if ($route === 'admin.dosen.index') {
                        return str_starts_with($currentRoute, 'admin.dosen') || 
                               str_starts_with($currentRoute, 'admin.penelitian') ||
                               str_starts_with($currentRoute, 'admin.pengabdian') ||
                               str_starts_with($currentRoute, 'admin.publikasi') ||
                               str_starts_with($currentRoute, 'admin.hki');
                    }
                    if ($route === 'admin.berita.index') {
                        return str_starts_with($currentRoute, 'admin.berita');
                    }
                    if ($route === 'admin.galeri.index') {
                        return str_starts_with($currentRoute, 'admin.galeri');
                    }
                    return false;
                };
            ?>
            
            <a href="<?php echo e(route('admin.dashboard')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.dashboard') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Dasbor
            </a>
            <a href="<?php echo e(route('admin.profil.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.profil.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Profil Program Studi
            </a>
            <a href="<?php echo e(route('admin.fasilitas.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.fasilitas.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Fasilitas
            </a>
            <a href="<?php echo e(route('admin.kurikulum.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.kurikulum.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Kurikulum
            </a>
            <a href="<?php echo e(route('admin.dosen.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.dosen.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Profil Dosen
            </a>
            <a href="<?php echo e(route('admin.berita.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.berita.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Berita
            </a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" 
               class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e($isActive('admin.galeri.index') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">
                Galeri
            </a>
        </nav>
        <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl border border-primary/20 bg-white px-4 py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white">
                <span>Keluar Admin</span>
                <span aria-hidden="true">↘</span>
            </button>
        </form>
    </div>
</aside>

<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/partials/admin-sidebar.blade.php ENDPATH**/ ?>