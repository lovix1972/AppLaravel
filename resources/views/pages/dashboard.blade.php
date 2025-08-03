<x-layouts.list-layouts>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                        <div class="bg-blue-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale PDS Registrati</h3>
                            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $card_data['total_pds_registrati'] ?? '0' }}</p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale PDS Impegnati</h3>
                            <p class="text-3xl font-bold text-red-600 mt-2">{{ $card_data['total_pds_impegnati'] ?? '0' }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale PDS nel Mese</h3>
                            <p class="text-3xl font-bold text-green-600 mt-2">{{ $card_data['total_pds_nel_mese'] ?? '0' }}</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale PDS Validati</h3>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $card_data['total_pds_validati'] ?? '0' }}</p>
                        </div>

                        <div class="bg-orange-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">PDS Annullati</h3>
                            <p class="text-3xl font-bold text-orange-600 mt-2">{{ $card_data['total_pds_annullati'] ?? '0' }}</p>
                        </div>

                        <div class="bg-purple-100 p-4 rounded-lg shadow col-span-1">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">PDS per Decreto</h3>
                            <div class="overflow-y-auto max-h-48">
                                @forelse ($pds_by_decreto as $decreto)
                                    <div class="flex justify-between py-1 border-b border-gray-300 last:border-b-0">
                                        <span class="text-gray-800">{{ $decreto->{$decreto_colonna_per_js} ?? 'Non Assegnato' }}</span>
                                        <span class="font-bold text-purple-600">{{ $decreto->count }}</span>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Nessun PDS con decreto registrato.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="bg-gray-200 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale Spesa</h3>
                            <p class="text-3xl font-bold text-gray-800 mt-2">
                                € {{ number_format($card_data['total_spesa'] ?? 0, 2, ',', '.') }}
                            </p>
                        </div>

                        <div class="bg-indigo-100 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">Totale Preavvisi</h3>
                            <p class="text-3xl font-bold text-indigo-600 mt-2">
                                € {{ number_format($card_data['total_preavvisi'] ?? 0, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold mb-4">PDS Registrati per Giorno (Mese Corrente)</h2>
                            <div x-data="{
                                chart: null,
                                labels: @json($pds_per_giorno_labels),
                                data: @json($pds_per_giorno_data),
                                init() {
                                    this.chart = new Chart(this.$refs.lineChart.getContext('2d'), {
                                        type: 'bar',
                                        data: {
                                            labels: this.labels,
                                            datasets: [{
                                                label: 'PDS Registrati',
                                                data: this.data,
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderWidth: 2,
                                                fill: true,
                                                tension: 0.1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    ticks: {
                                                        precision: 0
                                                    }
                                                }
                                            }
                                        }
                                    });
                                }
                            }">
                                <canvas x-ref="lineChart" class="w-full h-80"></canvas>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold mb-4">Riepilogo Spese e Preavvisi</h2>
                            <div x-data="preavvisiSpesaChart" x-init="init()">
                                <canvas x-ref="pieChart2" class="w-full h-80"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg shadow-md mt-8">
                        <h2 class="text-xl font-semibold mb-4">PDS Annullati per Reparto</h2>
                        <div class="overflow-y-auto max-h-80">
                            @forelse ($pds_annullati_per_reparto as $pds_annullato)
                                <div class="flex justify-between py-1 border-b border-gray-300 last:border-b-0">
                                    <span class="text-gray-800">{{ $pds_annullato->{$reparto_colonna_per_js} ?? 'Non Assegnato' }}</span>
                                    <span class="font-bold text-orange-600">{{ $pds_annullato->count }}</span>
                                </div>
                            @empty
                                <p class="text-gray-500">Nessun PDS annullato registrato.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('preavvisiSpesaChart', () => ({
                chart: null,
                totalSpesa: @json($card_data['total_spesa'] ?? 0),
                totalPreavvisi: @json($card_data['total_preavvisi'] ?? 0),
                init() {
                    const labels = ['Totale Preavvisi', 'Totale Spesa'];
                    const data = [this.totalPreavvisi, this.totalSpesa];
                    const colors = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)'];

                    if (this.totalSpesa > 0 || this.totalPreavvisi > 0) {
                        this.chart = new Chart(this.$refs.pieChart2.getContext('2d'), {
                            type: 'pie',
                            data: {
                                labels: labels,
                                datasets: [{
                                    data: data,
                                    backgroundColor: colors,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    datalabels: {
                                        formatter: (value, ctx) => {
                                            const total = ctx.chart.data.datasets[0].data.reduce((acc, curr) => acc + curr, 0);
                                            const percentage = total === 0 ? '0%' : ((value / total) * 100).toFixed(1) + '%';
                                            return percentage;
                                        },
                                        color: '#fff',
                                        font: { weight: 'bold' }
                                    }
                                }
                            }
                        });
                    } else {
                        this.$refs.pieChart2.parentElement.innerHTML = '<p class=\'text-gray-500 text-center\'>Nessun dato disponibile per spese e preavvisi.</p>';
                    }
                }
            }));
        });
    </script>
</x-layouts.list-layouts>