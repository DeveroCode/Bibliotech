<section class="flex flex-col justify-center items-center mx-6"
    {{-- "flex bg-red-900 justify-center flex-row mx-auto item-center" --}}>
    <livewire:metodos-trimestres>


        @if(count($libroPrestamos) > 0)
        <table
            class="table-auto text-xs w-full m-auto border-collapse border bg-white text-left text-gray-500 justify-center">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/4 px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Carrera</th>
                    <th class="w-3/6 px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Libro</th>
                    <th class="px-3 py-4  font-medium text-gray-900 xl:table-cell text-align">Cantidad/Préstamos</th>

                </tr>

            </thead>
            @foreach($libroPrestamos as $prestamo)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50 border">
                    <td class="px-3 py-4">
                        {{ $prestamo->libro->categoria->categoria }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $prestamo->libro->titulo}}
                    </td>
                    <td class="px-3 py-4">
                        {{ $prestamo->total_prestamos }}
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
        @endif
</section>