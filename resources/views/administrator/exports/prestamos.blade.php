<table>
    <tr>
        <td colspan="5" style="font-weight: bold; font-size: 18px; text-align: center;">
            Instituto Tecnologico Superior de Nuevo Casas Grandes Chihuahua
        </td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center;">
            Av. Tecnológico No. 7100 C.P. 31700
        </td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center; font-weight: bold;">
            Informe de Libros Más Solicitados en Inventario
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td>Exportado por: {{ auth()->user()->name }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Fecha: {{ now()->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td colspan="5">Filtros seleccionados:
            {{ $categoria ?? 'Ninguno' }} | 
            {{ $trimestre ? 'Trimestre ' . $trimestre : 'Ninguno' }} |
            {{ $palabra ?? 'Ninguno' }}
        </td>
    </tr>
    <tr></tr>
    <tr style="font-weight: bold;">
        <td>Título</td>
        <td>Categoría</td>
        <td>Total Préstamos</td>
    </tr>

    @foreach ($prestamos as $prestamo)
        <tr>
            <td>{{ $prestamo->libro->titulo }}</td>
            <td>{{ $prestamo->libro->categoria->categoria }}</td>
            <td>{{ $prestamo->total_prestamos }}</td>
        </tr>
    @endforeach
</table>
