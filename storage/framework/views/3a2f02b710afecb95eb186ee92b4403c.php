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
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Successo!</strong>
            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Errore!</strong>
            <ul class="mt-2 list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="bg-gray-100 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto max-w-7xl space-y-8">
            <h1 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Gestione PDS e Protocolli</h1>

            <form action="" method="POST" class="space-y-8">
                <?php echo csrf_field(); ?>

                <div class="flex flex-wrap -mx-4">

                    <div class="w-full lg:w-1/2 px-4 mb-8">
                        
                        <div class="bg-white shadow-xl rounded-lg p-7 h-full text-sm">
                            <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Dati Generali PDS e Protocollo</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <label for="id_pds" class="block text-gray-700 font-medium mb-1">ID PDS</label>
                                    <input type="text" id="id_pds" name="id_pds" value="<?php echo e(old('id_pds')); ?>"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="numpds" class="block text-gray-700 font-medium mb-1">N. PDS</label>
                                    <input type="text" id="numpds" name="numpds" value="<?php echo e(old('numpds')); ?>"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="datapds" class="block text-gray-700 font-medium mb-1">Data PDS</label>
                                    <input type="date" id="datapds" name="datapds" value="<?php echo e(old('datapds')); ?>"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="n_protocollo" class="block text-gray-700 font-medium mb-1">N. Protocollo</label>
                                    <input type="text" id="n_protocollo" name="n_protocollo" value="<?php echo e(old('n_protocollo')); ?>"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 px-4 mb-8">
                        
                        <div class="bg-white shadow-xl rounded-lg p-7 h-full text-sm">
                            <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Informazioni Reparto e Oggetto</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <label for="idreparto" class="block text-gray-700 font-medium mb-1">Id Reparto</label>
                                    <select id="idreparto" name="idreparto" required
                                            class="form-select block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                        <option value="" disabled selected>Seleziona un Reparto</option>
                                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($d->idreparto); ?>" <?php echo e(old('idreparto') == $d->idreparto ? 'selected' : ''); ?>>
                                                <?php echo e($d->idreparto); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="reparto" class="block text-gray-700 font-medium mb-1">Reparto</label>
                                    <input type="text" id="reparto" name="reparto" value="<?php echo e(old('reparto')); ?>"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="oggetto" class="block text-gray-700 font-medium mb-1">Oggetto</label>
                                    <textarea id="oggetto" name="oggetto" rows="4"
                                              class="form-textarea block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm"><?php echo e(old('oggetto')); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="bg-white shadow-xl rounded-lg p-7 text-sm">
                    <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Dettagli Aggiuntivi e Importi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <div>
                            <label for="idcapitolo" class="block text-gray-700 font-medium mb-1">ID Capitolo:</label>
                            <select id="idcapitolo" name="idcapitolo"
                                    class="form-select block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                <option value="" disabled selected>Seleziona un Capitolo</option>
                                
                            </select>
                        </div>
                        <div>
                            <label for="capitolo" class="block text-gray-700 font-medium mb-1">Capitolo</label>
                            <input type="text" id="capitolo" name="capitolo" value="<?php echo e(old('capitolo')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="art" class="block text-gray-700 font-medium mb-1">Art.</label>
                            <input type="text" id="art" name="art" value="<?php echo e(old('art')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="prog" class="block text-gray-700 font-medium mb-1">Prog.</label>
                            <input type="text" id="prog" name="prog" value="<?php echo e(old('prog')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="idv" class="block text-gray-700 font-medium mb-1">IDV</label>
                            <input type="text" id="idv" name="idv" value="<?php echo e(old('idv')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="decreto" class="block text-gray-700 font-medium mb-1">Decreto</label>
                            <input type="text" id="decreto" name="decreto" value="<?php echo e(old('decreto')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="ops" class="block text-gray-700 font-medium mb-1">OPS2</label>
                            <input type="text" id="ops" name="ops" value="<?php echo e(old('ops')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="descrizione" class="block text-gray-700 font-medium mb-1">Descrizione</label>
                            <input type="text" id="descrizione" name="descrizione" value="<?php echo e(old('descrizione')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>


                        <div>
                            <label for="pdc" class="block text-gray-700 font-medium mb-1">PDC</label>
                            <input type="text" id="pdc" name="pdc" value="<?php echo e(old('pdc')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="importo" class="block text-gray-700 font-medium mb-1">Importo</label>
                            <input type="number" step="0.01" min="0" id="importo" name="importo" value="<?php echo e(old('importo')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="previstoimpegno" class="block text-gray-700 font-medium mb-1">Previsto Impegno</label>
                            <input type="number" step="0.01" min="0" id="previstoimpegno" name="previstoimpegno" value="<?php echo e(old('previstoimpegno')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="impegnato_valore" class="block text-gray-700 font-medium mb-1">Impegnato</label>
                            <input type="number" step="0.01" min="0" id="impegnato_valore" name="impegnato_valore" value="<?php echo e(old('impegnato_valore')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="contabilizzato_valore" class="block text-gray-700 font-medium mb-1">Contabilizzato</label>
                            <input type="number" step="0.01" min="0" id="contabilizzato_valore" name="contabilizzato_valore" value="<?php echo e(old('contabilizzato_valore')); ?>"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>

                        
                        <div class="md:col-span-2 lg:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 pt-4 border-t mt-4">
                            <div class="flex items-center">
                                <input type="hidden" name="registrato" value="0"> 
                                <input type="checkbox" id="registrato" name="registrato" value="1" <?php echo e(old('registrato') ? 'checked' : ''); ?>

                                class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="registrato" class="ml-2 block text-gray-700 font-medium">Registrato</label>
                            </div>
                            <div class="flex items-center">
                                <input type="hidden" name="impegnato_flag" value="0"> 
                                <input type="checkbox" id="impegnato_flag" name="impegnato_flag" value="1" <?php echo e(old('impegnato_flag') ? 'checked' : ''); ?>

                                class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="impegnato_flag" class="ml-2 block text-gray-700 font-medium">Impegnato</label>
                            </div>
                            <div class="flex items-center">
                                <input type="hidden" name="validato" value="0"> 
                                <input type="checkbox" id="validato" name="validato" value="1" <?php echo e(old('validato') ? 'checked' : ''); ?>

                                class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="validato" class="ml-2 block text-gray-700 font-medium">Validato</label>
                            </div>
                        </div>

                        <div class="md:col-span-2 lg:col-span-3">
                            <label for="note" class="block text-gray-700 font-medium mb-1">Note</label>
                            <textarea id="note" name="note" rows="4"
                                      class="form-textarea block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm" ><?php echo e(old('note')); ?></textarea>
                        </div>

                    </div>
                    <div class="flex justify-end mt-8">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition duration-200 ease-in-out">
                            Salva Dati
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Riferimenti agli elementi HTML
            const idRepartoSelect = document.getElementById('idreparto');
            const repartoInput = document.getElementById('reparto');
            const idCapitoloSelect = document.getElementById('idcapitolo');

            // Campi di input da popolare dal capitolo selezionato
            const capitoloInput = document.getElementById('capitolo');
            const artInput = document.getElementById('art');
            const progInput = document.getElementById('prog');
            const idvInput = document.getElementById('idv');
            const decretoInput = document.getElementById('decreto');
            const opsInput = document.getElementById('ops');
            const descrizioneInput = document.getElementById('descrizione');
            const noteTextarea = document.getElementById('note');

            // Campi importo (rinominati per evitare conflitti con i flag)
            const importoInput = document.getElementById('importo');
            const previstoImpegnoInput = document.getElementById('previstoimpegno');
            const impegnatoValoreInput = document.getElementById('impegnato_valore');
            const contabilizzatoValoreInput = document.getElementById('contabilizzato_valore');

            // Nuovi campi checkbox
            const registratoCheckbox = document.getElementById('registrato');
            const impegnatoFlagCheckbox = document.getElementById('impegnato_flag');
            const validatoCheckbox = document.getElementById('validato');


            // Mappa per i Reparti
            const departments = {};
            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                departments[<?php echo e($d->idreparto); ?>] = {
                idreparto: <?php echo e($d->idreparto); ?>,
                reparto: "<?php echo e(addslashes($d->reparto)); ?>"
            };
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            // Variabile per memorizzare temporaneamente i dati dei capitoli caricati
            let loadedCapitoliData = {};

            // --- Funzioni di Utilità ---

            function updateRepartoField() {
                const selectedId = idRepartoSelect.value;
                const departmentData = departments[selectedId];
                if (departmentData) {
                    repartoInput.value = departmentData.reparto;
                } else {
                    repartoInput.value = '';
                }
            }

            function loadCapitoli(idReparto) {
                idCapitoloSelect.innerHTML = '<option value="" disabled selected>Caricamento Capitoli...</option>';
                idCapitoloSelect.disabled = true;
                clearCapitoloFields();

                if (!idReparto) {
                    idCapitoloSelect.innerHTML = '<option value="" disabled selected>Seleziona prima un Reparto</option>';
                    idCapitoloSelect.disabled = false;
                    return;
                }

                fetch(`/get-capitoli-by-reparto?idreparto=${idReparto}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        loadedCapitoliData = {};
                        idCapitoloSelect.innerHTML = '<option value="" disabled selected>Seleziona un Capitolo</option>';

                        data.forEach(capitolo => {
                            loadedCapitoliData[capitolo.idcapitolo] = capitolo;

                            const option = document.createElement('option');
                            option.value = capitolo.idcapitolo;
                            option.textContent = `${capitolo.idcapitolo || 'N/A'} - ${capitolo.capitolo || 'N/A'}/${capitolo.art || 'N/A'}/${capitolo.prog || 'N/A'} - ${capitolo.idv || 'N/A'} - ${capitolo.decreto || 'N/A'}`;

                            if ("<?php echo e(old('idcapitolo')); ?>" === String(capitolo.idcapitolo)) {
                                option.selected = true;
                            }
                            idCapitoloSelect.appendChild(option);
                        });
                        idCapitoloSelect.disabled = false;

                        if (idCapitoloSelect.value) {
                            populateCapitoloFields(idCapitoloSelect.value);
                        }

                    })
                    .catch(error => {
                        console.error('Errore durante il recupero dei capitoli:', error);
                        idCapitoloSelect.innerHTML = '<option value="" disabled selected>Errore nel caricamento dei Capitoli</option>';
                        idCapitoloSelect.disabled = true;
                        clearCapitoloFields();
                    });
            }

            function populateCapitoloFields(idCapitolo) {
                const selectedCapitolo = loadedCapitoliData[idCapitolo];
                if (selectedCapitolo) {
                    capitoloInput.value = selectedCapitolo.capitolo || '';
                    artInput.value = selectedCapitolo.art || '';
                    progInput.value = selectedCapitolo.prog || '';
                    idvInput.value = selectedCapitolo.idv || '';
                    decretoInput.value = selectedCapitolo.decreto || '';
                    opsInput.value = selectedCapitolo.ops || '';
                    descrizioneInput.value = selectedCapitolo.Descrizione || '';
                } else {
                    clearCapitoloFields();
                }
            }

            function clearCapitoloFields() {
                capitoloInput.value = '';
                artInput.value = '';
                progInput.value = '';
                idvInput.value = '';
                decretoInput.value = '';
                opsInput.value = '';
                descrizioneInput.value = '';
            }

            // Modificata: Questa funzione ora gestisce solo la formattazione e la logica della spunta
            function handleImportoBlurAndFormat() {
                const importoValue = parseFloat(importoInput.value) || 0;

                // Formatta il numero a due decimali
                importoInput.value = importoValue.toFixed(2);

                // Aggiorna previstoimpegno
                previstoImpegnoInput.value = importoValue.toFixed(2);
                impegnatoValoreInput.value = (0.00).toFixed(2);
                contabilizzatoValoreInput.value = (0.00).toFixed(2);

                // Gestisci la spunta del checkbox 'Registrato' solo al blur
                if (importoValue > 1) {
                    registratoCheckbox.checked = true;
                } else {
                    registratoCheckbox.checked = false;
                }
            }

            function formatNumberToTwoDecimals(event) {
                const value = parseFloat(event.target.value) || 0;
                event.target.value = value.toFixed(2);
            }

            // --- Gestori Eventi ---

            idRepartoSelect.addEventListener('change', function() {
                updateRepartoField();
                loadCapitoli(this.value);
            });

            idCapitoloSelect.addEventListener('change', function() {
                populateCapitoloFields(this.value);
            });

            // Modifica: Ora usiamo 'blur' per handleImportoBlurAndFormat
            importoInput.addEventListener('blur', handleImportoBlurAndFormat);

            // Gli altri campi numerici continuano a usare solo la formattazione al blur
            previstoImpegnoInput.addEventListener('blur', formatNumberToTwoDecimals);
            impegnatoValoreInput.addEventListener('blur', formatNumberToTwoDecimals);
            contabilizzatoValoreInput.addEventListener('blur', formatNumberToTwoDecimals);


            // --- Inizializzazione all'avvio della pagina ---

            updateRepartoField();

            if (idRepartoSelect.value) {
                loadCapitoli(idRepartoSelect.value);
            } else {
                idCapitoloSelect.innerHTML = '<option value="" disabled selected>Seleziona prima un Reparto</option>';
                idCapitoloSelect.disabled = true;
                clearCapitoloFields();
            }

            // Inizializza i campi importo al caricamento della pagina se 'importo' ha un valore
            if (importoInput.value) {
                const initialImportoValue = parseFloat(importoInput.value) || 0;
                importoInput.value = initialImportoValue.toFixed(2);
                previstoImpegnoInput.value = (parseFloat(previstoImpegnoInput.value) || 0).toFixed(2);
                impegnatoValoreInput.value = (parseFloat(impegnatoValoreInput.value) || 0).toFixed(2);
                contabilizzatoValoreInput.value = (parseFloat(contabilizzatoValoreInput.value) || 0).toFixed(2);

                // Controllo iniziale per il checkbox 'Registrato' basato su 'importo'
                if (initialImportoValue > 1) {
                    registratoCheckbox.checked = true;
                } else {
                    registratoCheckbox.checked = false;
                }
            } else {
                importoInput.value = (0.00).toFixed(2);
                previstoImpegnoInput.value = (0.00).toFixed(2);
                impegnatoValoreInput.value = (0.00).toFixed(2);
                contabilizzatoValoreInput.value = (0.00).toFixed(2);
                registratoCheckbox.checked = false; // Assicurati che sia deselezionato se importo è 0
            }

            if (idCapitoloSelect.value && loadedCapitoliData[idCapitoloSelect.value]) {
                populateCapitoloFields(idCapitoloSelect.value);
            }
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