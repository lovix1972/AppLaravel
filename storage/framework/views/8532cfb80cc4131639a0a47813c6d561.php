<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<header>

    <?php echo $__env->make('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</header>

<body>
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<main class="contents">
       <?php echo e($slot); ?>

</main>

</body>



</html>
<?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/components/layouts/list-layouts.blade.php ENDPATH**/ ?>