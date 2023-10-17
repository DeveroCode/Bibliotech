{{-- Funcion mostrar cuantos quedan --}}
<div class="w-full">

    {{-- Bar seach --}}
    <livewire:filtrar-isbn>


        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Libro</th>
                    <th class="px-3 py-4  font-medium text-gray-900">Fecha</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Entrega</th>
                    <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Cantidad</th>
                    <th class="px-3 py-4  font-medium text-gray-900">Herramientas</th>
                </tr>
            </thead>
            @foreach ($loans as $loan)
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50">
                    {{-- Titulo y Autores --}}
                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize">
                                @foreach ($loan->libros as $libro)
                                {{ $libro->titulo }}
                                @endforeach</div>
                        </div>
                    </td>

                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700 capitalize">{{ $loan->fecha_inicio }}</div>
                        </div>
                    </td>

                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <span class="font-medium text-gray-700 capitalize">{{ $loan->fecha_limite }}</span>
                        </div>
                    </td>

                    {{-- Disponibles --}}
                    <td class="table-cell px-6 py-4 md:hidden xl:block">
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-600 capitalize"></span>
                            Libros prestados {{ $loan->cantidad }}
                        </span>
                    </td>

                    {{-- Categoria --}}

                    {{-- Herramientas --}}
                    <td class="table-cell py-4">
                        <div class="flex items-center gap-4 text-indigo-600 text-base">
                            <a href="{{ route('show.books', $loan->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            {{-- pasa los nombres de los autores de cada loan --}}
                            <button wire:click="$emit('delete', {{ $loan->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <a href="{{ route('dashboard.edit', $loan->id) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>

        {{-- Paginate --}}
        {{-- <div class="mt-10">
            {{ $loans->links() }}
        </div> --}}
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
        title: 'esta seguro de eliminar este loan?',
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
            'El loan ha sido eliminado.',
            'success'
            )
        }
        })
    });
</script>
@endpush