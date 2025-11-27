<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="rounded-section border border-borderSoft bg-white shadow-soft">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-stretch">
        <?php echo $__env->make('partials.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                
                <div class="grid grid-cols-2 gap-3 md:gap-4 lg:grid-cols-4">
                    
                    <a href="<?php echo e(route('admin.dosen.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br bg-orange-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                        <div class="relative p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="text-3xl font-bold text-white"><?php echo e($jumlahDosen ?? \App\Models\Dosen::count()); ?></p>
                                    <p class="mt-1 text-sm font-semibold text-white">Dosen</p>
                                </div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-orange-700/50 px-4 py-2">
                            <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                                <span>View Details</span>
                                <span>></span>
                            </div>
                        </div>
                    </a>

                    
                    <a href="<?php echo e(route('admin.staf.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br  bg-blue-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                        <div class="relative p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="text-3xl font-bold text-white"><?php echo e($jumlahStaf ?? \App\Models\Staf::count()); ?></p>
                                    <p class="mt-1 text-sm font-semibold text-white">Staf</p>
                                </div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-700/50 px-4 py-2">
                            <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                                <span>View Details</span>
                                <span>></span>
                            </div>
                        </div>
                    </a>

                    
                    <a href="<?php echo e(route('admin.berita.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br bg-yellow-500 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                        <div class="relative p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="text-3xl font-bold text-white"><?php echo e($jumlahBerita ?? \App\Models\Berita::count()); ?></p>
                                    <p class="mt-1 text-sm font-semibold text-white">Berita</p>
                                </div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-yellow-600/50 px-4 py-2">
                            <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                                <span>View Details</span>
                                <span>></span>
                            </div>
                        </div>
                    </a>

                    
                    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br from-green-500 to-green-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                        <div class="relative p-4">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <p class="text-3xl font-bold text-white"><?php echo e($jumlahGaleri ?? \App\Models\Galeri::count()); ?></p>
                                    <p class="mt-1 text-sm font-semibold text-white">Galeri</p>
                                </div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-green-700/50 px-4 py-2">
                            <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                                <span>View Details</span>
                                <span>></span>
                            </div>
                        </div>
                    </a>
                </div>
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