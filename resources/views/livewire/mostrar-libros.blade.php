{{-- Funcion mostrar cuantos quedan --}}
<div class="w-full">

    {{-- Bar seach --}}
    <div class="flex justify-end items-end mb-10 w-1/2">
        <input type="text" id="voice-search"
            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            placeholder="Buscar por ISBN" required="">
        <button type="submit"
            class="ml-2 inline-flex items-center py-2.5 px-3 text-sm font-medium text-white bg-indigo-700 border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 rounded-sm">
            <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>Buscar
        </button>
    </div>


    <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Título</th>
                <th class="px-3 py-4  font-medium text-gray-900">Estado</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Edicion</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Categoría</th>
                <th class="px-3 py-4  font-medium text-gray-900">Herramientas</th>
            </tr>
        </thead>
        @foreach ($libros as $libro)
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                {{-- Titulo y Autores --}}
                <th class="flex gap-3 px-3 py-2 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700 capitalize">{{ $libro->titulo }}</div>
                        <div class="text-gray-400 capitalize">
                            {{-- Autores --}}
                            @foreach ($libro->autores as $autor)
                            {{ $autor->autor }}
                            @endforeach
                        </div>
                    </div>
                </th>

                {{-- Disponibles --}}
                <td class="table-cell px-6 py-4">
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-600 capitalize"></span>
                        Disponibles {{ $libro->cantidad }}
                    </span>
                </td>

                {{-- Edicion --}}
                <td class="px-2 py-2 hidden lg:table-cell capitalize">{{ $libro->edicion }}</td>
                {{-- Categoria --}}
                <td class="hidden lg:table-cell px-2 py-2">
                    <div class="flex gap-2">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 py-1 text-xs capitalize font-semibold text-blue-600">
                            {{ $libro->categoria->categoria}}
                        </span>
                    </div>
                </td>
                {{-- Herramientas --}}
                <td class="table-cell py-4">
                    <div class="flex items-center gap-4 text-indigo-600 text-base">
                        <a href="#">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {{-- pasa los nombres de los autores de cada libro --}}
                        <button wire:click="$emit('delete', {{ $libro->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <a href="{{ route('dashboard.edit', $libro->id) }}">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>

    {{-- Paginate --}}
    <div class="mt-10">
        {{ $libros->links() }}
    </div>
</div>

@push('scripts')
{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/85d631ed4b.js" crossorigin="anonymous"></script>

{{-- Sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- Alert --}}
<script>
    Livewire.on('delete', (libroId, autorIds) => {
            Swal.fire({
            title: 'esta seguro de eliminar este libro?',
            text: "Recuerda que no se podra recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4FA755',
            cancelButtonColor: '#694A97',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                // Delete book and authors
                Livewire.emit('deleteBook', libroId);
                Swal.fire(
                'Eliminado!',
                'El libro ha sido eliminado.',
                'success'
                )
            }
            })
        });
</script>
@endpush
