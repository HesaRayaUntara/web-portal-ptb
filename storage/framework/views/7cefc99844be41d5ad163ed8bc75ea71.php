

<?php $__env->startSection('title', 'Admin - Profil Program Studi'); ?>

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
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Profil Dosen</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Kurikulum</button>
                    <button class="w-full rounded-xl bg-white py-3 text-left px-4 shadow-soft transition hover:bg-primary/5">Formulir Kontak</button>
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
                <h1 class="text-2xl font-bold text-textDark">Profil Program Studi</h1>
                <p class="mt-1 text-sm text-textMuted">Kelola informasi profil program studi</p>
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

            <form method="POST" action="<?php echo e(isset($profilProdi) ? route('admin.profil.update', $profilProdi->id) : route('admin.profil.store')); ?>" enctype="multipart/form-data" class="space-y-8">
                <?php echo csrf_field(); ?>
                <?php if(isset($profilProdi)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Deskripsi Program Studi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="deskripsi" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan deskripsi program studi"><?php echo e(old('deskripsi', $profilProdi->deskripsi ?? '')); ?></textarea>
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
                                placeholder="Masukkan visi program studi"><?php echo e(old('visi', $profilProdi->visi ?? '')); ?></textarea>
                        </div>
                        <div>
                            <label for="misi" class="mb-2 block text-sm font-semibold text-textDark">Misi</label>
                            <textarea id="misi" name="misi" rows="5" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan misi program studi (pisahkan dengan baris baru)"><?php echo e(old('misi', $profilProdi->misi ?? '')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap poin misi dengan baris baru</p>
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
                                placeholder="cth. 8" value="<?php echo e(old('lama_studi', $profilProdi->lama_studi ?? '')); ?>">
                        </div>
                        <div>
                            <label for="gelar_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Gelar Lulusan</label>
                            <input type="text" id="gelar_lulusan" name="gelar_lulusan" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. S.Kom." value="<?php echo e(old('gelar_lulusan', $profilProdi->gelar_lulusan ?? '')); ?>">
                        </div>
                        <div>
                            <label for="kepanjangan_gelar" class="mb-2 block text-sm font-semibold text-textDark">Kepanjangan Gelar</label>
                            <input type="text" id="kepanjangan_gelar" name="kepanjangan_gelar" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="cth. Sarjana Komputer" value="<?php echo e(old('kepanjangan_gelar', $profilProdi->kepanjangan_gelar ?? '')); ?>">
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
                                placeholder="0" value="<?php echo e(old('snbp_pelamar', $profilProdi->snbp_pelamar ?? '')); ?>" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbp_diterima" name="snbp_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbp_diterima', $profilProdi->snbp_diterima ?? '')); ?>" oninput="calculateKeketatan('snbp')">
                        </div>
                        <div>
                            <label for="snbp_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="text" id="snbp_keketatan" name="snbp_keketatan" readonly
                                class="w-full rounded-xl border border-borderSoft bg-gray-50 px-4 py-3 text-sm text-textDark placeholder:text-textMuted cursor-not-allowed"
                                placeholder="0.00" value="<?php echo e(old('snbp_keketatan', isset($profilProdi) && $profilProdi->snbp_keketatan ? number_format($profilProdi->snbp_keketatan, 2, '.', '') : '0.00')); ?>">
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
                                placeholder="0" value="<?php echo e(old('snbt_pelamar', $profilProdi->snbt_pelamar ?? '')); ?>" oninput="calculateKeketatan('snbt')">
                        </div>
                        <div>
                            <label for="snbt_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbt_diterima" name="snbt_diterima" min="1" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbt_diterima', $profilProdi->snbt_diterima ?? '')); ?>" oninput="calculateKeketatan('snbt')">
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
                                value="<?php echo e(old('akreditasi', $profilProdi->akreditasi ?? '')); ?>">
                        </div>
                        <div>
                            <label for="no_sk" class="mb-2 block text-sm font-semibold text-textDark">Nomor SK</label>
                            <input type="text" id="no_sk" name="no_sk" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="" value="<?php echo e(old('no_sk', $profilProdi->no_sk ?? '')); ?>">
                        </div>
                        <div>
                            <label for="foto_akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Sertifikat Akreditasi</label>
                            <?php if(isset($profilProdi) && $profilProdi->foto_akreditasi): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(Storage::url($profilProdi->foto_akreditasi)); ?>" alt="Sertifikat Akreditasi" class="h-32 w-auto rounded-lg border border-borderSoft object-cover">
                                    <p class="mt-1 text-xs text-textMuted">File saat ini</p>
                                </div>
                            <?php endif; ?>
                            <input type="file" id="foto_akreditasi" name="foto_akreditasi" accept="image/jpeg,image/jpg,image/png" <?php echo e(!isset($profilProdi) || !$profilProdi->foto_akreditasi ? 'required' : ''); ?>

                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark file:mr-4 file:rounded-lg file:border-0 file:bg-primary/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-primary hover:file:bg-primary/20 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                            <p class="mt-1 text-xs text-textMuted">Format: JPG, PNG, JPEG (Maks. 5MB)</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Prospek Karier</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="industri_tempat_bekerja" class="mb-2 block text-sm font-semibold text-textDark">Industri/Tempat Bekerja</label>
                            <textarea id="industri_tempat_bekerja" name="industri_tempat_bekerja" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan industri atau tempat bekerja (pisahkan dengan baris baru)"><?php echo e(old('industri_tempat_bekerja', $profilProdi->industri_tempat_bekerja ?? '')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap item dengan baris baru</p>
                        </div>
                        <div>
                            <label for="posisi_banyak_dicari" class="mb-2 block text-sm font-semibold text-textDark">Posisi yang Banyak Dicari</label>
                            <textarea id="posisi_banyak_dicari" name="posisi_banyak_dicari" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan posisi yang banyak dicari (pisahkan dengan baris baru)"><?php echo e(old('posisi_banyak_dicari', $profilProdi->posisi_banyak_dicari ?? '')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap item dengan baris baru</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Filosofi dan Nilai Dasar</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="nilai_etika" class="mb-2 block text-sm font-semibold text-textDark">Nilai dan Etika</label>
                            <textarea id="nilai_etika" name="nilai_etika" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan nilai dan etika"><?php echo e(old('nilai_etika', $profilProdi->nilai_etika ?? '')); ?></textarea>
                        </div>
                        <div>
                            <label for="pendekatan_pembelajaran" class="mb-2 block text-sm font-semibold text-textDark">Pendekatan Pembelajaran</label>
                            <textarea id="pendekatan_pembelajaran" name="pendekatan_pembelajaran" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan pendekatan pembelajaran"><?php echo e(old('pendekatan_pembelajaran', $profilProdi->pendekatan_pembelajaran ?? '')); ?></textarea>
                        </div>
                        <div>
                            <label for="kompetensi_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Kompetensi Lulusan</label>
                            <textarea id="kompetensi_lulusan" name="kompetensi_lulusan" rows="4" required
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan kompetensi lulusan"><?php echo e(old('kompetensi_lulusan', $profilProdi->kompetensi_lulusan ?? '')); ?></textarea>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Mitra Prodi PTB</h2>
                    <div>
                        <label for="mitra_logo" class="mb-2 block text-sm font-semibold text-textDark">Unggah Logo Mitra</label>
                        <?php if(isset($profilProdi) && $profilProdi->mitra_logo && count($profilProdi->mitra_logo) > 0): ?>
                            <div class="mb-4 grid grid-cols-3 gap-4 md:grid-cols-6 lg:grid-cols-9">
                                <?php $__currentLoopData = $profilProdi->mitra_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="relative">
                                        <img src="<?php echo e(Storage::url($logo)); ?>" alt="Logo Mitra" class="h-16 w-full rounded-lg border border-borderSoft object-contain p-2">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <p class="mb-2 text-xs text-textMuted">Logo saat ini</p>
                        <?php endif; ?>
                        <input type="file" id="mitra_logo" name="mitra_logo[]" accept="image/jpeg,image/jpg,image/png" multiple <?php echo e(!isset($profilProdi) || !$profilProdi->mitra_logo || count($profilProdi->mitra_logo) == 0 ? 'required' : ''); ?>

                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark file:mr-4 file:rounded-lg file:border-0 file:bg-primary/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-primary hover:file:bg-primary/20 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                        <p class="mt-1 text-xs text-textMuted">Format: JPG, PNG, JPEG (Maks. 5MB per file). Dapat mengunggah multiple file</p>
                    </div>
                </section>

                
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="window.location.href='<?php echo e(route('admin.dashboard')); ?>'" 
                        class="rounded-xl border border-borderSoft bg-white px-6 py-3 text-sm font-semibold text-textDark shadow-soft transition hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" 
                        class="rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        <?php echo e(isset($profilProdi) ? 'Simpan Perubahan' : 'Simpan'); ?>

                    </button>
                </div>
            </form>

            
            <?php if(isset($profilProdi)): ?>
                <div class="mt-4 flex justify-end">
                    <form method="POST" action="<?php echo e(route('admin.profil.destroy', $profilProdi->id)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil program studi?');" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                            class="rounded-xl border border-red-300 bg-white px-6 py-3 text-sm font-semibold text-red-600 shadow-soft transition hover:bg-red-50">
                            Hapus Profil
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
    @keyframes slide-down {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-slide-down {
        animation: slide-down 0.3s ease-out;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Calculate keketatan automatically
    // Rumus: pelamar / diterima
    function calculateKeketatan(type) {
        const pelamar = parseFloat(document.getElementById(type + '_pelamar').value) || 0;
        const diterima = parseFloat(document.getElementById(type + '_diterima').value) || 0;
        const keketatanInput = document.getElementById(type + '_keketatan');
        
        if (diterima > 0) {
            const keketatan = pelamar / diterima;
            keketatanInput.value = keketatan.toFixed(2);
        } else {
            keketatanInput.value = '0.00';
        }
    }

    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        const validationAlert = document.getElementById('validation-alert');

        function autoDismiss(alert, delay = 5000) {
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.3s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, delay);
            }
        }

        autoDismiss(successAlert, 5000);
        autoDismiss(errorAlert, 7000); // Error alerts stay longer
        autoDismiss(validationAlert, 7000); // Validation errors stay longer

        // Calculate initial keketatan on page load
        calculateKeketatan('snbp');
        calculateKeketatan('snbt');
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/admin-pages/admin-profil-prodi.blade.php ENDPATH**/ ?>