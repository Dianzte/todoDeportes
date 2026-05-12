<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estadísticas de Equipos y Jugadores
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6">
                    <a href="{{ route('equipos.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                        ← Volver a Equipos
                    </a>
                </div>

                <h3 class="text-lg font-semibold mb-4">Cantidad de Jugadores por Equipo</h3>
                
                <canvas id="graficoEquipos" width="800" height="400"></canvas>
            </div>
        </div>
    </div>

    <form action="{{ route('equipos.pdf') }}" method="POST" id="pdfForm">
    @csrf
    <input type="hidden" name="chart_base64" id="chart_base64">
    
    <x-primary-button type="button" onclick="exportWithChart()">
        Exportar Reporte PDF
    </x-primary-button>
</form>

<script>
    function exportWithChart() {
        const canvas = document.getElementById('graficoEquipos');
        
        const chartImage = canvas.toDataURL('image/png');
        
        document.getElementById('chart_base64').value = chartImage;
        
        document.getElementById('pdfForm').submit();
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoEquipos');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($nombresEquipos),
                datasets: [{
                    label: 'Cantidad de Jugadores',
                    data: @json($cantidadJugadores),
                    backgroundColor: '#1e40af',
                    borderColor: '#1e3a8a',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>
</x-app-layout>