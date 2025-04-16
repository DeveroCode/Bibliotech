<div>

    <livewire:loans-custom>

        @if (count($prestamos) > 0)
        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/2 md:w-1/3 px-3 py-4  font-medium text-gray-900">Título</th>
                    <th class="px-3 py-4  font-medium text-gray-900 table-cell">Toltal Prestamos</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Categoria</th>
                </tr>
            </thead>

            @foreach ($prestamos as $prestamo)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50">
                    {{-- Titulo y Autores --}}
                    <th class="flex gap-3 px-3 py-2 font-normal text-gray-900">
                        <div class="text-sm">
                            <h2 class="font-medium text-gray-700 capitalize">
                                {{ $prestamo->libro->titulo }}
                            </h2>

                        </div>
                    </th>
                    {{-- Disponibles --}}
                    <td class="table-cell px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold 
                        {{ $prestamo->total_prestamos > 100 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                            <span class="h-1.5 w-1.5 rounded-full 
                            {{ $prestamo->total_prestamos > 100 ? 'bg-green-600' : 'bg-red-600' }} capitalize">
                            </span>
                            {{ $prestamo->total_prestamos }} {{ $prestamo->total_prestamos <= 1 ? 'vez' : 'veces' }} se ha solicitado
                        </span>
                    </td>

                    {{-- Categoria --}}
                    <td class="hidden lg:table-cell px-2 py-2">
                        <div class="flex gap-2">
                            @switch($prestamo->libro->categoria->id)
                            @case(1)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(2)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-indigo-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(3)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(4)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(5)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(6)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @case(7)
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-orange-100 px-2 py-1 text-xs capitalize font-semibold text-blue-500">
                                {{ $prestamo->libro->categoria->categoria}}
                            </span>
                            @break
                            @default
                            @endswitch
                            {{-- <span
                                class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                                {{ $libro->categoria->categoria}}
                            </span> --}}
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @else
        <p class="text-center font-bold text-2xl text-gray-400">No hay libros encontrado</p>
        @endif
</div>