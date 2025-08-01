<div class="w-full h-auto px-4">
    <table class="table-auto text-xs w-full m-auto border-collapse bg-white text-left text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th class="md:w-1/4 px-3 py-4  font-medium text-gray-900">Nombre</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Correo</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Fecha de ingreso</th>
                <th class="px-3 py-4  font-medium text-gray-900 hidden lg:table-cell">Último acceso</th>
                <th class="px-3 py-4  font-medium text-gray-900">Herramientas</th>
            </tr>
        </thead>
        @foreach ($users as $user)
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50">
                {{-- Titulo y Autores --}}
                <th class="flex gap-3 px-3 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700 capitalize">{{ $user->name . ' ' . $user->apellido_paterno
                            . ' ' . $user->apellido_materno }}
                        </div>
                    </div>
                </th>

                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">{{ $user->email }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{\Carbon\Carbon::parse($user->fecha)->format('d-M-Y') }}</td>
                <td class="px-2 py-2 hidden lg:table-cell capitalize text-black text-sm">
                    {{\Carbon\Carbon::parse($user->updated_at)->format('d-M-Y') }}</td>

                {{-- Herramientas --}}
                <td class="table-cell py-4">
                    <div class="flex items-center gap-4 text-indigo-600 text-base">
                        <a href="{{ route('admin.edit', $user->id) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {{-- pasa los nombres de los autores de cada libro --}}
                        <button wire:click="$emit('delete', {{ $user->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <a href="{{ route('admin.edit', $user->id) }}">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@push('scripts')
{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/85d631ed4b.js" crossorigin="anonymous"></script>

{{-- Sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('delete', (userId) => {
        Swal.fire({
        title: 'Seguro de eliminar?',
        text: "Recuerda que no se podrá recuperar la información de este usuario",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4FA755',
        cancelButtonColor: '#694A97',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            // Delete book and authors
            Livewire.emit('userDelete', userId);
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
