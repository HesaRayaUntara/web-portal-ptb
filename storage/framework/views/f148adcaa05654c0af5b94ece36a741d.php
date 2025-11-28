
<button type="button" id="admin-sidebar-toggle" class="fixed left-4 top-4 z-50 flex items-center justify-center rounded-lg border border-primary/20 bg-white p-2.5 text-primary shadow-lg transition hover:bg-primary/5 lg:hidden" aria-label="Toggle sidebar">
    <svg id="admin-menu-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
    <svg id="admin-close-icon" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
</button>


<div id="admin-sidebar-overlay" class="fixed inset-0 z-40 hidden bg-black/50 transition-opacity lg:hidden"></div>


<aside id="admin-sidebar" class="fixed left-0 top-0 z-40 h-full w-80 -translate-x-full transform border-r border-borderSoft bg-[#F4F7F3] p-6 transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 lg:transform-none lg:flex lg:flex-col">
    <div class="flex h-full flex-col gap-6 lg:h-full">
        <div class="flex items-center gap-3 rounded-card bg-white px-4 py-3 shadow-soft mt-12 lg:mt-0">
            <img src="<?php echo e(asset('gambar/logo-ptb.png')); ?>" alt="Logo PTB" class="h-12 w-12 rounded-full border border-primary/30 object-cover">
            <div>
                <p class="text-sm font-semibold text-textDark">Admin Web Portal PTB</p>
                <p class="text-xs text-textMuted">Hai, <?php echo e(\App\Models\Admin::find(session('admin_id'))->username ?? 'Admin'); ?>!</p>
            </div>
        </div>
        <nav class="space-y-1 text-sm font-semibold text-textMuted">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Dashboard</a>
            <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.profil.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Profil Program Studi</a>
            <a href="<?php echo e(route('admin.fasilitas.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.fasilitas.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Fasilitas</a>
            <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.kurikulum.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Kurikulum</a>
            <a href="<?php echo e(route('admin.dosen.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.dosen.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Profil Dosen</a>
            <a href="<?php echo e(route('admin.staf.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.staf.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Staf</a>
            <a href="<?php echo e(route('admin.berita.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.berita.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Berita</a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="block w-full rounded-xl py-3 text-left px-4 shadow-soft transition <?php echo e(request()->routeIs('admin.galeri.*') ? 'bg-primary text-white' : 'bg-white hover:bg-primary/5'); ?>">Galeri</a><br>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="mt-4 lg:mt-auto">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="block w-full rounded-xl border bg-red-600 py-3 text-center px-4 text-sm font-semibold text-white shadow-soft transition hover:bg-red-700 hover:text-white">
                    Keluar Admin
                </button>
            </form>
        </nav>
    </div>
</aside>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Admin Sidebar Toggle (Mobile)
        const sidebarToggle = document.getElementById('admin-sidebar-toggle');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('admin-sidebar-overlay');
        const menuIcon = document.getElementById('admin-menu-icon');
        const closeIcon = document.getElementById('admin-close-icon');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (sidebarToggle && sidebar && overlay) {
            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });

            // Close sidebar when clicking overlay
            overlay.addEventListener('click', function() {
                closeSidebar();
            });

            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                    closeSidebar();
                }
            });
        }

        // Set sidebar height to match content in desktop mode
        function setSidebarHeight() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('admin-sidebar');
                if (sidebar) {
                    const flexContainer = sidebar.closest('.flex.flex-col.gap-8');
                    if (flexContainer) {
                        const mainContent = flexContainer.querySelector('main');
                        if (mainContent) {
                            // Get the actual height of main content
                            const mainHeight = mainContent.scrollHeight;
                            const flexContainerHeight = flexContainer.scrollHeight;
                            // Use the larger of the two to ensure sidebar stretches
                            const targetHeight = Math.max(mainHeight, flexContainerHeight);
                            sidebar.style.height = targetHeight + 'px';
                        }
                    }
                }
            } else {
                const sidebar = document.getElementById('admin-sidebar');
                if (sidebar) {
                    sidebar.style.height = '';
                }
            }
        }

        // Set height on load and resize
        if (window.innerWidth >= 1024) {
            setSidebarHeight();
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    setSidebarHeight();
                } else {
                    const sidebar = document.getElementById('admin-sidebar');
                    if (sidebar) {
                        sidebar.style.height = '';
                    }
                }
            });
            
            // Also set height after delays to ensure content is loaded
            setTimeout(setSidebarHeight, 100);
            setTimeout(setSidebarHeight, 500);
            setTimeout(setSidebarHeight, 1000);
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/partials/admin-sidebar.blade.php ENDPATH**/ ?>