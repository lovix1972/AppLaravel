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

    <div class="bg-gray-100 min-h-screen py-6">
        <div class="container max-w-3xl mx-auto space-y-6">
            <form action="" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">Dati Genereali PDS e Protocollo</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label for="id_pds" class="block text-gray-700 text-sm font-bold mb-2">ID PDS</label>
                            <input type="text" id="id_pds" name="id_pds" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="numpds" class="block text-gray-700 text-sm font-bold mb-2">N. PDS</label>
                            <input type="text" id="numpds" name="numpds" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="datapds" class="block text-gray-700 text-sm font-bold mb-2">Data PDS</label>
                            <input type="date" id="datapds" name="datapds" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="n_protocollo" class="block text-gray-700 text-sm font-bold mb-2">N. Protocollo</label>
                            <input type="text" id="n_protocollo" name="n_protocollo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Informazioni Reparto e Oggetto</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">



                        <label for="id_reparto">Id Reparto</label>
                        <select class="form-select form-control" id="id_reparto" name ="id_reparto"  required>
                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($d->idreparto); ?> - <?php echo e($d->reparto); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>


                        <div>
                            <label for="reparto" class="block text-gray-700 text-sm font-bold mb-2">Reparto</label>
                            <input type="text" id="reparto" name="reparto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                        <div class="col-span-2">
                            <label for="oggetto" class="block text-gray-700 text-sm font-bold mb-2">Oggetto</label>
                            <textarea id="oggetto" name="oggetto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Dettagli Aggiuntivi e Importi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>


                            <label for="idcapitolo" class="block text-gray-700 text-sm font-medium mb-2">ID Capitolo:</label>
                            <select id="idcapitolo" name="idcapitolo"
                                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-800
                                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">

                                <?php $__currentLoopData = $capitoli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capitoloItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="" disabled selected>Seleziona un Capitolo</option>
                                <option></option>
                                    <option value="<?php echo e($capitoloItem->idcapitolo); ?>" <?php echo e(old('idcapitolo') == $capitoloItem->idcapitolo ?  : ''); ?>>
                                        <?php echo e($capitoloItem->idcapitolo ?? 'N/A'); ?> - <?php echo e($capitoloItem->capitolo ?? 'N/A'); ?>/<?php echo e($capitoloItem->art ?? 'N/A'); ?>/<?php echo e($capitoloItem->prog ?? 'N/A'); ?> - <?php echo e($capitoloItem->idv ?? 'N/A'); ?> - <?php echo e($capitoloItem->decreto ?? 'N/A'); ?> <?php echo e($capitoloItem->idreparto ?? 'N/A'); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div>
                            <label for="capitolo" class="block text-gray-700 text-sm font-bold mb-2">Capitolo</label>
                            <input type="text" id="capitolo" name="capitolo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="art" class="block text-gray-700 text-sm font-bold mb-2">Art.</label>
                            <input type="text" id="art" name="art" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="prog" class="block text-gray-700 text-sm font-bold mb-2">Prog.</label>
                            <input type="text" id="prog" name="prog" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="idv" class="block text-gray-700 text-sm font-bold mb-2">IDV</label>
                            <input type="text" id="idv" name="idv" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="decreto" class="block text-gray-700 text-sm font-bold mb-2">Decreto</label>
                            <input type="text" id="decreto" name="decreto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="ops" class="block text-gray-700 text-sm font-bold mb-2">OPS2</label>
                            <input type="text" id="ops" name="ops" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="col-span-full">
                            <label for="descrizione" class="block text-gray-700 text-sm font-bold mb-2">Descrizione</label>
                            <textarea id="descrizione" name="descrizione" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                        <div>
                            <label for="pdc" class="block text-gray-700 text-sm font-bold mb-2">PDC</label>
                            <input type="text" id="pdc" name="pdc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="importo" class="block text-gray-700 text-sm font-bold mb-2">Importo</label>
                            <input type="number" step="0.01" min="0" id="importo" name="importo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="previstoimpegno" class="block text-gray-700 text-sm font-bold mb-2">Previsto Impegno</label>
                            <input type="number" step="0.01" min="0" id="previstoimpegno" name="previstoimpegno" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="impegnato"  class="block text-gray-700 text-sm font-bold mb-2">Impegnato</label>
                            <input type="number" step="0.01" min="0" id="impegnato" name="impegnato" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="contabilizzato"  class="block text-gray-700 text-sm font-bold mb-2">Contabilizzato</label>
                            <input type="number" step="0.01" min="0" id="contabilizzato" name="contabilizzato" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="note" class="block text-gray-700 text-sm font-bold mb-2">Note</label>
                            <input type="text" id="note" name="note" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Salva
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> 

    <script>
        // Passa i dati dei capitoli dal backend al frontend come JSON
        let capitoliData = <?php echo json_encode($capitoli->keyBy('idcapitolo'), 15, 512) ?>;

        document.addEventListener('DOMContentLoaded', function() {
            let idCapitoloSelect = document.getElementById('idcapitolo');
            let capitoloInput = document.getElementById('capitolo');
            let artInput = document.getElementById('art');
            let progInput = document.getElementById('prog');
            let idvInput = document.getElementById('idv');
            let decretoInput = document.getElementById('decreto');
            let opsInput = document.getElementById('ops');

            // Funzione per popolare i campi
            function populateCapitoloFields() {
                let selectedId = idCapitoloSelect.value;
                let selectedCapitolo = capitoliData[selectedId];

                if (selectedCapitolo) {
                    capitoloInput.value = selectedCapitolo.capitolo || '';
                    artInput.value = selectedCapitolo.art || '';
                    progInput.value = selectedCapitolo.prog || '';
                    idvInput.value = selectedCapitolo.idv || '';
                    decretoInput.value = selectedCapitolo.decreto || '';
                    opsInput.value = selectedCapitolo.ops || '';
                } else {
                    // Pulisci i campi se non c'è una selezione valida o se l'opzione "Seleziona un Capitolo" è selezionata
                    capitoloInput.value = '';
                    artInput.value = '';
                    progInput.value = '';
                    idvInput.value = '';
                    decretoInput.value = '';
                    opsInput.value = '';

                }
            }

            // Aggiungi l'event listener per il cambiamento della selezione
            idCapitoloSelect.addEventListener('change', populateCapitoloFields);

            // Se c'è un valore 'old' (es. dopo un errore di validazione), popola i campi all'avvio
            if (idCapitoloSelect.value) {
                populateCapitoloFields();
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the input fields
            let valoreProgettoInput = document.getElementById('importo');
            let previstoImpegnoInput = document.getElementById('previstoimpegno');
            let impegnatoInput = document.getElementById('impegnato');
            let contabilizzatoInput = document.getElementById('contabilizzato');
            // Add an event listener for the 'change' event on the 'valore_progetto' field
            valoreProgettoInput.addEventListener('change', function() {
                // When the 'valore_progetto' field changes, update 'previsto_impegno'
                previstoImpegnoInput.value = parseFloat(this.value);
                impegnatoInput.value = 0.00;
                contabilizzatoInput.value = 0.00;
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
<?php endif; ?><?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/pages/inspds.blade.php ENDPATH**/ ?>