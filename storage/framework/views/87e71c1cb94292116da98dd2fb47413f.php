<?php $__env->startSection('title', 'Admin Dashboard'); ?>

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
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Dasbor</a>
                    <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                    <a href="<?php echo e(route('admin.fasilitas.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Fasilitas</a>
                    <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <a href="<?php echo e(route('admin.staf.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Staf</a>
                    <a href="<?php echo e(route('admin.dosen.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</a>
                    <a href="<?php echo e(route('admin.berita.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</a>
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

            <div class="flex-1 space-y-8 p-6 lg:p-10">
                <header class="flex flex-wrap items-center justify-between gap-4 rounded-card bg-gradient-to-r from-primary to-primaryDark px-6 py-4 text-white shadow-soft">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-white/80">Dasbor</p>
                        <h1 class="text-2xl font-semibold">Aktivitas Admin</h1>
                    </div>
                <div class="flex items-center gap-3 text-sm font-semibold">
                    <span class="inline-flex items-center gap-2 rounded-badge bg-white/15 px-4 py-2">
                        <img src="https://flagcdn.com/w20/id.png" alt="Bahasa" class="rounded-full">
                        Bahasa
                    </span>
                    <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="rounded-badge bg-white/15 px-4 py-2 text-white transition hover:bg-white/30">Keluar</button>
                    </form>
                </div>
                </header>

                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('admin-menu-toggle');
            const panel = document.getElementById('admin-menu-panel');
            if (toggle && panel) {
                toggle.addEventListener('click', () => {
                    panel.classList.toggle('hidden');
                });
            }

            // Set height for chart bars
            const chartBars = document.querySelectorAll('[data-height]');
            chartBars.forEach(bar => {
                const height = bar.getAttribute('data-height');
                if (height) {
                    bar.style.height = height + 'px';
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-admin/admin.blade.php ENDPATH**/ ?>