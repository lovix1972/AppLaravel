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


            <div class ="mt-5" >

                <table class="table table-light table-bordered">
                    <tr>
                        <thead class="thead-light">
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
<th>                   <a href="/inspds"><button class="btn btn-secondary btn-sm" >Acquisisci</button></a></th> </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $register; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($reg->id); ?> </td>
                            <td><?php echo e($reg->numpds); ?> </td>
                            <td><?php echo e($reg->datapds); ?> </td>
                            <td><?php echo e($reg->oggetto); ?> </td>
                            <td><?php echo e($reg->capitolo); ?> </td>
                            <td><?php echo e($reg->art); ?> </td>
                            <td><?php echo e($reg->prog); ?> </td>
                            <td><?php echo e($reg->idv); ?> </td>
                            <td><?php echo e($reg->decreto); ?> </td>
                            <td><?php echo e($reg->importo); ?> </td>
                            <td><?php echo e($reg->previstoimpegno); ?> </td>
                            <td><?php echo e($reg->impegnato); ?> </td>
                            <td><?php echo e($reg->contabilizzato); ?> </td>


                            <td><a href="/reglist/<?php echo e($reg->id); ?>"><button class="btn btn-primary btn-sm" >Modifica</button></a>
                                <form>
                                    <input type="hidden" name="_token" id="_token"  value="<?php echo e(csrf_token()); ?>">
                            <td><a href="/inspds/<?php echo e($reg->id); ?>"><button class ="btn btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                            </td>
                                </form>

                        </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>



    </div>
    <script>
        $(document).ready(function () {
            $('td').on('click',  'a','button-danger', function (evt) {

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
//location.reload();
                            //td.parentNode.removeChild(td);
                            alert('Record ' + resp.responseText + ' deleted ')
                        } else {
                            console.error(resp.responseText);

                        }

                    }
                });
            });
        });

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