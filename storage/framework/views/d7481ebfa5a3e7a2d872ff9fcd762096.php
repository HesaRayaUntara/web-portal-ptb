
<div id="admin-sidebar-overlay" class="fixed inset-0 z-40 hidden bg-black/50 transition-opacity lg:hidden"></div>


<aside id="admin-sidebar" class="fixed left-0 top-0 z-40 h-full w-80 -translate-x-full transform border-r border-borderSoft bg-[#F4F7F3] p-6 transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 lg:transform-none">
    <div class="flex flex-col gap-6">
        <div class="flex items-center gap-3 rounded-card bg-white px-4 py-3 shadow-soft">
            <img src="<?php echo e(asset('gambar/logo-ptb.png')); ?>" alt="Logo PTB" class="h-12 w-12 rounded-full border border-primary/30 object-cover">
            <div>
                <p class="text-sm font-semibold text-textDark">Pemuliaan Tanaman</p>
                <p class="text-xs text-textMuted">dan Teknologi Benih</p>
            </div>
        </div>
        <nav class="space-y-1 text-sm font-semibold text-textMuted">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Dasbor</a>
            <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.profil.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Profil Program Studi</a>
            <a href="<?php echo e(route('admin.fasilitas.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.fasilitas.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Fasilitas</a>
            <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.kurikulum.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Kurikulum</a>
            <a href="<?php echo e(route('admin.staf.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.staf.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Staf</a>
            <a href="<?php echo e(route('admin.dosen.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.dosen.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Profil Dosen</a>
            <a href="<?php echo e(route('admin.berita.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.berita.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Berita</a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.galeri.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Galeri</a>
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

<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/partials/admin-sidebar-content.blade.php ENDPATH**/ ?>