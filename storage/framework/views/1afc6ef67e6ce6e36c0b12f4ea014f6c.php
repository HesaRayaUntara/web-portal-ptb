<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Program Studi PTB'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-body text-textDark font-poppins antialiased">
<div class="flex min-h-screen flex-col">
    <header class="sticky top-0 z-50 bg-white shadow-soft">
        <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <main class="flex-1">
        <div class="mx-auto w-full max-w-content px-6 py-12 md:px-10 lg:px-12 lg:py-16">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <footer class="mt-16 bg-gradient-to-br from-primary to-primaryDark text-white">
        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
</div>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/layouts/main.blade.php ENDPATH**/ ?>