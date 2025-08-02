@php use Carbon\Carbon; @endphp
<x-layouts.list-layouts>

    <div x-data="{
toggleStatus(field, pdsId, status) {
        let value = status ? -1 : 0;

        fetch(`/pds/update-status/${pdsId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                field: field,
                status: status
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Errore durante l\'aggiornamento dello stato.');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message);
            // Ricarica la pagina per visualizzare il risultato del filtro
            window.location.reload();
        })
        .catch(error => {
            console.error('Errore:', error);
            alert('Errore durante l\'aggiornamento dello stato.');
            // Ripristina la checkbox in caso di errore
            document.getElementById(`${field}-${pdsId}`).checked = !status;
        });
    }
}">

                {{-- La tabella PDS --}}
                <div class="py-0">
                    <div class="max-w-full sm:px-6 lg:px-6">
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-40 text-gray-900 dark:text-gray-100">
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($pds->isEmpty())

                                <div class="text-center py-4">
                                    <h4 class="text-xl font-bold text-gray-700 dark:text-gray-300">Nessun PDS registrato.</h4>
                                    <a href="{{ route('inspds.show') }}"
                                       class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-150">
                                        Acquisisci PDS
                                    </a>
                                </div>
                            @else
                                    <div class="mb-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                                        <h3 class="text-lg font-semibold  dark:text-gray-100 mb-4 text-black">Filtra la ricerca</h3>
                                        <form action="{{ route('pds.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center">

                                            <div class="flex-1 w-full">
                                                <label for="search_key" class="sr-only">Seleziona campo</label>
                                                <select name="search_key" id="search_key" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-black">
                                                    <option value="numpds" {{ request('search_key') == 'numpds' ? 'selected' : '' }}>Numero PDS</option>
                                                    <option value="reparto" {{ request('search_key') == 'reparto' ? 'selected' : '' }}>Reparto</option>
                                                    <option value="capitolo" {{ request('search_key') == 'capitolo' ? 'selected' : '' }}>Capitolo</option>
                                                    <option value="art" {{ request('search_key') == 'art' ? 'selected' : '' }}>Art</option>
                                                    <option value="prog" {{ request('search_key') == 'prog' ? 'selected' : '' }}>Prog</option>
                                                </select>
                                            </div>

                                            <div class="flex-1 w-full">
                                                <label for="search_value" class="sr-only">Termine di ricerca</label>
                                                <input type="text" name="search_value" id="search_value" placeholder="Inserisci il termine di ricerca" value="{{ request('search_value') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-black">
                                            </div>

                                            <div class="flex-shrink-0 flex gap-2 w-full md:w-auto">
                                                <button type="submit" class="flex-1 md:flex-auto px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
                                                    Cerca
                                                </button>
                                                <a href="{{ route('pds.index') }}" class="flex-1 md:flex-auto px-4 py-2 text-center bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 transition">
                                                    Annulla Filtro
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                <div class="py-0">

                                    <table class="  divide-gray-200 dark:divide-gray-700 ">

                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">numpds</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">datapds</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">reparto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">capitolo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">art</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">prog</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">idv</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">oggetto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Importo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">registrato</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Impegnato</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Azioni</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                                        @foreach ($pds as $item)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-200">
                                                <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-100">{{ $item->id }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-100">{{ $item->numpds }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ Carbon::parse($item->datapds)->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->reparto }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->capitolo }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->art }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->prog }}</td>

                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->idv }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300 truncate max-w-xs">{{ $item->oggetto }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300  max-w-xs text-right ">{{  number_format(($item->importo),2,',','.')}}</td>

                                                {{-- NUOVE COLONNE CHECKBOX --}}
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-center">
                                                    <input
                                                            type="checkbox"
                                                            id="registrato-{{ $item->id }}"
                                                            @checked($item->registrato == -1)
                                                            @change="toggleStatus('registrato', {{ $item->id }}, $el.checked)"
                                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                    >
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-center">
                                                    <input
                                                            type="checkbox"
                                                            id="impegnato_flag-{{ $item->id }}"
                                                            @checked($item->impegnato_flag== -1)
                                                            @change="toggleStatus('impegnato_flag', {{ $item->id }}, $el.checked)"
                                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                    >
                                                </td>
                                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                                    <button @click='openModal(@json($item))' class="text-blue-600 hover:text-blue-900 transition ease-in-out duration-150">
                                                        Modifica
                                                    </button>
                                                    <form action="{{ route('DeletePds', $item->id) }}" method="POST" class="inline-block"
                                                          onsubmit="return confirm('Sei sicuro di voler eliminare questo PDS?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 transition ease-in-out duration-150">
                                                            Elimina
                                                        </button>

                                                    </form>
                                                </td>
                                        @endforeach
                                        {{-- Riga del totale --}}
                                        <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
                                            <td colspan="9" class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-100">Totale:</td>
                                            <td class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-100">€ {{ number_format($pds->sum('importo'), 2, ',', '.') }}</td>
                                            <td colspan="3" class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100"></td>
                                        </tr>
                                        </tbody>



                                    </table>


                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- La Modale di Modifica (corretta) --}}
                <template x-if="showModal">

                    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0">

                        <div class="absolute inset-0 bg-gray-900 bg-opacity-75" @click="closeModal()"></div>

                        <div class="relative w-full max-w-4xl p-4 bg-white dark:bg-gray-800 rounded-lg shadow-xl mx-auto">
                    <div class="bg-white dark:bg-gray-900 px-4 pt-2 pb-2 sm:p-6 sm:pb-4" style="background-color: #F5F5DC;">
                                    <h1 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-100" id="modal-title">
                                        Modifica PDS #<span x-text="editForm.numpds"></span>  Identificato con ID #<span x-text="pdsToEdit.id"></span>
                                    </h1>
                                    <div class="mt-2">
                                        <form :action="`/inspds/${editForm.id}`" method="POST">

                                            @csrf
                                            @method('PUT')
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Dati PDS</h4>
                                                    <input type="text" name="id" id="id" x-model="editForm.id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">

                                                    <div class="mb-4">
                                                        <label for="numpds" class="block text-sm font-medium text-gray-900">Numero PDS</label>
                                                        <input type="text" name="numpds" id="numpds" x-model="editForm.numpds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="datapds" class="block text-sm font-medium text-gray-900">Data PDS</label>
                                                        <input type="date" name="datapds" id="datapds" x-model="editForm.datapds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="idreparto" class="block text-sm font-medium text-gray-900">ID Reparto</label>
                                                        <select id="idreparto" name="idreparto" x-model="editForm.idreparto" @change="autofillReparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                            <option value="">Seleziona un Reparto</option>
                                                            <template x-for="reparto in departments" :key="reparto.idreparto">
                                                                <option :value="reparto.idreparto" x-text="reparto.reparto"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="reparto" class="block text-sm font-medium text-gray-900">Reparto</label>
                                                        <input type="text" name="reparto" id="reparto" x-model="editForm.reparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500" readonly>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Dati Finanziari</h4>

                                                    <div class="mb-4">
                                                        <label for="idcapitolo" class="block text-sm font-medium text-gray-900">Capitolo / Art / Prog</label>
                                                        <select id="idcapitolo" name="idcapitolo" x-model="editForm.idcapitolo" @change="autofillCapitolo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                            <option value="">Seleziona un Capitolo</option>
                                                            <template x-for="capitolo in capitoli" :key="capitolo.idcapitolo">
                                                                <option :value="capitolo.idcapitolo" x-text="`${capitolo.capitolo} / ${capitolo.art} / ${capitolo.prog}`"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="capitolo" class="block text-sm font-medium text-gray-900">Capitolo</label>
                                                        <input type="text" name="capitolo" id="capitolo" x-model="editForm.capitolo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500" readonly>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="art" class="block text-sm font-medium text-gray-900">Art</label>
                                                        <input type="text" name="art" id="art" x-model="editForm.art" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500" readonly>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="prog" class="block text-sm font-medium text-gray-900">Prog</label>
                                                        <input type="text" name="prog" id="prog" x-model="editForm.prog" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500" readonly>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="idv" class="block text-sm font-medium text-gray-900">IDV</label>
                                                        <input type="text" name="idv" id="idv" x-model="editForm.idv" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500" readonly>
                                                    </div>


                                                    <div class="mb-4">
                                                        <label for="importo" class="block text-sm font-medium text-gray-900">Importo</label>
                                                        <input type="text" name="importo" id="importo" x-model="editForm.importo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="impegnato_flag" class="block text-sm font-medium text-gray-900">Impegnato</label>
                                                        <input type="checkbox" name="impegnato_flag" id="importo" x-model="editForm.impegnato_flag" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mt-6">
                                                <label for="oggetto" class="block text-sm font-medium text-gray-900">Oggetto</label>
                                                <textarea name="oggetto" id="oggetto" x-model="editForm.oggetto" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                            </div>
                                            <div class="mt-4">
                                                <label for="note" class="block text-sm font-medium text-gray-900">Note</label>
                                                <textarea name="note" id="note" x-model="editForm.note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white text-gray-900 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                            </div>

                                            <div class="mt-8 flex justify-end space-x-3">
                                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
                                                    Salva
                                                </button>
                                                <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 font-medium rounded-md hover:bg-gray-300 transition">
                                                    Annulla
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </template>
            </div>

</x-layouts.list-layouts>