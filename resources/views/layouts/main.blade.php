<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Program Studi PTB')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #006837;
            --primary-dark: #055631;
            --primary-light: #23905a;
            --secondary: #1a7431;
            --accent: #f4f9f1;
            --text-dark: #1c2a28;
            --text-muted: #6a7d76;
            --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.08);
            --radius-lg: 20px;
            --radius-md: 16px;
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

        img {
            display: block;
            width: 100%;
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

        .logo strong {
            display: block;
            font-size: 18px;
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
            display: inline-block;
            padding: 8px 0;
        }

        nav a:hover {
            color: var(--primary);
        }

        nav .active {
            color: var(--primary);
            font-weight: 600;
        }

        .language-select {
            position: relative;
        }

        .language-select button {
            border: 1px solid #d7ded7;
            border-radius: var(--radius-sm);
            padding: 6px 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            background: #fff;
            cursor: pointer;
        }

        .language-select button:hover,
        .language-select button:focus {
            border-color: var(--primary);
            color: var(--primary);
            outline: none;
        }

        .language-dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background: #fff;
            border: 1px solid #d7ded7;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-sm);
            display: none;
            flex-direction: column;
            min-width: 120px;
            padding: 6px;
            z-index: 20;
        }

        .language-dropdown a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .language-dropdown a:hover,
        .language-dropdown a.active {
            background: rgba(12, 139, 76, 0.12);
            color: var(--primary);
        }

        .language-select:hover .language-dropdown,
        .language-select:focus-within .language-dropdown {
            display: flex;
        }

        .flag-icon {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            line-height: 1;
        }

        .language-select button .chevron {
            margin-left: 2px;
        }

        main {
            max-width: 1180px;
            margin: 0 auto;
            padding: 48px 24px 72px;
        }

        .page-hero {
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            background: linear-gradient(135deg, rgba(5, 86, 49, 0.92), rgba(12, 139, 76, 0.88));
            color: #fff;
            box-shadow: var(--shadow-sm);
        }

        .page-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0.35;
            background-image: var(--hero-image, none);
        }

        .page-hero .overlay {
            position: relative;
            padding: 40px;
        }

        .hero-title {
            margin: 0;
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .hero-subtitle {
            margin-top: 12px;
            font-size: 17px;
            max-width: 520px;
        }

        .section-card {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 36px;
            margin-top: 42px;
            box-shadow: var(--shadow-sm);
        }

        .section-header {
            margin: 0 0 18px;
            font-size: 26px;
            color: var(--secondary);
            letter-spacing: 0.4px;
        }

        .section-kicker {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: rgba(12, 139, 76, 0.8);
            font-weight: 600;
        }

        .features-section {
            display: grid;
            gap: 32px;
        }

        .features-header {
            display: grid;
            gap: 22px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            align-items: center;
        }

        .features-title h2 {
            margin: 6px 0 14px;
            font-size: 32px;
            color: var(--text-dark);
            position: relative;
            display: inline-block;
        }

        .features-title h2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 120px;
            height: 6px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--primary), rgba(12, 139, 76, 0.2));
        }

        .features-title p {
            margin: 0;
            color: var(--text-muted);
            max-width: 520px;
        }

        .features-image img {
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            height: 100%;
            object-fit: cover;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: var(--accent);
            border-radius: var(--radius-md);
            padding: 20px 24px;
            border: 1px solid rgba(12, 139, 76, 0.12);
        }

        .feature-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #fff;
            display: grid;
            place-items: center;
            font-size: 24px;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .feature-text h3 {
            margin: 0 0 8px;
            font-size: 18px;
            color: var(--text-dark);
        }

        .feature-text p {
            margin: 0;
            font-size: 14px;
            color: var(--text-muted);
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

        .news-grid,
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 26px;
        }

        .news-card,
        .gallery-card {
            background: #fff;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .news-card:hover,
        .gallery-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12);
        }

        .news-card img,
        .gallery-card img {
            height: 160px;
            object-fit: cover;
        }

        .card-body {
            padding: 18px 20px 24px;
        }

        .card-body h3 {
            margin: 0 0 12px;
            font-size: 18px;
        }

        .card-body p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .profile-wrapper {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 28px;
            align-items: center;
        }

        .profile-photo {
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .profile-info h2 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .profile-info span {
            display: inline-block;
            margin-bottom: 18px;
            padding: 6px 14px;
            border-radius: 999px;
            background: rgba(12, 139, 76, 0.12);
            color: var(--primary);
            font-weight: 600;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }

        .info-badge {
            background: var(--accent);
            border-radius: var(--radius-sm);
            padding: 16px;
            border: 1px solid rgba(0, 104, 55, 0.12);
        }

        table.dosen-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            font-size: 15px;
        }

        table.dosen-table th,
        table.dosen-table td {
            padding: 14px;
            border: 1px solid #e0e7df;
            text-align: left;
        }

        table.dosen-table th {
            background: #f6fbf4;
            color: var(--primary);
            font-weight: 600;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 20px;
        }

        .btn {
            font-weight: 600;
            font-size: 15px;
            border-radius: var(--radius-sm);
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-light {
            background: #fff;
            color: var(--primary);
            border: 2px solid rgba(12, 139, 76, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(12, 139, 76, 0.18);
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

        @media (max-width: 992px) {
            .profile-wrapper {
                grid-template-columns: 1fr;
            }
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

            main {
                padding: 36px 18px 60px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<header>
    @include('partials.navbar')
</header>
<main>
    @yield('content')
</main>
<footer>
    @include('partials.footer')
</footer>
@stack('scripts')
</body>
</html>
