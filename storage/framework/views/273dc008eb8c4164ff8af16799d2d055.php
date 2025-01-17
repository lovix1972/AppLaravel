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
    <div>
            <div class ="mt-5 d-flex py-4" >

                <table class="table table-light table-bordered ">
                   <?php if($register->isempty()): ?>
                        <tr><th>   <p class="text-nowrap text-md-center"> Non ci sono PDS registrati! </p></th>
                  </tr><?php else: ?>
                    <tr>
                        <thead class="thead-light text-nowrap font-serif" style="font-size: 12px">
                        <th>ID PDS</th>
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


                        <th colspan="2" style ="text-align: center"><a href="/inspds"><button class="btn btn-secondary btn-sm" >Acquisisci</button></a></th>

                    </tr>


                    <?php $__empty_1 = true; $__currentLoopData = $register; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-nowrap font-serif" style="font-size: 11px">
                            <td><?php echo e($reg->id); ?> </td>
                            <td><?php echo e($reg->numpds); ?> </td>
                            <td><?php echo e($reg->datapds); ?> </td>
                            <td><?php echo e($reg->oggetto); ?> </td>
                            <td><?php echo e($reg->capitolo); ?> </td>
                            <td><?php echo e($reg->art); ?> </td>
                            <td><?php echo e($reg->prog); ?> </td>
                            <td><?php echo e($reg->idv); ?> </td>
                            <td><?php echo e($reg->decreto); ?> </td>
                            <td style="text-align: right"><?php echo e($reg->importo); ?> </td>
                            <td style="text-align: right"><?php echo e($reg->previstoimpegno); ?> </td>
                            <td style="text-align: right"><?php echo e($reg->impegnato); ?> </td>
                            <td style="text-align: right"><?php echo e($reg->contabilizzato); ?> </td>


                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEdit" data-whatever="Edit">
                                    Modifica</button></a>
                                <form>
                                    <input type="hidden" name="_token" id="_token"  value="<?php echo e(csrf_token()); ?>">
                            <td>
                                <a href="/inspds/<?php echo e($reg->id); ?>"><button class ="btn btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                            </td>
                                </form>
                        </tr>
<!--Modale>-->
                            <!-- Large modal -->

                            <div class="modal fade"  id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" ">
                                    <div class="modal-content py-3 px-3 m-0">

                                        <div class="mb-2" >
                                            <label for="reparto">Reparto</label>
                                            <select class="form-select form-control" id="reparto" name ="reparto"  required>
                                                <option></option>

                                            </select>
                                        </div>
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

                                        <div class="mb-2">
                                            <label for="capitolo" class ="form-label">Capitolo</label>
                                            <input type="number" class="form-control" id="capitolo" name="capitolo" value="<?php echo e(old('capitolo')); ?>" required>
                                        </div>
                                        <div class="mb-sm-2 size-1/2">
                                            <label for="art" class ="form-label">Art</label>
                                            <input type="number" class="form-control" id="art" name="art" value="<?php echo e(old('art')); ?>" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="prog" class ="form-label">Prog</label>
                                            <input type="number" class="form-control" id="prog" name="prog" value="<?php echo e(old('prog')); ?>" required>
                                        </div>

                                        <div class="container col-auto d-flex align-content-between">
                                            <div class="mb-2">
                                                <label for="importo" class ="form-label">Importo</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="importo" name="importo" value="<?php echo e(old('importo')); ?>" min="0" step="0.01" required placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="previstoimpegno" name="previstoimpegno" value="<?php echo e(old('previstoimpegno')); ?>" min="0" step="0.01" required placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="impegnato" class ="form-label">Impegnato</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="impegnato" name="impegnato" value="<?php echo e(old('impegnato')); ?>" min="0" step="0.01"  placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="contabilizzato" class ="form-label">Contabilizzato</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="contabilizzato" name="contabilizzato" value="<?php echo e(old('contabilizzato')); ?>" min="0" step="0.01"  placeholder="0,00">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="note" class ="form-label">Note</label>
                                            <input type="text" class="form-control" id="note" name="note" value="<?php echo e(old('note')); ?>"  placeholder="Note">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <!--End Modal-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <?php endif; ?>
            </div>



    </div>



    <script>
        $(document).ready(function () {
            $('btn-danger').on('click',  function (evt) {

                evt.preventDefault();
                let urlAlbum = $(this).attr('href');
                console.log(this);

                let td = evt.target.parentNode;
console.log(td)
                $.ajax(
                    urlAlbum,
                    {

                    method: 'delete',

                    data: {
                        '_token' : $('#_token').val()
                    },

                    complete: function (resp, status) {
                        if (status !== 'error' && Number(resp.responseText) === 1) {
                            $('td').remove();

                            //td.parentNode.removeChild(td);
                            alert('Record ' + resp.responseText + ' deleted ')
                        } else {
                            console.error(resp.responseText);

                        }
                        //location.reload();
                    }
                });
            });
        });

    </script>
    <script>

    $('#ModalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    console.log(event)
        var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    })
    </script>

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


<?php /**PATH /home/lovix/Scrivania/Code/Laravel/AppLaravel/resources/views/pages/reglist.blade.php ENDPATH**/ ?>