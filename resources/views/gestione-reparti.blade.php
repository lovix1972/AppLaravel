<x-layouts.list-layouts>
    <div x-data="{
        showModal: false,
        repartoToEdit: {},
        editForm: {},
        openModal(reparto) {
            this.repartoToEdit = reparto;
            this.editForm = { ...reparto };
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        }
    }">

        <h1 class="text-2xl font-bold mb-6 text-gray-900">Gestione Reparti</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Inserisci Nuovo Reparto</h2>
            <form action="{{ route('gestione-reparti.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="idreparto" class="block text-sm font-medium text-gray-700">ID Reparto</label>
                        <input type="text" name="idreparto" id="idreparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label for="reparto" class="block text-sm font-medium text-gray-700">Reparto</label>
                        <input type="text" name="reparto" id="reparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label for="regione" class="block text-sm font-medium text-gray-700">Regione</label>
                        <input type="text" name="regione" id="regione" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label for="citta" class="block text-sm font-medium text-gray-700">Città</label>
                        <input type="text" name="citta" id="citta" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
                        Salva Reparto
                    </button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 p-6">Elenco Reparti</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Reparto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reparto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Regione</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Città</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Azioni</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($departments as $reparto)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reparto->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reparto->idreparto }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reparto->reparto }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reparto->regione }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reparto->citta }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button @click="openModal(@json($reparto))" class="text-indigo-600 hover:text-indigo-900">Modifica</button>
                            <form action="{{ route('gestione-reparti.destroy', $reparto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo reparto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <template x-if="showModal">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Modifica Reparto</h3>
                        <div class="mt-2 px-7 py-3">
                            <form :action="'{{ url('gestione-reparti') }}/' + editForm.id" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="idreparto" class="block text-sm font-medium text-gray-700">ID Reparto</label>
                                    <input type="text" name="idreparto" id="idreparto" x-model="editForm.idreparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="reparto" class="block text-sm font-medium text-gray-700">Reparto</label>
                                    <input type="text" name="reparto" id="reparto" x-model="editForm.reparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="regione" class="block text-sm font-medium text-gray-700">Regione</label>
                                    <input type="text" name="regione" id="regione" x-model="editForm.regione" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div class="mb-4">
                                    <label for="citta" class="block text-sm font-medium text-gray-700">Città</label>
                                    <input type="text" name="citta" id="citta" x-model="editForm.citta" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div class="items-center px-4 py-3">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
                                        Aggiorna
                                    </button>
                                    <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 font-medium rounded-md hover:bg-gray-300 transition ml-2">
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