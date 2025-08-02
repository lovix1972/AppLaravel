<x-layouts.list-layouts>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">PDS da validare (registrato = si)</h2>
            @if($pdsNonValidati->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Nessun PDS da validare trovato.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Numero PDS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Reparto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Capitolo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Art</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prog</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Importo</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($pdsNonValidati as $pds)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-gray-100">{{ $pds->numpds }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black  dark:text-gray-100">{{ $pds->reparto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black  dark:text-gray-100">{{ $pds->capitolo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black  dark:text-gray-100">{{ $pds->art }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black  dark:text-gray-100">{{ $pds->prog }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-black dark:text-gray-100">{{ number_format($pds->importo, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- SECONDA TABELLA: PDS validati --}}
        <div class="mt-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">PDS validati (registrato = si)</h2>
            @if($pdsValidati->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Nessun PDS validato trovato.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Numero PDS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Reparto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Capitolo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Art</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prog</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Importo</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 ">
                        @foreach($pdsValidati as $pds)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-gray-100 ">{{ $pds->numpds }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pds->reparto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pds->capitolo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pds->art }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $pds->prog }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-100">{{ number_format($pds->importo, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
</div>
</x-layouts.list-layouts>