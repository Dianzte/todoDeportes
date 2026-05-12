<style>
    body { background-color: #0f172a; color: white; font-family: sans-serif; }
    .orange-line { border-top: 4px solid #f97316; margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th { background: #1e293b; color: #f97316; text-transform: uppercase; padding: 10px; }
    td { border-bottom: 1px solid #334155; padding: 10px; }
    .chart-box { margin-top: 30px; text-align: center; }
</style>

<div class="orange-line"></div>
<h1>TODODEPORTES <span style="color: #f97316;">Reporte</span></h1>

<table>
    <thead>
        <tr>
            <th>Equipo</th>
            <th>Deporte</th>
            <th>Jugadores</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{ $equipo->nombre }}</td>
            <td>{{ $equipo->deporte }}</td>
            <td>{{ $equipo->jugadores_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="chart-box">
    <h3 style="color: #f97316;">ANÁLISIS DE PLANTILLAS</h3>
    <img src="{{ $graficoBase64 }}" style="width: 100%;">
</div>