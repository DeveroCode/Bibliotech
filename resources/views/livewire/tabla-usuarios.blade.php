<div>
    <livewire:metodo-busqueda/>
  
    <div class="py-12 max-w-7xl">
        @if(count($registros) > 0)
            <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900">No. Control</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Apellido Paterno</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Apellido Materno</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Carrera</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Total Actividades</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($registros as $registro)
                        @php
                            $alumno = App\Models\Alumno::find($registro['alumnos_id']);
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="table-cell px-6 py-4">{{ $alumno->no_institucional }}</td>
                            <td class="table-cell px-6 py-4">{{ $alumno->nombre }}</td>
                            <td class="table-cell px-6 py-4">{{ $alumno->apellidoP }}</td>
                            <td class="table-cell px-6 py-4">{{ $alumno->apellidoM }}</td>
                            <td class="table-cell px-6 py-4">{{ $alumno->carrera }}</td>
                            <td class="table-cell px-6 py-4">{{ $registro['total_usuarios'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron registros para los filtros seleccionados.</p>
        @endif
    </div>
</div>
