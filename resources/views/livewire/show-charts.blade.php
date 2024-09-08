<div class="bg-white p-6 rounded-lg shadow-lg mt-10">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-2xl font-semibold">Estadísticas de Inventario</h2>
            <p class="text-gray-500">Total de libros en el inventario.</p>
        </div>
    </div>
    <canvas id="draw-chart"></canvas>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        // Utilities
        const $ = selected => document.querySelector(selected);

        // Varibles' laravel
        const inventoryData = @json($inventoryData);
        const loans = @json($Loans);
        
        // Charts
        const $canvas = $('#draw-chart');
        const ctx = $canvas.getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'], // Personalizar fechas o períodos
                datasets: [
                    {
                        label: 'Inventario Total',
                        data: [inventoryData], // Datos de muestra
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: 'rgba(54, 162, 235, 1)',
                    },
                    {
                        label: 'Préstamos',
                        data: Object.values(loans), // Datos de muestra
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: function(context){
                            return context.raw === 0 ? 0 : 3;
                        },
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: 'rgba(255, 99, 132, 1)',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 2.5,
                scales: {
                    x: {
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)',
                        },
                        ticks: {
                            stepSize: 500,
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#333',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#fff',
                        borderWidth: 1
                    }
                }
            }
        });
    });
</script>
@endpush