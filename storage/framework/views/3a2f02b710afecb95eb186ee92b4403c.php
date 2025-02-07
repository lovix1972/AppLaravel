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

<div class ="card mt-3 d-flex py-4 px-4 justify-center" >
    <form class="was-validate" action="<?php echo e(route('InsertPds')); ?>" method="POST">
        <?php echo csrf_field(); ?>


        <div class="mb-2" >

            <label for="idreparto">Id Reparto</label>
            <select class="form-select form-control" id="idreparto" name ="idreparto"  >
                <option></option>
                <?php $__currentLoopData = $reparti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reparto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value ="<?php echo e($reparto->id); ?>"><?php echo e($reparto->id); ?> - <?php echo e($reparto->reparto); ?></option>
            </select>


            </div>
        <div class="mb-2">
            <label for="reparto" class ="form-label">Reparto</label>
            <input type="text" class="form-control" id="reparto" name="reparto" value="<?php echo e(old('reparto')); ?>"" >
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <div class="mb-2">
            <label for="numpds" class ="form-label">Num PDS</label>
            <input type="text" class="form-control" id="numpds" name="numpds" value="<?php echo e(old('numpds')); ?>" >
        </div>
       <div class="mb-2">
            <label for="datapds" class ="form-label">Data PDS</label>
            <input type="date" class="form-control datepicker <?php $__errorArgs = ['datapds'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-valid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="datapds" name="datapds" value="<?php echo e(old('datapds')); ?>" >
        </div>
        <div class="mb-2">
            <label for="oggetto" class ="form-label">Oggetto</label>
            <input type="text" class="form-control" id="oggetto" name="oggetto" value="<?php echo e(old('oggetto')); ?>" required>
        </div>
        <div class="flex-initial inline-flex" >
        <div class="mb-2">
            <label for="idcapitolo" class ="form-label">ID Capitolo</label>
            <select class="form-select form-control" id="idcapitolo" name ="idcapitolo"  >
                <option></option>
                <?php $__currentLoopData = $capitoli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capitolo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($capitolo->idcapitolo); ?>"><?php echo e($capitolo->idcapitolo); ?> - <?php echo e($capitolo->capitolo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-2">
            <label for="capitolo" class ="form-label">Capitolo</label>
            <input type="number" class="form-control" id="capitolo" name="capitolo" value="<?php echo e(old('capitolo')); ?>" required>
        </div>
        <div class="mb-2">
            <label for="art" class ="form-label">Art</label>
            <input type="number" class="form-control" id="art" name="art" value="<?php echo e(old('art')); ?>" required>
        </div>
        <div class="mb-2">
            <label for="prog" class ="form-label">Prog</label>
            <input type="number" class="form-control" id="prog" name="prog" value="<?php echo e(old('prog')); ?>" required>
        </div>

        <div class="mb-2">
            <label for="idv" class ="form-label">IDV</label>
            <input type="number" class="form-control" id="idv" name="idv" value="<?php echo e(old('idv')); ?>" required>
        </div>
        <div class="mb-2">
            <label for="decreto" class ="form-label">Decreto</label>
            <input type="text" class="form-control" id="decreto" name="decreto" value="<?php echo e(old('decreto')); ?>" required>
        </div>
        </div>
        <div class="container col-auto d-flex justify-start">
        <div class="mb-2">
            <label for="importo" class ="form-label">Importo</label>
            <input type="number" class="form-control text-sm-right" id="importo" name="importo" value="<?php echo e(old('importo')); ?>" min="0" step="0.01" required placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
            <input type="number" class="form-control text-sm-right" id="previstoimpegno" name="previstoimpegno" value="<?php echo e(old('previstoimpegno')); ?>" min="0" step="0.01" required placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="impegnato" class ="form-label">Impegnato</label>
            <input type="number" class="form-control text-sm-right" id="impegnato" name="impegnato" value="<?php echo e(old('impegnato')); ?>" min="0" step="0.01"  placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="contabilizzato" class ="form-label">Contabilizzato</label>
            <input type="number" class="form-control text-sm-right" id="contabilizzato" name="contabilizzato" value="<?php echo e(old('contabilizzato')); ?>" min="0" step="0.01"  placeholder="0,00">
        </div>


    </div>

        <div class="mb-2">
            <label for="note" class ="form-label">Note</label>
            <input type="text" class="form-control" id="note" name="note" value="<?php echo e(old('note')); ?>"  placeholder="Note">
        </div>
        <div class="mb-2">
            <input type="file" class="form-control text-sm" id="doc_file" name="doc_file">
        </div>
        <button type="submit" class ="btn btn-primary">Registra</button>
        <a href="/home" class="btn"> Chiudi</a>
    </form>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaladc6145a31351c810932a94303674642)): ?>
<?php $attributes = $__attributesOriginaladc6145a31351c810932a94303674642; ?>
<?php unset($__attributesOriginaladc6145a31351c810932a94303674642); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladc6145a31351c810932a94303674642)): ?>
<?php $component = $__componentOriginaladc6145a31351c810932a94303674642; ?>
<?php unset($__componentOriginaladc6145a31351c810932a94303674642); ?>
<?php endif; ?><?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/pages/inspds.blade.php ENDPATH**/ ?>