<?php $__env->startSection('title', 'Login Admin'); ?>

<?php $__env->startSection('content'); ?>
    <section class="min-h-[90vh] bg-[#f3f5f4] py-12">
        <div class="mx-auto flex w-full max-w-5xl flex-col overflow-hidden rounded-[40px] bg-white shadow-[0_30px_80px_rgba(15,23,42,0.08)] lg:flex-row">
            <div class="relative hidden w-1/2 overflow-hidden lg:block">
                <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=80"
                     alt="Pertanian PTB" class="h-full w-full object-cover brightness-90">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/30 to-black/60"></div>
                <div class="absolute inset-x-0 bottom-0 space-y-4 p-10 text-white">
                    <p class="text-sm uppercase tracking-[0.4em] text-white/70">PTB Admin</p>
                    <h2 class="text-3xl font-semibold leading-tight">Kelola informasi secara presisi</h2>
                    <p class="text-sm text-white/80">Dashboard privat untuk memperbarui konten, galeri, dan komunikasi publik Program Studi PTB.</p>
                </div>
            </div>

            <div class="w-full p-10 lg:w-1/2">
                <div class="space-y-2 text-left">
                    <p class="text-xs font-semibold uppercase tracking-[0.4em] text-primary/70">Admin Login</p>
                    <h2 class="text-3xl font-semibold text-secondary">Welcome back</h2>
                    <p class="text-xs text-textMuted">Masuk menggunakan kredensial resmi.</p>
                </div>
                <form class="mt-8 space-y-5" method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                    <div class="space-y-2">
                        <label for="username" class="text-xs font-semibold uppercase tracking-[0.2em] text-textMuted">Username</label>
                        <div class="flex items-center gap-3 rounded-2xl border border-borderSoft px-4 py-3 focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/15">
                            <span class="text-lg text-primary">👤</span>
                            <input id="username" name="username" type="text" placeholder="admin@ptb.ac.id"
                                class="flex-1 border-none bg-transparent text-sm text-textDark placeholder:text-textMuted focus:outline-none">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="text-xs font-semibold uppercase tracking-[0.2em] text-textMuted">Password</label>
                        <div class="flex items-center gap-3 rounded-2xl border border-borderSoft px-4 py-3 focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/15">
                            <span class="text-lg text-primary">🔒</span>
                            <input id="password" name="password" type="password" placeholder="••••••••"
                                class="flex-1 border-none bg-transparent text-sm text-textDark placeholder:text-textMuted focus:outline-none">
                            <button type="button" id="toggle-password" class="text-xs font-semibold uppercase tracking-wide text-primary">Show</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-textMuted">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" class="rounded border-borderSoft text-primary focus:ring-primary">
                            Ingat saya
                        </label>
                        <button type="button" id="forgot-trigger" class="font-semibold text-primary transition hover:text-primaryDark">Lupa password?</button>
                    </div>
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-3 rounded-2xl bg-gradient-to-r from-primary to-primaryDark py-4 text-sm font-semibold uppercase tracking-[0.3em] text-white shadow-[0_15px_40px_rgba(12,130,75,0.35)] transition hover:scale-[1.01]">
                        <span>Masuk Dashboard</span>
                        <span class="text-lg">↗</span>
                    </button>
                </form>
                <p class="mt-6 text-center text-xs text-textMuted">Penggunaan diawasi. Pastikan keluar setelah selesai.</p>
            </div>
        </div>

        <div id="forgot-overlay"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-6 py-10 backdrop-blur-sm opacity-0 transition-opacity duration-300">
            <div data-forgot-panel
                class="relative w-full max-w-xl scale-95 rounded-3xl bg-white p-8 opacity-0 shadow-2xl transition-all duration-300">
                <button type="button" data-forgot-close
                    class="absolute right-4 top-4 rounded-full bg-primary/10 p-2 text-primary transition hover:bg-primary/20"
                    aria-label="Tutup popup">
                    ✕
                </button>
                <div class="space-y-2 text-center">
                    <p class="text-xs font-semibold uppercase tracking-wide text-primary">Reset Akses</p>
                    <h3 class="text-2xl font-semibold text-secondary">Butuh bantuan masuk?</h3>
                    <p class="text-sm text-textMuted">Isi detail di bawah, tim PTB akan mengirim instruksi pemulihan ke email resmi Anda.</p>
                </div>

                <form id="forgot-form" class="mt-6 space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-textMuted">Email PTB</label>
                        <input type="email" name="email" required placeholder="contoh: admin@ptb.ac.id"
                            class="mt-1 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-xs font-semibold text-textMuted">Nomor kontak</label>
                            <input type="text" name="phone" placeholder="+62 812 xxx"
                                class="mt-1 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-textMuted">Prioritas</label>
                            <select name="priority"
                                class="mt-1 w-full rounded-xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                                <option value="Normal">Normal</option>
                                <option value="Tinggi">Tinggi</option>
                                <option value="Darurat">Darurat</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-textMuted">Deskripsikan kendala</label>
                        <textarea name="issue" rows="3" required placeholder="Contoh: lupa password atau autentikasi gagal"
                            class="mt-1 w-full rounded-2xl border border-borderSoft px-4 py-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30"></textarea>
                    </div>
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="text-xs text-textMuted">
                            <p>Respon rata-rata: <span class="font-semibold text-primary">± 10 menit</span></p>
                            <p>Emergency hotline: <a class="font-semibold text-primary" href="tel:+622518600123">0251-8600123</a>
                            </p>
                        </div>
                        <button type="submit"
                            class="rounded-2xl bg-primary px-6 py-3 text-sm font-semibold uppercase tracking-wide text-white shadow-soft transition hover:bg-primaryDark">Kirim
                            Permintaan</button>
                    </div>
                    <div id="forgot-success"
                        class="hidden rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        Permintaan berhasil dikirim. ID tiket <span data-ticket class="font-semibold">PTB-0000</span>. Kami akan
                        menghubungi Anda segera.
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('forgot-overlay');
            const trigger = document.getElementById('forgot-trigger');
            const closeBtn = overlay?.querySelector('[data-forgot-close]');
            const panel = overlay?.querySelector('[data-forgot-panel]');
            const form = document.getElementById('forgot-form');
            const successBox = document.getElementById('forgot-success');
            const ticketSpan = successBox?.querySelector('[data-ticket]');
            const togglePasswordBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            const openPanel = () => {
                overlay?.classList.remove('hidden');
                overlay?.classList.add('flex');
                requestAnimationFrame(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                    panel?.classList.remove('opacity-0', 'scale-95');
                    panel?.classList.add('opacity-100', 'scale-100');
                });
                overlay?.querySelector('input[name="email"]')?.focus();
            };

            const closePanel = () => {
                overlay?.classList.add('opacity-0');
                overlay?.classList.remove('opacity-100');
                panel?.classList.add('opacity-0', 'scale-95');
                panel?.classList.remove('opacity-100', 'scale-100');
                successBox?.classList.add('hidden');
                setTimeout(() => {
                    overlay?.classList.add('hidden');
                    overlay?.classList.remove('flex');
                }, 250);
            };

            trigger?.addEventListener('click', (e) => {
                e.preventDefault();
                openPanel();
            });

            closeBtn?.addEventListener('click', closePanel);
            overlay?.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    closePanel();
                }
            });

            form?.addEventListener('submit', (e) => {
                e.preventDefault();
                const ticket = `PTB-${Math.floor(Math.random() * 9000) + 1000}`;
                if (ticketSpan) {
                    ticketSpan.textContent = ticket;
                }
                successBox?.classList.remove('hidden');
                form.reset();
            });

            togglePasswordBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                if (!passwordInput) return;
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                togglePasswordBtn.textContent = isPassword ? 'Hide' : 'Show';
            });
        });
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/admin-login.blade.php ENDPATH**/ ?>