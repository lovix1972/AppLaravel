@php use Carbon\Carbon; @endphp
<x-layouts.list-layouts>

    <main class="contents">
        <div class="py-12">
            <div x-data="{
                showModal: false,
                pdsToEdit: null,
                editForm: {},
                openModal(pds) {
                    this.pdsToEdit = pds;

                    let editablePds = { ...pds };

                    if (editablePds.datapds) {
                        try {
                             const date = new Date(editablePds.datapds);
                             editablePds.datapds = date.toISOString().split('T')[0];
                        } catch (e) {
                             console.error('Errore nella formattazione della data:', e);
                             editablePds.datapds = '';
                        }
                    } else {
                         editablePds.datapds = '';
                    }
  // Formattazione dell'importo in valuta per la visualizzazione
                    if (editablePds.importo) {
                        editablePds.importo = new Intl.NumberFormat('it-IT', {
                             style: 'currency',
                             currency: 'EUR'
                        }).format(editablePds.importo);
                    } else {
                        editablePds.importo = '€ 0,00';
                    }
                    this.editForm = { ...editablePds };
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                }
            }">

                {{-- La tabella PDS --}}
                <div class="w-full sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if($pds->isEmpty())
                                <div class="text-center py-8">
                                    <h4 class="text-xl font-bold text-gray-700 dark:text-gray-300">Nessun PDS registrato.</h4>
                                    <a href="{{ route('pds.create') }}"
                                       class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-150">
                                        Acquisisci PDS
                                    </a>
                                </div>
                            @else
                                <div class="overflow-x-auto py-32">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">numpds</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">datapds</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">reparto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">capitolo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">art</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">prog</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">oggetto</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Importo</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">anno</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Azioni</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($pds as $item)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-200">
                                                <td class="px-6 py-4 text-sm font-medium text-black dark:text-gray-100">{{ $item->numpds }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ Carbon::parse($item->datapds)->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->reparto }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->capitolo }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->art }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->prog }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300 truncate max-w-xs">{{ $item->oggetto }}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300 truncate max-w-xs text-right">{{ number_format($item->importo, 2, ',', '.')}}</td>
                                                <td class="px-6 py-4 text-sm text-black dark:text-gray-300">{{ $item->anno }}</td>
                                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                                    <button @click="openModal({{ $item->toJson() }})"
                                                            class="text-blue-600 hover:text-blue-900 transition ease-in-out duration-150">
                                                        Modifica
                                                    </button>
                                                    <form action="{{ route('pds.destroy', $item) }}" method="POST" class="inline-block"
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
                                            <td colspan="7" class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-100">Totale:</td>
                                            <td class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-100">€ {{ number_format($pds->sum('importo'), 2, ',', '.') }}</td>
                                            <td colspan="2" class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100"></td>
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
                    <div class="fixed inset-0 z-[999] overflow-y-auto" @click="closeModal()">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div @click.stop class="flex items-center justify-center min-h-screen">
                            <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 max-w-3xl w-full"
                                 style="background-color: #F5F5DC; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                <div class="bg-white dark:bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="background-color: #F5F5DC;">
                                    <h1 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-100" id="modal-title">
                                        Modifica PDS #<span x-text="editForm.numpds"></span>  Identificato con ID #<span x-text="pdsToEdit.id"></span>
                                    </h1>
                                    <div class="mt-2">
                                        <form :action="`/pds/${pdsToEdit.id}`" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                    <strong class="font-bold">Errore di validazione!</strong>
                                                    <ul class="mt-2 list-disc list-inside">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            {{-- Campi del Form --}}
                                            <div class="mb-4">
                                                <label for="numpds" class="block text-sm font-medium text-gray-700 dark:text-dark-100">N. PDS</label>
                                                <input type="text" name="numpds" id="numpds" x-model="editForm.numpds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="data_protocollo" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">datapds </label>
                                                <input type="date" name="datapds" id="datapds" x-model="editForm.datapds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="reparto" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Reparto</label>
                                                <input type="text" name="reparto" id="reparto" x-model="editForm.reparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="capitolo" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Capitolo</label>
                                                <input type="text" name="capitolo" id="capitolo" x-model="editForm.capitolo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="art" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Art</label>
                                                <input type="text" name="art" id="art" x-model="editForm.art" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="prog" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Prog</label>
                                                <input type="text" name="prog" id="prog" x-model="editForm.prog" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mb-4">
                                                <label for="oggetto" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Oggetto</label>
                                                <textarea name="oggetto" id="oggetto" x-model="editForm.oggetto" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="importo" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Importo</label>
                                                <textarea name="importo" id="importo" x-model="editForm.importo" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="anno" class="block text-sm font-medium text-gray-700 dark:text-dark-100 ">Anno</label>
                                                <input type="number" name="anno" id="anno" x-model="editForm.anno" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-100 dark:border-gray-600 dark:text-dark-100  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div class="mt-6 flex justify-end space-x-2">
                                                <button type="submit"
                                                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-green-700 sm:w-auto sm:text-sm">
                                                    Salva Modifiche
                                                </button>
                                                <button type="button" @click="closeModal()"
                                                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-blue-700 sm:w-auto sm:text-sm">
                                                    Annulla
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </main>
</x-layouts.list-layouts>