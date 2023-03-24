{{-- Funcion mostrar cuantos quedan --}}
<div class="w-full">
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
              <div class="font-medium text-gray-700">{{ $libro->titulo }}</div>
              <div class="text-gray-400">
                {{-- Autores --}}
                @foreach ($libro->autores as $autor)
                    {{ $autor->autor }}
                @endforeach
                </div>
            </div>
          </th>

          {{-- Disponibles --}}
          <td class="table-cell px-6 py-4">
            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
              <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
              Disponibles {{ $libro->cantidad }}
            </span>
          </td>

          {{-- Edicion --}}
          <td class="px-2 py-2 hidden lg:table-cell">{{ $libro->edicion }}</td>
          {{-- Categoria --}}
          <td class="hidden lg:table-cell px-2 py-2">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 py-1 text-xs font-semibold text-blue-600">
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
                <a href="#">
                    <i class="fa-solid fa-trash"></i>
                </a>
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
