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




    <div class="py-12">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Riepilogo Gestione Finanziaria</h1>

        {{-- FORM DI FILTRO --}}
        <div class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Filtra per</h3>
            <form action="{{ route('gestfin') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center">

                <div class="flex-1 w-full">
                    <label for="reparto" class="block text-sm font-medium text-black dark:text-gray-200">Reparto</label>
                    <select name="reparto" id="reparto" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Tutti i reparti</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->reparto }}" {{ request('reparto') == $department->reparto ? 'selected' : '' }}>
                                {{ $department->reparto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 w-full">
                    <label for="capitolo_art" class="block text-sm font-medium text-black dark:text-gray-200">Capitolo / Art</label>
                    <select name="capitolo_art" id="capitolo_art" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Tutti i capitoli</option>
                        @foreach($capitoli as $item)
                            @php $value = $item->capitolo . '-' . $item->art; @endphp
                            <option value="{{ $value }}" {{ request('capitolo_art') == $value ? 'selected' : '' }}>
                                {{ $item->capitolo }} / {{ $item->art }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-shrink-0 flex gap-2 w-full md:w-auto mt-4 md:mt-0">
                    <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
                        Applica Filtro
                    </button>
                    <a href="{{ route('gestfin') }}" class="w-full md:w-auto px-4 py-2 text-center bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 transition">
                        Annulla Filtro
                    </a>
                </div>
            </form>
        </div>

        {{-- PRIMA TABELLA: PDS non validati --}}
        <div class="mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">PDS da impegnare</h2>
            @if($pdsNonValidati->isEmpty())
                <p class="text-gray-500">Nessun PDS da impegnare trovato.</p>
            @else
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200 table-auto w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero PDS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Protocollo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reparto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capitolo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Art</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prog</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oggetto</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Importo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrato</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impegnato</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pdsNonValidati as $pds)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->numpds }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ Carbon\Carbon::parse($pds->dataprotocollo)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->reparto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->capitolo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->art }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->prog }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black truncate max-w-xs">{{ $pds->oggetto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-right text-black">{{ number_format($pds->importo, 2, ',', '.') }}</td>


                                <td class="px-6 py-4 whitespace-nowrap text-xs text-center text-black">
                                    <input type="checkbox" @checked($pds->registrato == -1) disabled class="h-4 w-4 text-gray-400 border-gray-300 rounded cursor-not-allowed">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-center text-black">
                                    <input
                                            type="checkbox"
                                            @checked($pds->impegnato == -1)
                                            @change="toggleStatus('impegnato', {{ $pds->id }}, $el.checked)"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                </td>

                            </tr>
                        @endforeach
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="7" class="px-6 py-4 text-left text-xs text-black">Totale:</td>
                            <td class="px-6 py-4 text-xs text-right text-black">{{ number_format($pdsNonValidati->sum('importo'), 2, ',', '.') }}</td>
                            <td colspan="2" class="px-6 py-4"></td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            @endif
        </div>

        {{-- SECONDA TABELLA: PDS validati --}}
        <div class="mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">PDS impegnati</h2>
            @if($pdsValidati->isEmpty())
                <p class="text-gray-500">Nessun PDS impegnato trovato.</p>
            @else
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200 table-auto w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero PDS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Protocollo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reparto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capitolo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Art</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prog</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oggetto</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Importo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrato</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impegnato</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">validato</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pdsValidati as $pds)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->numpds }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ Carbon\Carbon::parse($pds->dataprotocollo)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->reparto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->capitolo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->art }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black">{{ $pds->prog }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-black truncate max-w-xs">{{ $pds->oggetto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-right text-black">{{ number_format($pds->importo, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-center text-black">
                                    <input type="checkbox" @checked($pds->registrato == -1) disabled class="h-4 w-4 text-gray-400 border-gray-300 rounded cursor-not-allowed">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-center text-black">
                                    <input
                                            type="checkbox"
                                            @checked($pds->impegnato == -1)
                                            @change="toggleStatus('impegnato', {{ $pds->id }}, $el.checked)"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="7" class="px-6 py-4 text-left text-xs text-black">Totale:</td>
                            <td class="px-6 py-4 text-xs text-right text-black">{{ number_format($pdsValidati->sum('importo'), 2, ',', '.') }}</td>
                            <td colspan="2" class="px-6 py-4"></td>
                        </tr>
                        </tbody>
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="7" class="px-6 py-4 text-left text-xs text-black">Totale Importo:</td>
                            <td class="px-6 py-4 text-xs text-right text-black">{{ number_format($pds->sum('importo'), 2, ',', '.') }}</td>
                            <td colspan="2" class="px-6 py-4"></td>
                        </tr>
                    </table>

                </div>

            @endif
        </div>
    </div>

</div>
</x-layouts.list-layouts>