    {{-- Funcion mostrar cuantos quedan --}}
<div class="w-full overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    @foreach ($libros as $libro)
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Edicion</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Categoria</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Herramientas</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        <tr class="hover:bg-gray-50">
          <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
            <div class="relative h-10 w-10">
              <img
                class="h-full w-full rounded-full object-cover object-center"
                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
              />
              <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
            </div>
            <div class="text-sm">
              <div class="font-medium text-gray-700">{{ $libro->titulo }}</div>
              <div class="text-gray-400">{{ $libro->autores }}</div>
            </div>
          </th>
          <td class="px-6 py-4">
            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
              <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
              Disponibles
            </span>
          </td>
          <td class="px-6 py-4">{{ $libro->edicion }}</td>
          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                {{ $libro->categoria_id }}
              </span>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex justify-end gap-4">
                <a href="#">
                    <i class="fa-solid fa-trash"></i>
                </a>
                <a href="#">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    @endforeach
</div>


