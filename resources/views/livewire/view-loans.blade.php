{{-- Funcion mostrar cuantos quedan --}}
<div class="w-full">
    @if (count($loans) > 0)
    {{-- Bar seach --}}
    <livewire:filtrar-isbn>
        <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-3 py-4  font-medium text-gray-900">Libro</th>
                    <th class="px-3 py-4  font-medium text-gray-900">Salida</th>
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
                            <span class="font-medium text-gray-700 capitalize">{{
                                \Carbon\Carbon::createFromFormat('Y-m-d', $loan->fecha_inicio)->format('d-M-Y') }}
                            </span>
                        </div>
                    </td>

                    <td class="table-cell px-6 py-4">
                        <div class="text-sm">
                            <span class="font-medium text-gray-700 capitalize">{{
                                \Carbon\Carbon::createFromFormat('Y-m-d', $loan->fecha_limite)->format('d-M-Y')
                                }}</span>
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
                            <a href="{{ route('loans.student', $loan->alumnos()->first()->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <button wire:click="$emit('delete', {{ $loan->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <a href="{{ route('loans.update', $loan->id) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
        @else
        <h2 class="text-center text-3xl uppercase text-gray-500 m-32">Aun no hay prestamos disponibles</h2>
        @endif
        {{-- Paginate --}}
        <div class="mt-10">
            {{ $loans->links() }}
        </div>
</div>

@push('scripts')
{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/85d631ed4b.js" crossorigin="anonymous"></script>

{{-- Sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- Alert --}}
<script>
    Livewire.on('delete', (loan) => {
        Swal.fire({
        title: 'esta seguro de eliminar este prestamo?',
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
            Livewire.emit('deleteBook', loan);
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