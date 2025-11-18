

<?php $__env->startSection('title', 'Fasilitas Prodi PTB'); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<nav class="mb-6 flex items-center gap-2 text-sm text-textMuted">
    <a href="<?php echo e(route('beranda')); ?>" class="transition hover:text-primary">Beranda</a>
    <span> > </span>
    <a href="<?php echo e(route('profil')); ?>" class="transition hover:text-primary">Profil Prodi</a>
    <span> > </span>
    <a href="<?php echo e(route('fasilitas')); ?>" class="transition hover:text-primary text-primaryDark">Fasilitas</a>
</nav>


<section
    class="relative overflow-hidden rounded-section bg-cover bg-center text-white shadow-soft"
    style="background-image: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88)), url('https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=1400&q=80');">
    <div class="relative space-y-5 p-10 md:p-12 lg:p-16">
        <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-wide4 text-white">Fasilitas</span>
        <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">Fasilitas Prodi PTB</h1>
        <p class="max-w-2xl text-base text-white/85 md:text-lg">Dukungan fasilitas modern dan lengkap untuk mendukung proses pembelajaran, penelitian, dan pengembangan inovasi teknologi pertanian.</p>
    </div>
</section>


<section class="mt-12 rounded-section bg-white p-8 shadow-soft md:mt-8 md:p-10 lg:p-12">
    <div class="mb-8">
        <span class="text-xs font-semibold uppercase tracking-wide4 text-primary/80">Fasilitas Pembelajaran</span>
        <h2 class="mt-2 text-3xl font-semibold text-secondary md:text-4xl">Lingkungan Belajar Modern</h2>
        <p class="mt-4 text-sm leading-relaxed text-textMuted md:text-base">
            Program Studi PTB dilengkapi dengan berbagai fasilitas modern yang mendukung kegiatan pembelajaran, praktikum, dan penelitian mahasiswa.
        </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80" data-alt="Laboratorium Inovasi">
            <img src="https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?auto=format&fit=crop&w=1400&q=80" alt="Laboratorium Inovasi" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Laboratorium Inovasi</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas modern untuk penelitian dan pengembangan teknologi berbasis data, IoT, dan sistem kontrol otomatis.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" data-alt="Agro Tech Park">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Agro Tech Park</h3>
                <p class="text-xs text-textMuted leading-relaxed">Ruang praktik terbuka untuk menerapkan teknologi pertanian presisi dengan sistem irigasi otomatis dan rumah kaca modern.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" data-alt="Learning Studio">
            <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Learning Studio</h3>
                <p class="text-xs text-textMuted leading-relaxed">Ruang belajar interaktif dengan teknologi multimedia untuk pembelajaran kolaboratif dan pengembangan ide kreatif.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" data-alt="Laboratorium Tanah dan Air">
            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" alt="Laboratorium Tanah dan Air" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Laboratorium Tanah dan Air</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas untuk analisis karakteristik tanah, kualitas air, dan manajemen sumber daya lahan berkelanjutan.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80" data-alt="Perpustakaan Digital">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80" alt="Perpustakaan Digital" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Perpustakaan Digital</h3>
                <p class="text-xs text-textMuted leading-relaxed">Akses koleksi digital lengkap, jurnal internasional, e-book, dan database penelitian dengan ruang baca yang nyaman.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" data-alt="Workshop dan Bengkel">
            <img src="https://images.unsplash.com/photo-1458640904116-093b74971de9?auto=format&fit=crop&w=800&q=80" alt="Workshop dan Bengkel" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Workshop dan Bengkel</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas untuk praktik pembuatan alat pertanian, prototyping teknologi, dan perakitan perangkat IoT.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80" data-alt="Ruang Seminar dan Konferensi">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80" alt="Ruang Seminar dan Konferensi" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Ruang Seminar dan Konferensi</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas untuk kegiatan seminar, workshop, dan konferensi dengan teknologi audio-visual lengkap.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" data-alt="Agro Tech Park">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Agro Tech Park" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Agro Tech Park</h3>
                <p class="text-xs text-textMuted leading-relaxed">Ruang praktik terbuka untuk menerapkan teknologi pertanian presisi dengan sistem irigasi otomatis dan rumah kaca modern.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" data-alt="Learning Studio">
            <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=800&q=80" alt="Learning Studio" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Learning Studio</h3>
                <p class="text-xs text-textMuted leading-relaxed">Ruang belajar interaktif dengan teknologi multimedia untuk pembelajaran kolaboratif dan pengembangan ide kreatif.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=800&q=80" data-alt="Green House dan Nursery">
            <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?auto=format&fit=crop&w=800&q=80" alt="Green House dan Nursery" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Green House dan Nursery</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas pembibitan dan budidaya tanaman dalam lingkungan terkontrol dengan sistem hidroponik dan aeroponik.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" data-alt="Laboratorium Tanah dan Air">
            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?auto=format&fit=crop&w=800&q=80" alt="Laboratorium Tanah dan Air" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Laboratorium Tanah dan Air</h3>
                <p class="text-xs text-textMuted leading-relaxed">Fasilitas untuk analisis karakteristik tanah, kualitas air, dan manajemen sumber daya lahan berkelanjutan.</p>
            </div>
        </article>

        
        <article class="facility-card overflow-hidden rounded-card border border-primary/10 bg-white cursor-pointer shadow-soft transition hover:-translate-y-1 hover:shadow-card" data-image="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80" data-alt="Perpustakaan Digital">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80" alt="Perpustakaan Digital" class="h-32 w-full object-cover">
            <div class="space-y-2 p-4">
                <h3 class="text-lg font-semibold text-textDark">Perpustakaan Digital</h3>
                <p class="text-xs text-textMuted leading-relaxed">Akses koleksi digital lengkap, jurnal internasional, e-book, dan database penelitian dengan ruang baca yang nyaman.</p>
            </div>
        </article>
    </div>
</section>

<!-- Image Modal -->
<div id="facilityModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
    <div class="relative w-full max-w-md">
        <button id="closeFacilityModal" class="absolute -right-2 -top-2 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-textDark shadow-lg transition hover:bg-gray-100">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="relative w-full overflow-hidden rounded-lg bg-white shadow-xl">
            <div class="relative w-full" style="padding-bottom: 75%;">
                <img id="facilityModalImage" src="" alt="" class="absolute inset-0 h-full w-full object-cover">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const facilityCards = document.querySelectorAll('.facility-card');
        const modal = document.getElementById('facilityModal');
        const modalImage = document.getElementById('facilityModalImage');
        const closeModal = document.getElementById('closeFacilityModal');

        facilityCards.forEach(card => {
            card.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                const imageAlt = this.getAttribute('data-alt');
                
                modalImage.src = imageUrl;
                modalImage.alt = imageAlt;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close modal functions
        function closeFacilityModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        closeModal.addEventListener('click', closeFacilityModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeFacilityModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeFacilityModal();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/fasilitas.blade.php ENDPATH**/ ?>