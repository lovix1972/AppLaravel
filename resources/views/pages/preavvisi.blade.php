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

                    <div class="mb-6 flex justify-between items-center">
                        <form action="{{ route('preavvisi.index') }}" method="GET" class="flex items-end space-x-4">
                            <div>
                                <label for="capitolo-filter" class="block text-sm font-medium text-gray-700">Filtra per Capitolo</label>
                                <input type="text" name="capitolo" id="capitolo-filter" value="{{ request('capitolo') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                            </div>
                            <div>
                                <label for="art-filter" class="block text-sm font-medium text-gray-700">Filtra per Art</label>
                                <input type="text" name="art" id="art-filter" value="{{ request('art') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                            </div>
                            <div>
                                <label for="prog-filter" class="block text-sm font-medium text-gray-700">Filtra per Prog</label>
                                <input type="text" name="prog" id="prog-filter" value="{{ request('prog') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                            </div>
                            <div>
                                <label for="reparto-filter" class="block text-sm font-medium text-gray-700">Filtra per Reparto</label>
                                <select name="idreparto" id="reparto-filter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
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
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capitolo</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Art</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prog</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reparto</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IDV</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preavviso</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Decreto</th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anno</th>
                                <th scope="col" class="relative px-3 py-2"><span class="sr-only">Azioni</span></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($capitoli as $capitolo)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap font-medium text-gray-900">{{ $capitolo->id }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->capitolo }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->art }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->prog }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ optional($capitolo->department)->reparto }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->idv }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ number_format($capitolo->preavviso,2,',','.')}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->decreto }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-gray-500">{{ $capitolo->anno }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-right font-medium">
                                        <a href="{{ route('preavvisi.show', $capitolo->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Modifica</a>
                                        <form action="{{ route('preavvisi.destroy', $capitolo->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo capitolo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-3 py-2 text-center text-gray-500">Nessun capitolo trovato.</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot class="bg-gray-100">
                            <tr>
                                <td colspan="6" class="px-3 py-2 text-right font-bold text-gray-900 uppercase tracking-wider">Totale Preavvisi:</td>
                                <td class="px-3 py-2 text-sm text-gray-900 font-bold">{{ number_format($totalPreavvisi,2,',','.') }}</td>
                                <td colspan="3"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $capitoli->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.list-layouts>