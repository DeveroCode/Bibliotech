<div x-data="{ show: @entangle('show') }" x-show="show" x-transition
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div @click.away="show = false" class="bg-white p-6 rounded shadow md:max-w-7xl max-w-lg w-full">
        <div class="flex justify-between items-center py-3">
            <div>
                <h2 class="text-xl font-bold">Gráfica de Préstamos</h2>
                <span class="text-gray-500 font-semibold">Aquí se muestran los 10 libros más solicitados, basados en los filtros que has aplicado.</span>
            </div>
            <button @click="show = false; $wire.close()" class="text-gray-500 hover:text-gray-800">✖</button>
        </div>

        {{-- Charts --}}
        <canvas id="draw-chart" class="max-w-7xl"></canvas>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('render-chart', (event) => {
        const datos = event.detail.datos;
        const labels = datos.map(item => item.titulo);
        const data = datos.map(item => item.cantidad);

        const $canvas = document.getElementById('draw-chart');
        const ctx = $canvas.getContext('2d');

        if (window.myChart) {
            window.myChart.destroy();
        }

        window.myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Préstamos',
                    data: data,
                    backgroundColor: 'rgba(106, 90, 205, 0.6)',
                    borderColor: 'rgba(106, 90, 205, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 2.5,
                indexAxis: 'y', 
                plugins: {
                    legend: {
                        labels: {
                            font: { size: 14 }
                        }
                    },
                    tooltip: {
                        bodyFont: {
                            size: 14
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            stepSize: 1
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush