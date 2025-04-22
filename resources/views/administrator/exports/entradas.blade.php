<table>
    <tr>
        <td colspan="7" style="font-weight: bold; font-size: 18px; text-align: center;">
            Instituto Tecnológico Superior de Nuevo Casas Grandes Chihuahua
        </td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center;">
            Av. Tecnológico No. 7100 C.P. 31700
        </td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center; font-weight: bold;">
            Informe de ingresos por alumnos a la biblioteca
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="4">Exportado por: {{ auth()->user()->name }}</td>
        <td colspan="3" style="text-align: right;">Fecha: {{ now()->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td colspan="7">Filtros seleccionados:
            {{ $actividad ?? 'Ninguno' }} | 
            {{ $trimestre ? 'Trimestre ' . $trimestre : 'Ninguno' }} |
            {{ $genero ?? 'Ninguno' }}
        </td>
    </tr>
    <tr></tr>
    <tr style="font-weight: bold;">
        <td>No. Control</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Sexo</td>
        <td>Carrera</td>
        <td>Actividad</td>
        <td>Fecha</td>
    </tr>

    @foreach ($entries as $entry)
        <tr>
            <td>{{ $entry->alumno->no_institucional }}</td>
            <td>{{ $entry->alumno->nombre }}</td>
            <td>{{ $entry->alumno->apellidoP . ' ' . $entry->alumno->apellidoM }}</td>
            <td>{{ $entry->alumno->sexo }}</td>
            <td>{{ $entry->alumno->carrera }}</td>
            <td>{{ $entry->actividad }}</td>
            <td>{{ $entry->created_at->format('d-M-Y') }}</td>
        </tr>
    @endforeach
</table>
