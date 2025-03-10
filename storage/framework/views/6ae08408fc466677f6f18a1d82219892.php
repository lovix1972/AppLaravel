<!doctype html>
<html lang="en">

<?php echo $__env->make('partials.head', ['pageTitle'=>'Registrazione Utenti', 'metaTitle'=>'Registrazione'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

<div class="container mt-3" style="position:relative; top: 5rem">
    <div class="mb-5">
        <h2>Registrazione</h2>
    </div>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session ('success')); ?>

    </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>

        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('registerUser')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3 ">
            <label for="name" class ="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class ="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class ="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo e(old('password')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password-confirmation" class ="form-label">Conferma Password</label>
            <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" value="<?php echo e(old('password-confirmation')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="reparto">Reparto</label>
            <select class="form-select form-control" id="reparto" name ="reparto"  required>
                <option></option>
                <?php $__currentLoopData = $reparti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($r->idreparto); ?> - <?php echo e($r->reparto); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>
            </select>

        </div>
        <button type="submit" class ="btn btn-primary">Registrati</button>
        <a href="/login" class="btn"> Chiudi</a>
    </form>

</div>
</body>
</html>
<?php /**PATH D:\AppLaravel\resources\views/pages/register.blade.php ENDPATH**/ ?>