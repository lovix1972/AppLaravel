<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <?php echo $__env->make('partials.head', ['pageTitle'=>'Login', 'metaTitle'=>'Login'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Lovicu Pasquale">

    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Favicons -->

    <meta name="theme-color" content="#712cf9">


</head>


<body style="background-color: darkslategray; ">

<div class="card d-flex " style="width: 25rem; margin: 0 auto; align-self: center; position: relative; top: 10rem">


    <form action="<?php echo e(route('loginUser')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <h1 class="h3 mb-3 fw-normal py-2 px-2 pt-2 pb-2 m-1">Login</h1>

        <div class="form-floating" >
            <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo e(old('email')); ?>" placeholder="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="Password" name ="password" value="<?php echo e(old('password')); ?>" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">

            <select class="form-select form-control" id="reparto" name ="reparto" placeholder="Reparto">
                <option></option>
                <?php $__currentLoopData = $reparti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($r->idreparto); ?> - <?php echo e($r->reparto); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>
            </select>
            <label for="reparto">Reparto</label>
        </div>
        <?php if($errors ->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php echo e($error); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session ('success')); ?>

            </div>
        <?php endif; ?>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Entra</button>
        <div>

            <p class="mb-0 text-center">Non hai accesso? <a href="/register" class="text-blue-50 fw-bold">Registrati</a>
            </p>
        </div>
        <p class="mt-5 mb-3 text-center">&copy; 2025</p>
    </form>
    </div>


</body>
</html>
<?php /**PATH /home/lovix/Scrivania/Code/Laravel/AppLaravel/resources/views/pages/login.blade.php ENDPATH**/ ?>