<x-layouts.list-layouts>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Successo!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Errore!</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-100 min-h-screen py-8 px-4 sm:px-6 lg:px-8"> {{-- Sfondo grigio chiaro --}}
        <div class="container mx-auto max-w-7xl space-y-8">
            <h1 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Gestione PDS e Protocolli</h1>

            <form action="" method="POST" class="space-y-8">
                @csrf

                <div class="flex flex-wrap -mx-4">

                    <div class="w-full lg:w-1/2 px-4 mb-8">
                        {{-- Card 1: Informazioni PDS e Protocollo --}}
                        <div class="bg-white shadow-xl rounded-lg p-7 h-full text-sm">
                            <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Dati Generali PDS e Protocollo</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <label for="id_pds" class="block text-gray-700 font-medium mb-1">ID PDS</label>
                                    <input type="text" id="id_pds" name="id_pds" value="{{ old('id_pds') }}"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="numpds" class="block text-gray-700 font-medium mb-1">N. PDS</label>
                                    <input type="text" id="numpds" name="numpds" value="{{ old('numpds') }}"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="datapds" class="block text-gray-700 font-medium mb-1">Data PDS</label>
                                    <input type="date" id="datapds" name="datapds" value="{{ old('datapds') }}"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div>
                                    <label for="n_protocollo" class="block text-gray-700 font-medium mb-1">N. Protocollo</label>
                                    <input type="text" id="n_protocollo" name="n_protocollo" value="{{ old('n_protocollo') }}"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 px-4 mb-8">
                        {{-- Card 2: Informazioni Reparto e Oggetto --}}
                        <div class="bg-white shadow-xl rounded-lg p-7 h-full text-sm">
                            <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Informazioni Reparto e Oggetto</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <label for="id_reparto" class="block text-gray-700 font-medium mb-1">Id Reparto</label>
                                    <select id="id_reparto" name="id_reparto" required
                                            class="form-select block w-full rounded-md border-b-gray-50 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                        <option value="" disabled selected>Seleziona un Reparto</option>
                                        @foreach($department as $d)
                                            <option value="{{ $d->idreparto }}" {{ old('id_reparto') == $d->idreparto ? 'selected' : '' }}>
                                                {{ $d->idreparto }} - {{ $d->reparto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="reparto" class="block text-gray-700 font-medium mb-1">Reparto</label>
                                    <input type="text" id="reparto" name="reparto" value="{{ old('reparto') }}"
                                           class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="oggetto" class="block text-gray-700 font-medium mb-1">Oggetto</label>
                                    <textarea id="oggetto" name="oggetto" rows="4"
                                              class="form-textarea block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">{{ old('oggetto') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Card 3: Dettagli Aggiuntivi e Importi (Larghezza Completa) --}}
                <div class="bg-white shadow-xl rounded-lg p-7 text-sm">
                    <h2 class="text-xl font-bold mb-5 text-gray-800 border-b pb-3">Dettagli Aggiuntivi e Importi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <div>
                            <label for="idcapitolo" class="block text-gray-700 font-medium mb-1">ID Capitolo:</label>
                            <select id="idcapitolo" name="idcapitolo"
                                    class="form-select block w-full rounded-md border-b-gray-400 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                <option value="" disabled selected>Seleziona un Capitolo</option>
                                @foreach($capitoli as $capitoloItem)
                                    <option value="{{ $capitoloItem->idcapitolo }}" {{ old('idcapitolo') == $capitoloItem->idcapitolo ? 'selected' : '' }}>
                                        {{ $capitoloItem->idcapitolo ?? 'N/A' }} - {{ $capitoloItem->capitolo ?? 'N/A' }}/{{ $capitoloItem->art ?? 'N/A' }}/{{ $capitoloItem->prog ?? 'N/A' }} - {{ $capitoloItem->idv ?? 'N/A' }} - {{ $capitoloItem->decreto ?? 'N/A' }} {{ $capitoloItem->idreparto ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="capitolo" class="block text-gray-700 font-medium mb-1">Capitolo</label>
                            <input type="text" id="capitolo" name="capitolo" value="{{ old('capitolo') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="art" class="block text-gray-700 font-medium mb-1">Art.</label>
                            <input type="text" id="art" name="art" value="{{ old('art') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="prog" class="block text-gray-700 font-medium mb-1">Prog.</label>
                            <input type="text" id="prog" name="prog" value="{{ old('prog') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="idv" class="block text-gray-700 font-medium mb-1">IDV</label>
                            <input type="text" id="idv" name="idv" value="{{ old('idv') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="decreto" class="block text-gray-700 font-medium mb-1">Decreto</label>
                            <input type="text" id="decreto" name="decreto" value="{{ old('decreto') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="ops" class="block text-gray-700 font-medium mb-1">OPS2</label>
                            <input type="text" id="ops" name="ops" value="{{ old('ops') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="Descrizione" class="block text-gray-700 font-medium mb-1">Descrizione</label>
                            <input type="text" id="Descrizione" name="Descrizione" value="{{ old('Descrizione') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>


                        <div>
                            <label for="pdc" class="block text-gray-700 font-medium mb-1">PDC</label>
                            <input type="text" id="pdc" name="pdc" value="{{ old('pdc') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="importo" class="block text-gray-700 font-medium mb-1">Importo</label>
                            <input type="number" step="0.01" min="0" id="importo" name="importo" value="{{ old('importo') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="previstoimpegno" class="block text-gray-700 font-medium mb-1">Previsto Impegno</label>
                            <input type="number" step="0.01" min="0" id="previstoimpegno" name="previstoimpegno" value="{{ old('previstoimpegno') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="impegnato" class="block text-gray-700 font-medium mb-1">Impegnato</label>
                            <input type="number" step="0.01" min="0" id="impegnato" name="impegnato" value="{{ old('impegnato') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div>
                            <label for="contabilizzato" class="block text-gray-700 font-medium mb-1">Contabilizzato</label>
                            <input type="number" step="0.01" min="0" id="contabilizzato" name="contabilizzato" value="{{ old('contabilizzato') }}"
                                   class="form-input block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                        </div>
                        <div class="md:col-span-2 lg:col-span-3">
                            <label for="note" class="block text-gray-700 font-medium mb-1">Note</label>
                            <textarea id="note" name="note" rows="3"
                                      class="form-textarea block w-full rounded-md border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">{{ old('note') }}</textarea>
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
                const idRepartoSelect = document.getElementById('id_reparto');
                const repartoInput = document.getElementById('reparto');

                // Crea un oggetto JavaScript manualmente per massima compatibilità
                const departments = {};
                @foreach($department as $d)
                    departments[{{ $d->idreparto }}] = {
                    idreparto: {{ $d->idreparto }},
                    reparto: "{{ addslashes($d->reparto) }}" // Usa addslashes per gestire apostrofi nel nome
                };
                @endforeach

                idRepartoSelect.addEventListener('change', function() {
                    const selectedId = this.value;
                    const departmentData = departments[selectedId];

                    if (departmentData) {
                        repartoInput.value = departmentData.reparto;
                    } else {
                        repartoInput.value = ''; // Pulisci il campo se non trova corrispondenza
                    }
                });

                // Esegui l'aggiornamento iniziale se c'è un valore vecchio selezionato
                if (idRepartoSelect.value) {
                    const initialSelectedId = idRepartoSelect.value;
                    const initialDepartmentData = departments[initialSelectedId];
                    if (initialDepartmentData) {
                        repartoInput.value = initialDepartmentData.reparto;
                    }
                }
            });
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> {{-- Includi jQuery per semplicità AJAX --}}


    <script>
        // Passa i dati dei capitoli dal backend al frontend come JSON
        let capitoliData = @json($capitoli->keyBy('idcapitolo'));

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


</x-layouts.list-layouts>