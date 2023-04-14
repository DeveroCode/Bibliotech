<div class="relative flex items-center bg-white rounded-md shadow-sm w-full md:w-10/12 mt-10">
   <form wire:submit.prevent="searchWord" class="w-full">
        <input type="text" name="search" id="search" wire:model="palabra"
            class="block w-full pl-3 pr-10 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
            placeholder="Buscar...">
        <button type="submit"
            class="absolute inset-y-0 right-0 flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-md">
            <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
            <span class="ml-2">Buscar</span>
        </button>

        <div class="mb-5">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Categoría</label>
            <select class="border-gray-300 p-2 w-full">
                <option>--Seleccione--</option>

                @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>
   </form>
</div>
