
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

            <table class="table table-light table-bordered">

                    <tr>
                        <thead class="thead-light">
                        <th>ID PDS</th>
                        <th>Reparto</th>
                        <th>numPDS</th>
                        <th>Data PDS</th>
                        <th>Oggetto</th>
                        <th>Capitolo</th>
                        <th>Art</th>
                        <th>Prog</th>
                        <th>IDV</th>
                        <th>Decreto</th>
                        <th>Importo</th>
                        <th>Previsto Impegno</th>
                        <th>Impegnato</th>
                        <th>Contabilizzato</th>

                <?php if(is_object($register)): ?>

                    <?php $__empty_1 = true; $__currentLoopData = $register; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>




                        <tr>
                            <td><?php echo e($reg->id); ?> </td>
                            <td><?php echo e($reg->reparto); ?></td>
                            <td><?php echo e($reg->numpds); ?> </td>
                            <td><?php echo e($reg->datapds); ?> </td>
                            <td><?php echo e($reg->oggetto); ?> </td>
                            <td><?php echo e($reg->capitolo); ?> </td>
                            <td><?php echo e($reg->art); ?> </td>
                            <td><?php echo e($reg->prog); ?> </td>
                            <td><?php echo e($reg->idv); ?> </td>
                            <td><?php echo e($reg->decreto); ?> </td>
                            <td class="importi text-right"><?php echo e($reg->importo); ?> </td>
                            <td class="importi text-right"><?php echo e($reg->previstoimpegno); ?> </td>
                            <td class="importi text-right"><?php echo e($reg->impegnato); ?> </td>
                            <td class="importi text-right"><?php echo e($reg->contabilizzato); ?></td>

                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                 Edit
                                </button></td> </tr>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm" href="<?php echo e(route('reglist')); ?>" >Indietro</a></td>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                <?php endif; ?>

                <form method="post" action="<?php echo e(route('reglist.update',$reg->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                <!-- Modal -->

                   <!-- <input type="hidden" name="_method" value="PATCH"> -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg " >
                        <div class="modal-content px-5 m-2">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifica PDS <?php echo e($reg->numpds); ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo e($reg->id); ?>">
                                <div class="mb-2">
                                    <label for="numpds" class ="form-label">Num PDS</label>
                                    <input type="text" class="form-control" id="numpds" name="numpds" value="<?php echo e($reg->numpds); ?>" >
                                </div>
                                <div class="mb-2">
                                    <label for="numpds" class ="form-label">Num PDS</label>
                                    <input type="text" class="form-control" id="numpds" name="reparto" value="<?php echo e($reg->reparto); ?>" >
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
unset($__errorArgs, $__bag); ?>" id="datapds" name="datapds" value="<?php echo e($reg->datapds); ?>" >
                                </div>
                                <div class="mb-2">
                                    <label for="oggetto" class ="form-label">Oggetto</label>
                                    <input type="text" class="form-control" id="oggetto" name="oggetto" value="<?php echo e($reg->oggetto); ?>" required>
                                </div>
                            </div>

                            <div class="container mt-2 py-2 d-flex justify-start" >
                                <div class="mb-2">
                                    <label for="idcapitolo" class ="form-label">ID Capitolo</label>
                                    <input type="number" class="form-control" id="idcapitolo" name="idcapitolo" value="<?php echo e($reg->idcapitolo); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="capitolo" class ="form-label">Capitolo</label>
                                    <input type="number" class="form-control" id="capitolo" name="capitolo" value="<?php echo e($reg->capitolo); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="art" class ="form-label">Art</label>
                                    <input type="number" class="form-control" id="art" name="art" value="<?php echo e($reg->art); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <label for="prog" class ="form-label">Prog</label>
                                    <input type="number" class="form-control" id="prog" name="prog" value="<?php echo e($reg->prog); ?>" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="idv" class ="form-label">IDV</label>
                                <input type="number" class="form-control" id="idv" name="idv" value="<?php echo e($reg->idv); ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="decreto" class ="form-label">Decreto</label>
                                <input type="text" class="form-control" id="decreto" name="decreto" value="<?php echo e($reg->decreto); ?>" required>
                            </div>
                            <div class="container col-auto d-flex justify-start">
                                <div class="mb-2">
                                    <label for="importo" class ="form-label">Importo</label>
                                    <input type="number" class="form-control text-right" id="importo" name="importo" value="<?php echo e($reg->importo); ?>" min="0" step="0.01" required placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
                                    <input type="number" class="form-control text-right" id="previstoimpegno" name="previstoimpegno" value="<?php echo e($reg->previstoimpegno); ?>" min="0" step="0.01" required placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="impegnato" class ="form-label">Impegnato</label>
                                    <input type="number" class="form-control text-right" id="impegnato" name="impegnato" value="<?php echo e($reg->impegnato); ?>" min="0" step="0.01"  placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="contabilizzato" class ="form-label">Contabilizzato</label>
                                    <input type="number" class="form-control text-right" id="contabilizzato" name="contabilizzato" value="<?php echo e($reg->contabilizzato); ?>" min="0" step="0.01"  placeholder="0,00">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Salva modifiche</button>

                            </div>

                        </div>

                    </div>

                          </div>
                </form>

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





<?php /**PATH D:\AppLaravel\resources\views/pages/modifica.blade.php ENDPATH**/ ?>