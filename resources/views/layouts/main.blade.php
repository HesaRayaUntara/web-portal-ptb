<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Program Studi PTB')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-body text-textDark font-poppins antialiased">
<div class="flex min-h-screen flex-col">
    <header class="sticky top-0 z-50 bg-white shadow-soft">
        @include('partials.navbar')
    </header>

    <main class="flex-1">
        <div class="mx-auto w-full max-w-content px-6 py-12 md:px-10 lg:px-12 lg:py-16">
            @yield('content')
        </div>
    </main>

    <footer class="mt-16 bg-gradient-to-br from-primary to-primaryDark text-white">
        @include('partials.footer')
    </footer>
</div>
@stack('scripts')
</body>
</html>