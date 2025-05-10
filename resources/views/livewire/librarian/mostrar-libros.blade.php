{{-- Funcion mostrar cuantos quedan --}}
<div class="w-full h-auto">

    @if(count($libros) > 0)
    {{-- Bar seach --}}
    <livewire:filtrar-isbn>


        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Título</th>
                    <th class="px-3 py-4  font-medium text-gray-900">Estado</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Edición</th>
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
                    <td class="px-3 py-4">
                        <div class="flex gap-2">
                            <span
                                class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs capitalize font-semibold {{ $categoryColors[$libro->categoria->id] ?? '' }}">
                                {{ $libro->categoria->categoria }}
                            </span>
                        </div>
                    </td>
                    {{-- Herramientas --}}
                    <td class="table-cell py-4">
                        <div class="flex items-center gap-4 text-indigo-600 text-base">
                            <a href="{{ route('show.books', $libro->id) }}">
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
        @else

        <div class="w-full flex justify-center items-center flex-col">
            <p class="text-4xl text-gray-600 text-center mt-20 uppercase">Aún no hay registros de los libros</p>
            <a href="{{ route('dashboard.create') }}"
                class="rounded-full mt-2 py-1 px-5 bg-gray-900 text-white w-32">Registrar</a>
        </div>
        @endif
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