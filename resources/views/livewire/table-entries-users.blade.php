<div class="px-16 py-3">
    <div x-data>
        <div class="rounded-md py-2 px-4 flex justify-end flex-row gap-2">
            <button wire:click='exportEntries' class="bg-purple-600 px-3 py-2 rounded-md">
                <i class="fa-solid fa-print text-white"></i>
            </button>
    
            <button 
                class="bg-purple-600 px-3 py-2 rounded-md"
                wire:click="openModal"
            >
                <i class="fa-solid fa-chart-simple text-white"></i>
            </button>
        </div>
    
        <!-- Componente del modal con Alpine integrado -->
        <livewire:modal-chart-loans />
    </div>
    <livewire:filter-entries>

        @if (count($entries) > 0)
        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/2 md:w-1/3 px-3 py-4  font-medium text-gray-900">Info. Alumno</th>
                    <th class="px-3 py-4  font-medium text-gray-900 table-cell">Carrera</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Actividad</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Materia</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Fecha</th>
                </tr>
            </thead>

            @foreach ($entries as $entry)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50">
                    {{-- Info. Alumno --}}
                    <th class="flex gap-3 px-3 py-2 font-normal text-gray-900">
                        <div class="text-sm">
                            <p class="font-medium text-gray-700 capitalize">{{ $entry->alumno->nombre . ' ' . $entry->alumno->apellidoP  . ' ' . $entry->alumno->apellidoM }}</p>
                            <p class="text-gray-400">
                                {{-- Autores --}}
                               No. Control <span class="uppercase">{{ $entry->alumno->no_institucional }}</span>
                            </p>
                        </div>
                    </th>

                    {{-- Materia y Actividad --}}
                    <td class="table-cell px-6 py-4">
                        <p class="font-medium text-gray-700 capitalize">{{ $entry->alumno->carrera}}</p>
                    </td>
                    <td class="table-cell px-6 py-4">
                        <p class="font-medium text-gray-700 capitalize">{{ $entry->actividad}}</p>
                    </td>
                    <td class="table-cell px-6 py-4">
                        <p class="font-medium text-gray-700 capitalize">{{ $entry->materia}}</p>
                    </td>
                    <td class="table-cell px-6 py-4">
                        <p class="font-medium text-gray-700 capitalize">{{ $entry->created_at->format('d-M-Y')}}</p>
                    </td>
                    

                </tr>
            </tbody>
            @endforeach
        </table>


        <div class="mt-10 py-10">
            {{ $entries->links() }}
        </div>
        @else
        <p class="text-center font-bold text-2xl text-gray-400">No hay libros encontrado</p>
        @endif
</div>