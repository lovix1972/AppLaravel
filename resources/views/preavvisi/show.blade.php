<x-layouts.list-layouts>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Dettagli Capitolo #{{ $capitolo->id }}</h1>

                    <p><strong>Capitolo:</strong> {{ $capitolo->capitolo }}</p>
                    <p><strong>Articolo:</strong> {{ $capitolo->art }}</p>
                    <p><strong>Reparto:</strong> {{ optional($capitolo->department)->reparto }}</p>
                    <p><strong>Preavviso:</strong> {{ $capitolo->preavviso }}</p>

                    <a href="{{ route('preavvisi.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Torna all'elenco
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.list-layouts>