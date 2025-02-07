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
<div class="font-sans py-1" style ="text-align: center">
    <div class=" mx-auto">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png/190px-CoA_mil_ITA_airmobile_bde_Friuli.png" alt="" width="50" height="55">
    </div>

    <p><h4>BRIGATA AEROMOBILE FRIULI</h4></p>
    <p>Gestione Contabile Amminstrativa</p>
</div>
</body>
</html>
<?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/pages/home.blade.php ENDPATH**/ ?>