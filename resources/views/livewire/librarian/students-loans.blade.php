<div>
    <div class="w-full">
        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Libro</th>
                    <th class="w-1/4 px-3 py-4  font-medium text-gray-900">Cantidad</th>
                    <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Estado</th>
                </tr>
            </thead>
            @foreach ($studentLoans as $prestamo)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize">
                                <p>{{ $prestamo->libros()->first()->titulo }}</p>
                                <span class="text-gray-400 text-xs">{{ $prestamo->libros()->first()->isbn }}</span>
                            </div>
                        </div>
                    </td>

                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize">
                                <p>{{ $prestamo->cantidad }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize">
                                <p>{{ $prestamo->tipo_prestamo()->first()->nombre }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>