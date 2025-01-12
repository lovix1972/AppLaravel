
<?php if (isset($component)) { $__componentOriginaladc6145a31351c810932a94303674642 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaladc6145a31351c810932a94303674642 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.list-layouts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.list-layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php echo $__env->make('partials.head', ['pageTitle'=>'Lista Utenti', 'metaTitle'=>'Lista Utenti'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

    <div class ="mt-5" >
            <table class="table table-light table-bordered">

            <?php if($users->isempty()): ?>
                <p> Non ci sono utenti registrati! <a href ="/register"><br><button class="btn btn-primary>"> Registra Utente  </button></a></p>
            <?php else: ?>
                <tr>


            <thead class="thead-light">
            <th>ID Utente</th>
            <th>Nome</th>
            <th>email</th>
            <th>password</th>
            <th>data creazione</th>
            <th>data update</th>
            <th><a href="/register"><button class="btn btn-secondary" >Inserisci Utente</button></a></th>
            </tr>

    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?> </td>
                <td><?php echo e($user->name); ?> </td>
                <td><?php echo e($user->email); ?> </td>
                <td><?php echo e($user->password); ?> </td>
                <td><?php echo e($user->created_at); ?> </td>
                <td><?php echo e($user->updated_at); ?></td>
                <td><button class="btn btn-primary" >Modifica</button>
                <a href="utenti/<?php echo e($user['id']); ?>"><button class ="btn btn-danger" title="delete" data-toggle="tooltip">Delete</button></a></td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td>Record: <?php echo e($user->count()); ?></td>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaladc6145a31351c810932a94303674642)): ?>
<?php $attributes = $__attributesOriginaladc6145a31351c810932a94303674642; ?>
<?php unset($__attributesOriginaladc6145a31351c810932a94303674642); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladc6145a31351c810932a94303674642)): ?>
<?php $component = $__componentOriginaladc6145a31351c810932a94303674642; ?>
<?php unset($__componentOriginaladc6145a31351c810932a94303674642); ?>
<?php endif; ?>
</div>
<?php endif; ?>

<?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/pages/userlist.blade.php ENDPATH**/ ?>