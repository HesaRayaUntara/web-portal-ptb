<?php $__env->startSection('title', 'Admin - Edit Profil Program Studi'); ?>

<?php
    use Illuminate\Support\Facades\Storage;
?>

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
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Dasbor</a>
                    <a href="<?php echo e(route('admin.profil.index')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Profil Program Studi</a>
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

        <main class="flex-1 p-6 lg:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-textDark">Edit Profil Program Studi</h1>
                <p class="mt-1 text-sm text-textMuted">Edit profil program studi</p>
            </div>

            
            <?php if(session('error')): ?>
                <div id="error-alert" class="mb-6 flex items-center justify-between rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-soft animate-slide-down">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?php echo e(session('error')); ?></span>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="text-red-600 hover:text-red-800">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div id="validation-alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 px-4 py-3 shadow-soft animate-slide-down">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 flex-shrink-0 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1">
                            <h3 class="mb-2 font-semibold text-red-800">Terjadi kesalahan validasi:</h3>
                            <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <button type="button" onclick="document.getElementById('validation-alert').remove()" class="text-red-600 hover:text-red-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($profilProdi) && $profilProdi): ?>
            <form method="POST" action="<?php echo e(route('admin.profil.update', $profilProdi)); ?>" enctype="multipart/form-data" class="space-y-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Deskripsi Program Studi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="deskripsi" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan deskripsi program studi"><?php echo e(old('deskripsi', isset($profilProdi) ? $profilProdi->deskripsi : '')); ?></textarea>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Visi & Misi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="visi" class="mb-2 block text-sm font-semibold text-textDark">Visi</label>
                            <textarea id="visi" name="visi" rows="3" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan visi program studi"><?php echo e(old('visi', isset($profilProdi) ? $profilProdi->visi : '')); ?></textarea>
                        </div>
                        <div>
                            <label for="misi" class="mb-2 block text-sm font-semibold text-textDark">Misi</label>
                            <textarea id="misi" name="misi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan misi program studi (pisahkan dengan baris baru)"><?php echo e(old('misi', isset($profilProdi) ? $profilProdi->misi : '')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">*Pisahkan setiap poin misi dengan baris baru</p>
                        </div>
                        <div>
                            <label for="tujuan" class="mb-2 block text-sm font-semibold text-textDark">Tujuan</label>
                            <textarea id="tujuan" name="tujuan" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan tujuan program studi (pisahkan dengan baris baru)"><?php echo e(old('tujuan', isset($profilProdi) ? $profilProdi->tujuan : '')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">*Pisahkan setiap poin tujuan dengan baris baru</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Informasi Akademik</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="lama_studi" class="mb-2 block text-sm font-semibold text-textDark">Lama Studi (Semester)</label>
                            <input type="text" id="lama_studi" name="lama_studi" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. 8" value="<?php echo e(old('lama_studi', isset($profilProdi) ? $profilProdi->lama_studi : '')); ?>">
                        </div>
                        <div>
                            <label for="gelar_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Gelar Lulusan</label>
                            <input type="text" id="gelar_lulusan" name="gelar_lulusan" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. S.Kom." value="<?php echo e(old('gelar_lulusan', isset($profilProdi) ? $profilProdi->gelar_lulusan : '')); ?>">
                        </div>
                        <div>
                            <label for="kepanjangan_gelar" class="mb-2 block text-sm font-semibold text-textDark">Kepanjangan Gelar</label>
                            <input type="text" id="kepanjangan_gelar" name="kepanjangan_gelar" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. Sarjana Komputer" value="<?php echo e(old('kepanjangan_gelar', isset($profilProdi) ? $profilProdi->kepanjangan_gelar : '')); ?>">
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBP 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbp_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbp_pelamar" name="snbp_pelamar" min="0" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbp_pelamar', isset($profilProdi) ? $profilProdi->snbp_pelamar : '')); ?>" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbp_diterima" name="snbp_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbp_diterima', isset($profilProdi) ? $profilProdi->snbp_diterima : '')); ?>" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="text" id="snbp_keketatan" name="snbp_keketatan" readonly
                                class="w-full rounded-xl border border-borderSoft bg-gray-50 px-4 py-3 text-sm text-textDark placeholder:text-textMuted cursor-not-allowed"
                                placeholder="0.00" value="0.00">
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBT 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbt_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbt_pelamar" name="snbt_pelamar" min="0" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbt_pelamar', isset($profilProdi) ? $profilProdi->snbt_pelamar : '')); ?>" oninput="calculateKeketatan('snbt')">
                        </div>
                        <div>
                            <label for="snbt_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbt_diterima" name="snbt_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbt_diterima', isset($profilProdi) ? $profilProdi->snbt_diterima : '')); ?>" oninput="calculateKeketatan('snbt')">
                        </div>
                        <div>
                            <label for="snbt_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="text" id="snbt_keketatan" name="snbt_keketatan" readonly
                                class="w-full rounded-xl border border-borderSoft bg-gray-50 px-4 py-3 text-sm text-textDark placeholder:text-textMuted cursor-not-allowed"
                                placeholder="0.00" value="<?php echo e(old('snbt_keketatan', isset($profilProdi) && $profilProdi->snbt_keketatan ? number_format($profilProdi->snbt_keketatan, 2, '.', '') : '0.00')); ?>">
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Akreditasi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Akreditasi</label>
                            <input type="text" id="akreditasi" name="akreditasi" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                value="<?php echo e(old('akreditasi', isset($profilProdi) ? $profilProdi->akreditasi : '')); ?>">
                        </div>
                        <div>
                            <label for="no_sk" class="mb-2 block text-sm font-semibold text-textDark">No. SK</label>
                            <input type="text" id="no_sk" name="no_sk" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="" value="<?php echo e(old('no_sk', isset($profilProdi) ? $profilProdi->no_sk : '')); ?>">
                        </div>
                        <div>
                            <label for="foto_akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Foto Akreditasi</label>
                            <?php if(isset($profilProdi) && $profilProdi->foto_akreditasi): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(Storage::url($profilProdi->foto_akreditasi)); ?>" alt="Sertifikat Akreditasi" class="h-32 w-auto rounded-lg border border-borderSoft object-cover">
                                </div>
                            <?php endif; ?>
                            <input type="file" id="foto_akreditasi" name="foto_akreditasi" accept="image/jpeg,image/jpg,image/png" <?php echo e(!isset($profilProdi) || !$profilProdi->foto_akreditasi ? 'required' : ''); ?>

                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                            <p class="mt-1 text-xs text-textMuted">Format: JPG, JPEG, PNG (Maks: 5MB)</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Industri</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="industri_tempat_bekerja" class="mb-2 block text-sm font-semibold text-textDark">Industri Tempat Bekerja</label>
                            <textarea id="industri_tempat_bekerja" name="industri_tempat_bekerja" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan industri atau tempat bekerja (pisahkan dengan baris baru)"><?php echo e(old('industri_tempat_bekerja', isset($profilProdi) ? $profilProdi->industri_tempat_bekerja : '')); ?></textarea>
                        </div>
                    </div>
                </section>

                
                <div class="flex justify-end gap-4">
                    <a href="<?php echo e(route('admin.profil.index')); ?>"
                        class="inline-block rounded-xl border border-borderSoft bg-white px-6 py-3 text-sm font-semibold text-textDark shadow-soft transition hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
            <?php else: ?>
                <div class="rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800">
                    Profil Program Studi tidak ditemukan.
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function calculateKeketatan(type) {
        const pelamar = parseFloat(document.getElementById(type + '_pelamar').value) || 0;
        const diterima = parseFloat(document.getElementById(type + '_diterima').value) || 0;
        const keketatan = diterima > 0 ? (pelamar / diterima).toFixed(2) : '0.00';
        document.getElementById(type + '_keketatan').value = keketatan;
    }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-admin/profil/edit.blade.php ENDPATH**/ ?>