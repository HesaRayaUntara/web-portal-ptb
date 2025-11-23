<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri 360° - Program Studi PTB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #pannellum-container {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="pannellum-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script>
        pannellum.viewer('pannellum-container', {
            "type": "equirectangular",
            "panorama": "<?php echo e(asset('gambar/rk01.jpg')); ?>",
            "autoLoad": true,
            "compass": true,
            "hfov": 100
        });
    </script>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/pages/galeri-360.blade.php ENDPATH**/ ?>