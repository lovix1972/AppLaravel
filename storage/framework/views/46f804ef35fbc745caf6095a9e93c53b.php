<!doctype html>
<html lang="en">
<?php echo $__env->make('partials.head', ['pageTitle'=>'HomePage', 'metaTitle'=>'HomePage'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

    <?php else: ?>
        <?php echo e(session('session_destroy')); ?>

    <?php endif; ?>
</div>

</body>
</html>
<?php /**PATH /home/lovix/Scrivania/Code/Laravel/AppLaravel/resources/views/pages/home.blade.php ENDPATH**/ ?>