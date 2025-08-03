<x-layouts.list-layouts>
    {{-- Aggiunto un container a larghezza piena per adattarsi allo schermo --}}
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-4 text-gray-900">Riepilogo Dati per Reparto</h1>

        {{-- Ho mantenuto l'overflow-x-auto, che è la soluzione principale --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="w-full table-auto text-xs border-collapse">
                <thead>
                <tr class="bg-gray-50">
                    <th rowspan="2" class="p-2 text-left font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap border-r border-gray-200">Capitolo / Art</th>
                    <th colspan="3" class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-l border-r border-gray-200">G.U.</th>
                    @foreach ($repartiUnici as $reparto)
                        <th colspan="3" class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-l border-r border-gray-200">{{ $reparto }}</th>
                    @endforeach
                </tr>
                <tr class="bg-gray-50">
                    <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-l border-gray-200 whitespace-nowrap">Preavviso</th>
                    <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Spese</th>
                    <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">Rimanenza</th>
                    @foreach ($repartiUnici as $reparto)
                        <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-l border-gray-200 whitespace-nowrap">Preavviso</th>
                        <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Spese</th>
                        <th class="p-2 text-center font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">Differenza</th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($capitoliArtUnici as $chiave)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap border-r border-gray-200">{{ $chiave }}</td>
                        {{-- Colonna G.U. per riga --}}
                        <td class="p-2 font-bold text-gray-700 border-l border-gray-200 whitespace-nowrap text-right">{{ number_format($guTotaliPerRiga[$chiave]['preavviso'] ?? 0, 2, ',', '.') }}</td>
                        <td class="p-2 font-bold text-gray-700 whitespace-nowrap text-right">{{ number_format($guTotaliPerRiga[$chiave]['spese'] ?? 0, 2, ',', '.') }}</td>
                        <td class="p-2 font-bold text-gray-700 text-right @if(($guTotaliPerRiga[$chiave]['differenza'] ?? 0) < 0) text-red-600 @endif whitespace-nowrap border-r border-gray-200">{{ number_format($guTotaliPerRiga[$chiave]['differenza'] ?? 0, 2, ',', '.') }}</td>
                        {{-- Colonne per ogni reparto --}}
                        @foreach ($repartiUnici as $reparto)
                            @php
                                $datiCapitolo = $reportData[$reparto][$chiave] ?? ['preavviso' => 0, 'spese' => 0, 'differenza' => 0];
                            @endphp
                            <td class="p-2 text-gray-500 border-l border-gray-200 whitespace-nowrap text-right">{{ number_format($datiCapitolo['preavviso'], 2, ',', '.') }}</td>
                            <td class="p-2 text-gray-500 whitespace-nowrap text-right">{{ number_format($datiCapitolo['spese'], 2, ',', '.') }}</td>
                            <td class="p-2 text-gray-500 text-right @if($datiCapitolo['differenza'] < 0) text-red-600 @endif whitespace-nowrap border-r border-gray-200">{{ number_format($datiCapitolo['differenza'], 2, ',', '.') }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="bg-gray-100 font-bold">
                    <td class="p-2 text-gray-900 whitespace-nowrap border-r border-gray-200">Totale Generale</td>
                    <td class="p-2 text-gray-900 border-l border-gray-200 whitespace-nowrap text-right">{{ number_format($totaleGeneralePreavvisi, 2, ',', '.') }}</td>
                    <td class="p-2 text-gray-900 whitespace-nowrap text-right">{{ number_format($totaleGeneraleSpese, 2, ',', '.') }}</td>
                    <td class="p-2 text-gray-900 @if($totaleGeneraleRimanenza < 0) text-red-600 @endif whitespace-nowrap border-r border-gray-200">{{ number_format($totaleGeneraleRimanenza, 2, ',', '.') }}</td>
                    @foreach ($repartiUnici as $reparto)
                        <td class="p-2 text-gray-900 border-l border-gray-200 whitespace-nowrap text-right">{{ number_format($repartiTotali[$reparto]['preavviso'] ?? 0, 2, ',', '.') }}</td>
                        <td class="p-2 text-gray-900 whitespace-nowrap text-right">{{ number_format($repartiTotali[$reparto]['spese'] ?? 0, 2, ',', '.') }}</td>
                        <td class="p-2 text-gray-900 text-right @if(($repartiTotali[$reparto]['differenza'] ?? 0) < 0) text-red-600 @endif whitespace-nowrap border-r border-gray-200">{{ number_format($repartiTotali[$reparto]['differenza'] ?? 0, 2, ',', '.') }}</td>
                    @endforeach
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-layouts.list-layouts>