<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<header>

    <?php echo $__env->make('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>
<body>
<main class="contents">
    <?php echo e($slot); ?>

</main>

</body>
</html>
<?php /**PATH /home/lovix/Scrivania/Code/Laravel/AppLaravel/resources/views/components/layouts/list-layouts.blade.php ENDPATH**/ ?>