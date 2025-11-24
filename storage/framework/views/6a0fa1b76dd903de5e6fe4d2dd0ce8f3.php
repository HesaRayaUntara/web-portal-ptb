

<?php $__env->startSection('title', 'Admin - Dosen'); ?>

<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Facades\Storage;
?>
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
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Dasbor</a>
                    <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Program Studi</a>
                    <a href="<?php echo e(route('admin.fasilitas.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Fasilitas</a>
                    <a href="<?php echo e(route('admin.kurikulum.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</a>
                    <a href="<?php echo e(route('admin.staf.index')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Staf</a>
                    <a href="<?php echo e(route('admin.dosen.index')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Profil Dosen</a>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Berita</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Galeri</button>
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
        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Dosen</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola data dosen dan portofolio</p>
            </div>

            
            <?php if(session('success')): ?>
                <div id="success-alert" class="mb-6 flex items-center justify-between rounded-xl border border-green-300 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?php echo e(session('success')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="text-green-600 hover:text-green-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error') || $errors->any()): ?>
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?php echo e(session('error') ?? $errors->first()); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="text-red-600 hover:text-red-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Dosen</h2>
                    <a href="<?php echo e(route('admin.dosen.create')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($dosen->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Nama</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-sm text-textDark"><?php echo e($item->nama); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->status); ?></td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.dosen.edit', $item->id)); ?>" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyDosen', $item->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?');" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada dosen yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-4 shadow-soft sm:mb-8 sm:p-6">
                <h2 class="mb-4 text-base font-semibold text-textDark sm:text-lg">Jenis Karya</h2>
                
                
                <form method="POST" action="<?php echo e(route('admin.dosen.storeJenisKarya')); ?>" class="mb-6">
                    <?php echo csrf_field(); ?>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <input type="text" name="j_karya" id="j_karya" value="<?php echo e(old('j_karya')); ?>" 
                            class="flex-1 rounded-lg border border-borderSoft px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:px-4" 
                            placeholder="Masukkan jenis karya" required>
                        <button type="submit" 
                            class="w-full rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark sm:w-auto sm:px-6">
                            Tambah
                        </button>
                    </div>
                </form>

                
                <?php if($jenisKarya->count() > 0): ?>
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="w-full min-w-[300px] border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Jenis Karya</th>
                                    <th class="px-3 py-2 text-center text-xs font-semibold text-textDark sm:px-4 sm:py-3 sm:text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $jenisKarya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-3 py-2 text-xs text-textMuted sm:px-4 sm:py-3 sm:text-sm"><?php echo e($item->j_karya); ?></td>
                                        <td class="px-3 py-2 sm:px-4 sm:py-3">
                                            <div class="flex items-center justify-center">
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyJenisKarya', $item->id)); ?>" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis karya ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="flex items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-600 transition hover:bg-red-100 sm:p-2"
                                                        title="Hapus">
                                                        <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="py-4 text-center text-xs text-textMuted sm:text-sm">Belum ada jenis karya.</p>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Penelitian</h2>
                    <a href="<?php echo e(route('admin.dosen.penelitian.create')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($penelitian->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Penelitian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $penelitian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-sm text-textDark"><?php echo e($item->judul_penelitian); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->tahun); ?></td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.dosen.penelitian.edit', $item->id)); ?>" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyPenelitian', $item->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penelitian ini?');" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada penelitian yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Pengabdian Masyarakat</h2>
                    <a href="<?php echo e(route('admin.dosen.pengabdian.create')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($pengabdian->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Pengabdian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pengabdian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-sm text-textDark"><?php echo e($item->judul_pengabdian); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->tahun); ?></td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.dosen.pengabdian.edit', $item->id)); ?>" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyPengabdian', $item->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengabdian masyarakat ini?');" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada pengabdian masyarakat yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">Publikasi Karya</h2>
                    <a href="<?php echo e(route('admin.dosen.publikasi.create')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($publikasi->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $publikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-sm text-textDark"><?php echo e($item->judul_karya); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->jenis_karya); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->tahun); ?></td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.dosen.publikasi.edit', $item->id)); ?>" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyPublikasi', $item->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus publikasi karya ini?');" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada publikasi karya yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="mb-6 rounded-xl border border-borderSoft bg-white p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-textDark">HKI/Paten</h2>
                    <a href="<?php echo e(route('admin.dosen.hki.create')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>

                <?php if($hki->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-[#F4F7F3]">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Judul Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Jenis Karya</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Tahun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-textDark whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $hki; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-borderSoft transition hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-textMuted whitespace-nowrap"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-3 text-sm text-textDark"><?php echo e($item->judul_karya); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->jenis_karya); ?></td>
                                        <td class="px-4 py-3 text-sm text-textMuted"><?php echo e($item->tahun); ?></td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="<?php echo e(route('admin.dosen.hki.edit', $item->id)); ?>" class="flex items-center justify-center rounded-lg bg-blue-50 p-2 text-blue-600 transition hover:bg-blue-100" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.dosen.destroyHki', $item->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus HKI/Paten ini?');" class="inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="flex items-center justify-center rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100" title="Hapus">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-textMuted">Belum ada HKI/Paten yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<script>
    // Auto-hide alerts
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        [successAlert, errorAlert].forEach(alert => {
            if (alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-admin/dosen/index.blade.php ENDPATH**/ ?>