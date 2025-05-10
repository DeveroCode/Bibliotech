<div>
    <div x-data>
        <div class="rounded-md py-2 px-4 flex justify-end flex-row gap-2">
            <button wire:click='export' class="bg-purple-600 px-3 py-2 rounded-md">
                <i class="fa-solid fa-print text-white"></i>
            </button>

            <button class="bg-purple-600 px-3 py-2 rounded-md" wire:click="openModal">
                <i class="fa-solid fa-chart-simple text-white"></i>
            </button>
        </div>

        <livewire:modal-chart-loans />
    </div>

    <livewire:loans-custom />

    @if (count($prestamos) > 0)
    <div class="overflow-x-auto">
        <table class="table-auto min-w-full text-xs border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/2 md:w-1/3 px-3 py-4 font-medium text-gray-900">Título</th>
                    <th class="w-1/4 md:w-1/3 px-3 py-4 font-medium text-gray-900">Total Préstamos</th>
                    <th class="w-1/4 md:w-1/3 px-3 py-4 font-medium text-gray-900">Categoría</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($prestamos as $prestamo)
                <tr class="hover:bg-gray-50">
                    <!-- Título -->
                    <td class="px-3 py-4">
                        <div class="text-sm">
                            <h2 class="font-medium text-gray-700 capitalize">
                                {{ $prestamo->libro->titulo }}
                            </h2>
                        </div>
                    </td>

                    <!-- Total Préstamos -->
                    <td class="px-3 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold
                            {{ $prestamo->total_prestamos > 100 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                            <span class="h-1.5 w-1.5 rounded-full
                            {{ $prestamo->total_prestamos > 100 ? 'bg-green-600' : 'bg-red-600' }}">
                            </span>
                            {{ $prestamo->total_prestamos }} {{ $prestamo->total_prestamos <= 1 ? 'vez' : 'veces' }}
                                </span>
                    </td>

                    <!-- Categoría -->
                    <td class="px-3 py-4">
                        <div class="flex gap-2">
                            <span
                                class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs capitalize font-semibold {{ $categoryColors[$prestamo->libro->categoria->id] ?? '' }}">
                                {{ $prestamo->libro->categoria->categoria }}
                            </span>
                        </div>
                    </td>
    </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>

@else
<p class="text-center font-bold text-2xl text-gray-400">No hay libros encontrados</p>
@endif
</div>