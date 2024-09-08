<div class="bg-white p-6 rounded-lg shadow-lg mt-10">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-2xl font-semibold">Estadísticas de Inventario</h2>
            <p class="text-gray-500">Total de libros en el inventario.</p>
        </div>
    </div>
    <canvas id="inventoryChart"></canvas>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        const inventoryData = @json($inventoryData);
        
        const ctx = document.getElementById('inventoryChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total de Libros'],
                datasets: [{
                    label: 'Inventario Total',
                    data: [inventoryData],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 20
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush