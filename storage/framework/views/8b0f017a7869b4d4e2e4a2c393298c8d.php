

<?php $__env->startSection('title', 'Admin - Profil Program Studi'); ?>

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
                    <a href="<?php echo e(route('admin.profil')); ?>" class="block w-full rounded-xl bg-primary py-3 text-left px-4 text-white shadow-soft">Profil Program Studi</a>
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

            <form method="POST" action="#" enctype="multipart/form-data" class="space-y-8">
                <?php echo csrf_field(); ?>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Deskripsi Program Studi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="deskripsi" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="5" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan deskripsi program studi"><?php echo e(old('deskripsi')); ?></textarea>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Visi & Misi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="visi" class="mb-2 block text-sm font-semibold text-textDark">Visi</label>
                            <textarea id="visi" name="visi" rows="3" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan visi program studi"><?php echo e(old('visi')); ?></textarea>
                        </div>
                        <div>
                            <label for="misi" class="mb-2 block text-sm font-semibold text-textDark">Misi</label>
                            <textarea id="misi" name="misi" rows="5" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan misi program studi (pisahkan dengan baris baru)"><?php echo e(old('misi')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap poin misi dengan baris baru</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Informasi Akademik</h2>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="lama_studi" class="mb-2 block text-sm font-semibold text-textDark">Lama Studi</label>
                            <input type="text" id="lama_studi" name="lama_studi" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Contoh: 8 Semester" value="<?php echo e(old('lama_studi')); ?>">
                        </div>
                        <div>
                            <label for="gelar_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Gelar Lulusan</label>
                            <input type="text" id="gelar_lulusan" name="gelar_lulusan" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Contoh: Sarjana Terapan" value="<?php echo e(old('gelar_lulusan')); ?>">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="deskripsi_gelar" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Gelar</label>
                        <textarea id="deskripsi_gelar" name="deskripsi_gelar" rows="3" 
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                            placeholder="Masukkan deskripsi gelar lulusan"><?php echo e(old('deskripsi_gelar')); ?></textarea>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBP 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbp_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbp_pelamar" name="snbp_pelamar" min="0"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbp_pelamar')); ?>">
                        </div>
                        <div>
                            <label for="snbp_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbp_diterima" name="snbp_diterima" min="0"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbp_diterima')); ?>">
                        </div>
                        <div>
                            <label for="snbp_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="number" id="snbp_keketatan" name="snbp_keketatan" min="0" max="100" step="0.01"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0.00" value="<?php echo e(old('snbp_keketatan')); ?>">
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">SNBT 2025</h2>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <label for="snbt_pelamar" class="mb-2 block text-sm font-semibold text-textDark">Jumlah Pelamar</label>
                            <input type="number" id="snbt_pelamar" name="snbt_pelamar" min="0"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbt_pelamar')); ?>">
                        </div>
                        <div>
                            <label for="snbt_diterima" class="mb-2 block text-sm font-semibold text-textDark">Diterima</label>
                            <input type="number" id="snbt_diterima" name="snbt_diterima" min="0"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0" value="<?php echo e(old('snbt_diterima')); ?>">
                        </div>
                        <div>
                            <label for="snbt_keketatan" class="mb-2 block text-sm font-semibold text-textDark">Keketatan (%)</label>
                            <input type="number" id="snbt_keketatan" name="snbt_keketatan" min="0" max="100" step="0.01"
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="0.00" value="<?php echo e(old('snbt_keketatan')); ?>">
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Akreditasi</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Akreditasi</label>
                            <input type="text" id="akreditasi" name="akreditasi" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Contoh: Baik Sekali" value="<?php echo e(old('akreditasi')); ?>">
                        </div>
                        <div>
                            <label for="deskripsi_akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Deskripsi Akreditasi</label>
                            <textarea id="deskripsi_akreditasi" name="deskripsi_akreditasi" rows="3" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan deskripsi akreditasi"><?php echo e(old('deskripsi_akreditasi')); ?></textarea>
                        </div>
                        <div>
                            <label for="foto_akreditasi" class="mb-2 block text-sm font-semibold text-textDark">Unggah Foto Akreditasi</label>
                            <input type="file" id="foto_akreditasi" name="foto_akreditasi" accept="image/jpeg,image/jpg,image/png"
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
                            <textarea id="industri_tempat_bekerja" name="industri_tempat_bekerja" rows="4" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan industri atau tempat bekerja (pisahkan dengan baris baru)"><?php echo e(old('industri_tempat_bekerja')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap item dengan baris baru</p>
                        </div>
                        <div>
                            <label for="posisi_banyak_dicari" class="mb-2 block text-sm font-semibold text-textDark">Posisi yang Banyak Dicari</label>
                            <textarea id="posisi_banyak_dicari" name="posisi_banyak_dicari" rows="4" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan posisi yang banyak dicari (pisahkan dengan baris baru)"><?php echo e(old('posisi_banyak_dicari')); ?></textarea>
                            <p class="mt-1 text-xs text-textMuted">Pisahkan setiap item dengan baris baru</p>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Filosofi dan Nilai Dasar</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="nilai_etika" class="mb-2 block text-sm font-semibold text-textDark">Nilai dan Etika</label>
                            <textarea id="nilai_etika" name="nilai_etika" rows="4" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan nilai dan etika"><?php echo e(old('nilai_etika')); ?></textarea>
                        </div>
                        <div>
                            <label for="pendekatan_pembelajaran" class="mb-2 block text-sm font-semibold text-textDark">Pendekatan Pembelajaran</label>
                            <textarea id="pendekatan_pembelajaran" name="pendekatan_pembelajaran" rows="4" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan pendekatan pembelajaran"><?php echo e(old('pendekatan_pembelajaran')); ?></textarea>
                        </div>
                        <div>
                            <label for="kompetensi_lulusan" class="mb-2 block text-sm font-semibold text-textDark">Kompetensi Lulusan</label>
                            <textarea id="kompetensi_lulusan" name="kompetensi_lulusan" rows="4" 
                                class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark placeholder:text-textMuted focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15"
                                placeholder="Masukkan kompetensi lulusan"><?php echo e(old('kompetensi_lulusan')); ?></textarea>
                        </div>
                    </div>
                </section>

                
                <section class="rounded-card border border-borderSoft bg-white p-6 shadow-soft">
                    <h2 class="mb-4 text-lg font-semibold text-textDark">Mitra Prodi PTB</h2>
                    <div>
                        <label for="mitra_logo" class="mb-2 block text-sm font-semibold text-textDark">Unggah Logo Mitra</label>
                        <input type="file" id="mitra_logo" name="mitra_logo[]" accept="image/jpeg,image/jpg,image/png" multiple
                            class="w-full rounded-xl border border-borderSoft px-4 py-3 text-sm text-textDark file:mr-4 file:rounded-lg file:border-0 file:bg-primary/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-primary hover:file:bg-primary/20 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
                        <p class="mt-1 text-xs text-textMuted">Format: JPG, PNG, JPEG (Maks. 5MB per file). Dapat mengunggah multiple file</p>
                    </div>
                </section>

                
                <div class="flex justify-end gap-4">
                    <button type="button" 
                        class="rounded-xl border border-borderSoft bg-white px-6 py-3 text-sm font-semibold text-textDark shadow-soft transition hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" 
                        class="rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/admin-pages/admin-profil.blade.php ENDPATH**/ ?>