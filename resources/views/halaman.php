<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Program Studi PTB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #006837;
            --primary-dark: #055631;
            --secondary: #1a7431;
            --accent: #f4f9f1;
            --text-dark: #1c2a28;
            --text-muted: #6a7d76;
            --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.08);
            --radius-lg: 18px;
            --radius-md: 14px;
            --radius-sm: 10px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f2f5f1;
            color: var(--text-dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            background: #fff;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 60px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid var(--primary);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 24px;
            margin: 0;
            padding: 0;
        }

        nav a {
            font-size: 15px;
            font-weight: 500;
            color: var(--text-dark);
            transition: color 0.2s ease;
        }

        nav a:hover {
            color: var(--primary);
        }

        .language-select {
            border: 1px solid #d7ded7;
            border-radius: var(--radius-sm);
            padding: 6px 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            cursor: pointer;
        }

        main {
            max-width: 1180px;
            margin: 0 auto;
            padding: 48px 24px 72px;
        }

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            padding: 38px;
            border-radius: var(--radius-lg);
            background: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88));
            color: #fff;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: url("https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=1400&q=80") center/cover no-repeat;
            opacity: 0.35;
            z-index: 0;
        }

        .hero-content,
        .hero-image {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            margin: 0 0 20px;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .hero-list {
            display: grid;
            gap: 16px;
            margin-bottom: 10px;
        }

        .hero-list li {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.12);
            font-weight: 500;
        }

        .hero-list span {
            background: #fff;
            color: var(--primary);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: 700;
        }

        .hero-image img {
            width: 100%;
            border-radius: var(--radius-md);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.28);
        }

        .section-card {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 36px;
            margin-top: 42px;
            box-shadow: var(--shadow-sm);
        }

        .section-card h2 {
            margin: 0 0 18px;
            font-size: 26px;
            color: var(--secondary);
            letter-spacing: 0.4px;
        }

        .profile-content {
            display: grid;
            gap: 24px;
        }

        .profile-content p {
            margin: 0;
            color: var(--text-muted);
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .btn {
            font-weight: 600;
            font-size: 15px;
            border-radius: var(--radius-sm);
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-outline {
            background: #fff;
            color: var(--primary);
            border: 2px solid rgba(12, 139, 76, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(12, 139, 76, 0.18);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 26px;
        }

        .news-card {
            background: #fff;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .news-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12);
        }

        .news-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .news-card h3 {
            margin: 16px;
            font-size: 17px;
        }

        .news-card p {
            margin: 0 16px 22px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 26px;
        }

        .highlight-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 28px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border-top: 6px solid var(--primary);
        }

        .highlight-card h3 {
            margin: 0 0 12px;
            font-size: 22px;
            color: var(--primary);
        }

        .highlight-card p {
            margin: 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        footer {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 46px 24px 60px;
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
            margin-top: 70px;
        }

        .footer-inner {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
        }

        .footer-card h4 {
            margin: 0 0 16px;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .footer-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
            color: rgba(255, 255, 255, 0.82);
        }

        .socials {
            display: flex;
            gap: 12px;
        }

        .socials a {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            font-size: 14px;
            transition: background 0.2s ease;
        }

        .socials a:hover {
            background: rgba(255, 255, 255, 0.28);
        }

        .footer-partners {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
        }

        .footer-partners span {
            background: rgba(255, 255, 255, 0.12);
            padding: 6px 16px;
            border-radius: var(--radius-sm);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .hero {
                padding: 26px;
            }

            main {
                padding: 36px 18px 60px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="topbar">
        <div class="logo">
            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=200&q=80" alt="Logo PTB">
            <div>
                <strong>Program Studi PTB</strong><br>
                <small>Pertanian Terapan Berkelanjutan</small>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Profil Prodi</a></li>
                <li><a href="#">Kurikulum</a></li>
                <li><a href="#">Dosen</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </nav>
        <div class="language-select">
            <span>IN</span>
            <span>&#x25BE;</span>
        </div>
    </div>
</header>
<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Keunggulan Program Studi</h1>
            <ul class="hero-list">
                <li><span>&#10003;</span> Terakreditasi Unggul BAN-PT</li>
                <li><span>&#10003;</span> Terakreditasi Internasional ASIIN</li>
                <li><span>&#10003;</span> Fasilitas Terbaik dan Lengkap</li>
                <li><span>&#10003;</span> Staf Pengajar Profesional</li>
            </ul>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1518976024611-28bf4b48222e?auto=format&fit=crop&w=900&q=80" alt="Mahasiswa PTB">
        </div>
    </section>

    <section class="section-card">
        <h2>Profil Program Studi</h2>
        <div class="profile-content">
            <p>
                Program Studi PTB (Pertanian Terapan Berkelanjutan) berkomitmen menghadirkan pendidikan berkualitas
                tinggi dengan kurikulum yang dirancang untuk menjawab tantangan ketahanan pangan dan pengelolaan sumber
                daya alam. Kami mendorong inovasi teknologi tepat guna, pemberdayaan masyarakat, dan kolaborasi global
                melalui pengalaman belajar yang holistik dan praktis.
            </p>
            <div class="btn-group">
                <button class="btn btn-primary">Lama Studi (8 Semester)</button>
                <button class="btn btn-outline">Gelar Kelulusan (Sarjana Terapan)</button>
                <button class="btn btn-outline">Read more</button>
            </div>
        </div>
    </section>

    <section class="section-card">
        <h2>Berita Harian</h2>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1514996937319-344454492b37?auto=format&fit=crop&w=800&q=80" alt="Aktivitas berkebun">
                <h3>Gardening with Us</h3>
                <p>Ikuti kegiatan berkebun kolaboratif bersama dosen dan mahasiswa untuk mengasah keterampilan praktis.</p>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1566864407770-e1ff98f8356e?auto=format&fit=crop&w=800&q=80" alt="Kegiatan penelitian">
                <h3>Riset Hidroponik Terbaru</h3>
                <p>Tim PTB mengembangkan prototipe sistem hidroponik dengan efisiensi air 30% lebih baik dari teknologi sebelumnya.</p>
            </article>
            <article class="news-card">
                <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80" alt="Pelatihan petani">
                <h3>Pelatihan Petani Mitra</h3>
                <p>Pelatihan rutin bersama petani mitra sebagai bagian dari program pengabdian masyarakat berkelanjutan.</p>
            </article>
        </div>
    </section>

    <section class="section-card">
        <div class="highlight-grid">
            <div class="highlight-card">
                <h3>Visi</h3>
                <p>Menjadi program studi unggulan yang melahirkan generasi profesional, inovatif, dan beretika dalam menerapkan pertanian berkelanjutan.</p>
            </div>
            <div class="highlight-card">
                <h3>Misi</h3>
                <p>Menyelenggarakan pendidikan terapan berkualitas, penelitian aplikatif, dan pengabdian masyarakat yang mendukung penerapan teknologi ramah lingkungan.</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-inner">
        <div class="footer-card">
            <h4>Kontak Kami</h4>
            <ul>
                <li>Jl. Pendidikan No. 45, Bogor</li>
                <li>Telp: (0251) 123-456</li>
                <li>Email: info@ptb.ac.id</li>
                <li>Jam Layanan: Senin - Jumat, 08.00 - 16.00</li>
            </ul>
        </div>
        <div class="footer-card">
            <h4>Informasi</h4>
            <ul>
                <li>FAQ</li>
                <li>Beasiswa</li>
                <li>Pendaftaran</li>
                <li>Hubungan Alumni</li>
            </ul>
        </div>
        <div class="footer-card">
            <h4>Ikuti Kami</h4>
            <div class="socials">
                <a href="#" aria-label="Instagram">IG</a>
                <a href="#" aria-label="YouTube">YT</a>
                <a href="#" aria-label="Facebook">FB</a>
                <a href="#" aria-label="LinkedIn">IN</a>
            </div>
        </div>
        <div class="footer-card">
            <h4>Kolaborasi</h4>
            <div class="footer-partners">
                <span>IPB University</span>
                <span>Sekolah Vokasi</span>
                <span>Program PTB</span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

