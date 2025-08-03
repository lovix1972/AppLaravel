<x-layouts.list-layouts>
    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Gestione Capitoli</h1>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div x-data="{ open: false, editingCapitolo: null }" class="mb-6 flex justify-between items-center">
                        <form x-ref="filterForm" action="{{ route('preavvisi.index') }}" method="GET" class="flex items-end space-x-4">
                            <div>
                                <label for="capitolo-filter" class="block text-sm font-medium text-gray-700">Filtra per Capitolo</label>
                                <input type="text" name="capitolo" id="capitolo-filter" value="{{ request('capitolo') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="art-filter" class="block text-sm font-medium text-gray-700">Filtra per Art</label>
                                <input type="text" name="art" id="art-filter" value="{{ request('art') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="prog-filter" class="block text-sm font-medium text-gray-700">Filtra per Prog</label>
                                <input type="text" name="prog" id="prog-filter" value="{{ request('prog') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div>
                                <label for="reparto-filter" class="block text-sm font-medium text-gray-700">Filtra per Reparto</label>
                                <select name="idreparto" id="reparto-filter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Tutti</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->idreparto }}" @selected(request('idreparto') == $department->idreparto)>{{ $department->reparto }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 transition ease-in-out duration-150">
                                Filtra
                            </button>
                            <a href="{{ route('preavvisi.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Reset
                            </a>
                        </form>
                        {{-- Corretto: Inizializza editingCapitolo come un oggetto vuoto per evitare errori --}}
                        <button @click="open = true; editingCapitolo = { id: null, capitolo: '', art: '', prog: '', idreparto: '', idv: '', preavviso: '', decreto: '', anno: '' }" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                            Aggiungi Capitolo
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capitolo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Art</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prog</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reparto</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IDV</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preavviso</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Decreto</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anno</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Azioni</span></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($capitoli as $capitolo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $capitolo->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->capitolo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->art }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->prog }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ optional($capitolo->department)->reparto }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->idv }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->preavviso }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->decreto }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $capitolo->anno }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" @click="open = true; editingCapitolo = @json($capitolo)" class="text-indigo-600 hover:text-indigo-900 mr-4">Modifica</a>
                                        <form action="{{ route('preavvisi.destroy', $capitolo) }}" method="POST" class="inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo capitolo?');">
                                            @csrf

                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-gray-500">Nessun capitolo trovato.</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="6" class="px-6 py-3 text-right font-medium text-gray-900 uppercase tracking-wider">Totale Preavvisi:</td>
                                <td class="px-6 py-3 text-sm text-gray-900 font-bold">{{ $totalPreavvisi }}</td>
                                <td colspan="3"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $capitoli->links() }}
                    </div>

                    <div x-data="{ open: false, editingCapitolo: null }" x-show="open" @keydown.escape.window="open = false" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="editingCapitolo ? 'Modifica Capitolo' : 'Aggiungi Capitolo'"></h3>
                                    <form :action="editingCapitolo && editingCapitolo.id ? '{{ route('preavvisi.update', '') }}/' + editingCapitolo.id : '{{ route('preavvisi.store') }}'" method="POST" class="mt-4">
                                        @csrf
                                        <template x-if="editingCapitolo && editingCapitolo.id">@method('PUT')</template>

                                        <div>
                                            <label for="capitolo" class="block text-sm font-medium text-gray-700">Capitolo</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="text" name="capitolo" id="capitolo" :value="editingCapitolo ? editingCapitolo.capitolo : ''" @input="if (editingCapitolo) { editingCapitolo.capitolo = $event.target.value }" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="art" class="block text-sm font-medium text-gray-700">Art</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="text" name="art" id="art" :value="editingCapitolo ? editingCapitolo.art : ''" @input="if (editingCapitolo) { editingCapitolo.art = $event.target.value }" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="prog" class="block text-sm font-medium text-gray-700">Prog</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="text" name="prog" id="prog" :value="editingCapitolo ? editingCapitolo.prog : ''" @input="if (editingCapitolo) { editingCapitolo.prog = $event.target.value }" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="reparto" class="block text-sm font-medium text-gray-700">Reparto</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura per la selezione --}}
                                            <select name="idreparto" id="reparto" :value="editingCapitolo ? editingCapitolo.idreparto : ''" @change="if (editingCapitolo) { editingCapitolo.idreparto = $event.target.value }" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                                <option value="">Seleziona un Reparto</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->idreparto }}">{{ $department->reparto }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-4">
                                            <label for="idv" class="block text-sm font-medium text-gray-700">IDV</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="number" name="idv" id="idv" :value="editingCapitolo ? editingCapitolo.idv : ''" @input="if (editingCapitolo) { editingCapitolo.idv = $event.target.value }" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="preavviso" class="block text-sm font-medium text-gray-700">Preavviso</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="number" name="preavviso" id="preavviso" :value="editingCapitolo ? editingCapitolo.preavviso : ''" @input="if (editingCapitolo) { editingCapitolo.preavviso = $event.target.value }" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="decreto" class="block text-sm font-medium text-gray-700">Decreto</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="text" name="decreto" id="decreto" :value="editingCapitolo ? editingCapitolo.decreto : ''" @input="if (editingCapitolo) { editingCapitolo.decreto = $event.target.value }" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label for="anno" class="block text-sm font-medium text-gray-700">Anno</label>
                                            {{-- Corretto: utilizza un'espressione condizionale sicura --}}
                                            <input type="number" name="anno" id="anno" :value="editingCapitolo ? editingCapitolo.anno : ''" @input="if (editingCapitolo) { editingCapitolo.anno = $event.target.value }" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        </div>

                                        <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm" x-text="editingCapitolo ? 'Aggiorna' : 'Salva'"></button>
                                            <button type="button" @click="open = false; editingCapitolo = null" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                                Annulla
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.list-layouts>