<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="mx-auto flex w-full max-w-content flex-col gap-12 px-6 py-12 md:px-10 lg:px-12">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_1fr_1.1fr]">
        
        <div class="space-y-4">
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider2 text-white/90">Kontak Kami</h4>
                <p class="mt-2 text-xl font-semibold">Program Studi PTB</p>
            </div>
            <ul class="space-y-2 text-sm text-white/80">
                <li class="flex items-start gap-3">
                    <!-- <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 text-xs">📍</span> -->
                    <span>Jl. Kumbang No.14, Kelurahan Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</span>
                </li>
                <li class="flex items-start gap-3">
                    <!-- <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 text-xs">☎️</span> -->
                    <span>+62 8123 4567 6543</span>
                </li>
                <li class="flex items-start gap-3">
                    <!-- <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 text-xs">✉️</span> -->
                    <span>info@ptb.ac.id</span>
                </li>
                <li class="flex items-start gap-3">
                    <!-- <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 text-xs">🕑</span> -->
                    <span>Senin-Jumat, 08.00-16.00 WIB</span>
                </li>
            </ul>
        </div>

        
        <div class="space-y-4">
            <h4 class="text-sm font-semibold uppercase tracking-wider2 text-white/90">Informasi</h4>
            <ul class="grid gap-2 text-sm text-white/80">
                <li><a href="<?php echo e(route('profil')); ?>" class="transition hover:text-white">Tentang Program Studi</a></li>
                <li><a href="<?php echo e(route('dosen')); ?>" class="transition hover:text-white">Profil Dosen</a></li>
                <li><a href="<?php echo e(route('staf')); ?>" class="transition hover:text-white">Profil Staf</a></li>
                <li><a href="<?php echo e(route('kurikulum')); ?>" class="transition hover:text-white">Kurikulum &amp; Akademik</a></li>
                <li><a href="<?php echo e(route('berita')); ?>" class="transition hover:text-white">Berita Kegiatan</a></li>
                <li><a href="<?php echo e(route('galeri')); ?>" class="transition hover:text-white">Galeri</a></li?
            </ul>
            <div class="space-y-3 pt-4">
                <h4 class="text-sm font-semibold uppercase tracking-wider2 text-white/90">Ikuti Kami</h4>
                <div class="flex flex-wrap gap-3">

                    
                    <a href="https://www.instagram.com/ptbsvipb/" target="_blank" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white text-xl transition hover:bg-white/20">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    
                    <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white text-xl transition hover:bg-white/20">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    
                    <a href="#" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white text-xl transition hover:bg-white/20">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="space-y-4">
            <h4 class="text-sm font-semibold uppercase tracking-wider2 text-white/90">Lokasi Kami</h4>
            <!-- <p class="text-sm text-white/80">Kunjungi kampus kami di pusat Kota Bogor dan rasakan lingkungan belajar terintegrasi.</p> -->
            <div class="overflow-hidden rounded-2xl shadow-soft ring-1 ring-white/10">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.9473110362665!2d106.80665872004192!3d-6.58788339672403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b501%3A0x25a12f0f97fac4ee!2sSekolah%20Vokasi%20Institut%20Pertanian%20Bogor!5e0!3m2!1sid!2sid!4v1764236542341!5m2!1sid!2sid"
                    class="h-44 w-full border-0 md:h-52"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-between gap-3 border-t border-white/15 pt-6 text-center text-xs text-white/70 md:flex-row md:text-left">
        <span>&copy; <?php echo e(date('Y')); ?> All Rights Reserved</span>
    </div>
</div><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/partials/footer.blade.php ENDPATH**/ ?>