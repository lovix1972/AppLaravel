<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro PDS</title>

    <?php echo $__env->make('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<header>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>

<main class="contents">
    <?php echo e($slot); ?>

</main>

</body>
</html>


</html>
<?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/components/layouts/list-layouts.blade.php ENDPATH**/ ?>