

<?php $__env->startSection('title', 'CMS Admin — Program Studi PTB'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .cms-overview-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

        .cms-overview-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(12, 139, 76, 0.12);
            display: grid;
            gap: 12px;
        }

        .cms-overview-card h3 {
            margin: 0;
            font-size: 20px;
            color: var(--primary);
        }

        .cms-overview-card span {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            color: rgba(12, 139, 76, 0.7);
        }

        .cms-overview-card p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .cms-overview-card .meta {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .cms-overview-card .meta span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(12, 139, 76, 0.08);
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 999px;
            text-transform: none;
            font-size: 13px;
            letter-spacing: 0;
        }

        .cms-grid {
            display: grid;
            gap: 24px;
        }

        .cms-section {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 28px 32px;
            box-shadow: var(--shadow-sm);
        }

        .cms-section header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 20px;
        }

        .cms-section header h2 {
            margin: 0;
            font-size: 24px;
            color: var(--secondary);
        }

        .cms-section header p {
            margin: 6px 0 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        .cms-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .cms-section table thead {
            background: rgba(12, 139, 76, 0.08);
        }

        .cms-section table th,
        .cms-section table td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e0e7df;
            font-size: 14px;
        }

        .cms-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
        }

        .cms-status--published {
            background: rgba(12, 139, 76, 0.12);
            color: var(--primary);
        }

        .cms-status--draft {
            background: rgba(255, 193, 7, 0.18);
            color: #8c6a00;
        }

        .cms-status--review {
            background: rgba(0, 123, 255, 0.16);
            color: #0c63ce;
        }

        .cms-tasks {
            display: grid;
            gap: 14px;
        }

        .cms-task-item {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            background: rgba(12, 139, 76, 0.08);
            border-radius: var(--radius-md);
            padding: 14px 18px;
        }

        .cms-task-item input[type='checkbox'] {
            margin-top: 4px;
        }

        .cms-task-item label {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .cms-task-item p {
            margin: 4px 0 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .cms-guides {
            display: grid;
            gap: 16px;
        }

        .cms-guide-item {
            padding: 18px 20px;
            border-radius: var(--radius-md);
            background: #f4f9f1;
            border: 1px solid rgba(12, 139, 76, 0.12);
        }

        .cms-guide-item h3 {
            margin: 0 0 6px;
            font-size: 18px;
            color: var(--primary);
        }

        .cms-guide-item p {
            margin: 0;
            font-size: 14px;
            color: var(--text-muted);
        }

        .cms-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-outline {
            background: #fff;
            color: var(--primary);
            border: 2px solid rgba(12, 139, 76, 0.2);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text-muted);
            border: 2px dashed rgba(12, 139, 76, 0.2);
        }

        @media (max-width: 768px) {
            .cms-section {
                padding: 24px;
            }

            .cms-section header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-hero" style="--hero-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1400&q=80');">
        <div class="overlay">
            <span class="section-kicker">CMS Admin</span>
            <h1 class="hero-title">Dashboard Konten Program Studi</h1>
            <p class="hero-subtitle">
                Kelola seluruh halaman publik PTB secara terpusat. Pantau status publikasi, progres revisi, dan catatan kolaborasi
                tim untuk memastikan informasi kampus selalu mutakhir.
            </p>
            <div class="button-row">
                <a class="btn btn-primary" href="#ringkasan">Lihat Ringkasan</a>
                <a class="btn btn-light" href="#panduan">Panduan Pengelolaan</a>
            </div>
        </div>
    </section>

    <section class="section-card" id="ringkasan">
        <p class="section-kicker">Ringkasan</p>
        <h2 class="section-header">Status Konten Halaman</h2>
        <div class="cms-overview-grid">
            <article class="cms-overview-card">
                <span>Beranda</span>
                <h3>Halaman Utama</h3>
                <p>Menampilkan highlight keunggulan program studi dan berita terbaru.</p>
                <div class="meta">
                    <span>&#x1F4CC; Dipublikasikan</span>
                    <span>&#x23F3; Update: 2 hari lalu</span>
                </div>
            </article>
            <article class="cms-overview-card">
                <span>Profil</span>
                <h3>Profil Prodi</h3>
                <p>Informasi komprehensif mengenai visi, fasilitas, dan nilai program studi.</p>
                <div class="meta">
                    <span>&#x1F4DD; Revisi minor</span>
                    <span>&#x23F1;&#xFE0F; Target: 15 Nov</span>
                </div>
            </article>
            <article class="cms-overview-card">
                <span>Kurikulum</span>
                <h3>Struktur Kurikulum</h3>
                <p>Struktur semester, fokus keahlian, dan capaian pembelajaran.</p>
                <div class="meta">
                    <span>&#x1F4CC; Dipublikasikan</span>
                    <span>&#x1F4C3; Draft versi 2025</span>
                </div>
            </article>
            <article class="cms-overview-card">
                <span>Dosen & Berita</span>
                <h3>Update Dinamis</h3>
                <p>Profil tim pengajar dan agregasi agenda/berita terkini program studi.</p>
                <div class="meta">
                    <span>&#x1F4DD; Perlu kurasi</span>
                    <span>&#x1F551; Review mingguan</span>
                </div>
            </article>
        </div>
    </section>

    <section class="cms-grid" id="detail">
        <article class="cms-section">
            <header>
                <div>
                    <p class="section-kicker">Pipeline</p>
                    <h2>Antrian Konten</h2>
                    <p>Daftar tugas yang sedang ditangani tim konten. Gunakan label status untuk memudahkan prioritas.</p>
                </div>
                <div class="cms-actions">
                    <a class="btn btn-primary" href="#">Tambah Tugas</a>
                    <a class="btn btn-outline" href="#">Sinkronkan Jadwal</a>
                </div>
            </header>
            <div class="table-wrapper" role="region" aria-label="Antrian konten">
                <table>
                    <thead>
                        <tr>
                            <th>Halaman</th>
                            <th>Fokus</th>
                            <th>Penanggung Jawab</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Profil Prodi</strong></td>
                            <td>Pembaruan data fasilitas & statistik</td>
                            <td>Rahmi</td>
                            <td><span class="cms-status cms-status--review">Menunggu Review</span></td>
                            <td>Verifikasi data laboratorium oleh tim fasilitas.</td>
                        </tr>
                        <tr>
                            <td><strong>Kurikulum</strong></td>
                            <td>Kurikulum MBKM 2025</td>
                            <td>Dimas</td>
                            <td><span class="cms-status cms-status--draft">Draft</span></td>
                            <td>Integrasikan infografis jalur kompetensi baru.</td>
                        </tr>
                        <tr>
                            <td><strong>Berita</strong></td>
                            <td>Publikasi kegiatan Smart Farming</td>
                            <td>Intan</td>
                            <td><span class="cms-status cms-status--published">Publikasi</span></td>
                            <td>Menunggu unggahan dokumentasi video.</td>
                        </tr>
                        <tr>
                            <td><strong>Galeri</strong></td>
                            <td>Kurasi foto kegiatan semester 7</td>
                            <td>Andri</td>
                            <td><span class="cms-status cms-status--draft">Draft</span></td>
                            <td>Prioritaskan dokumentasi agro tech park.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>

        <article class="cms-section" id="panduan">
            <header>
                <div>
                    <p class="section-kicker">Panduan</p>
                    <h2>Pengelolaan Konten</h2>
                    <p>Checklist dan standar operasional agar pembaruan konten selalu konsisten dan akurat.</p>
                </div>
                <a class="btn btn-outline" href="#">Unduh SOP</a>
            </header>
            <div class="cms-guides">
                <div class="cms-guide-item">
                    <h3>Alur Publikasi</h3>
                    <p>Mulai dari perencanaan konten, drafting, review oleh editor, hingga penjadwalan rilis otomatis melalui
                        kalender akademik.</p>
                </div>
                <div class="cms-guide-item">
                    <h3>Standar Visual</h3>
                    <p>Gunakan format foto landscape 16:9, resolusi minimum 1600px, dan tone warna yang selaras dengan identitas
                        Program Studi PTB.</p>
                </div>
                <div class="cms-guide-item">
                    <h3>Manajemen Versi</h3>
                    <p>Setiap perubahan substansial wajib didokumentasikan di changelog internal beserta penanggung jawab dan
                        tanggal publikasi.</p>
                </div>
            </div>
        </article>

        <article class="cms-section">
            <header>
                <div>
                    <p class="section-kicker">Kualitas</p>
                    <h2>Checklist Rilis Mingguan</h2>
                    <p>Gunakan daftar cek ini sebelum mengaktifkan pembaruan konten di website publik Program Studi PTB.</p>
                </div>
                <a class="btn btn-ghost" href="#">Bagikan ke Tim</a>
            </header>
            <div class="cms-tasks">
                <div class="cms-task-item">
                    <input id="task-accessibility" type="checkbox" name="task-accessibility">
                    <div>
                        <label for="task-accessibility">Uji aksesibilitas</label>
                        <p>Pastikan penggunaan heading, deskripsi gambar alternatif, dan kontras warna memenuhi standar WCAG
                            2.1.</p>
                    </div>
                </div>
                <div class="cms-task-item">
                    <input id="task-content" type="checkbox" name="task-content">
                    <div>
                        <label for="task-content">Validasi konten akademik</label>
                        <p>Konfirmasi data kurikulum, struktur organisasi, dan agenda resmi dengan sekretariat prodi.</p>
                    </div>
                </div>
                <div class="cms-task-item">
                    <input id="task-assets" type="checkbox" name="task-assets">
                    <div>
                        <label for="task-assets">Optimasi asset</label>
                        <p>Kompress gambar, sematkan metadata, dan pastikan hak cipta sudah dicantumkan.</p>
                    </div>
                </div>
                <div class="cms-task-item">
                    <input id="task-localization" type="checkbox" name="task-localization">
                    <div>
                        <label for="task-localization">Sinkronisasi terjemahan</label>
                        <p>Periksa kesesuaian konten bahasa Indonesia dan Inggris, termasuk istilah teknis pertanian.</p>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/cms.blade.php ENDPATH**/ ?>