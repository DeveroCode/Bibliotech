<div class="py-10">
    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='searchLoan'>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="mb-5 flex-grow">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="termino">Nombre del
                        libro</label>
                    <input id="termino" type="text" placeholder="Buscar por Término: ej. Cálculo"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="palabra" />
                </div>

                <div class="mb-5 flex-grow">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Categoría</label>
                    <select class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria">
                        <option value="0">--Seleccione--</option>
                        @foreach ($categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5 flex-grow">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Trimestre</label>
                    <select class="border-gray-300 p-2 w-full rounded-md" wire:model="trimestre">
                        <option value="0">--Seleccione--</option>
                        <option value="1">Primer Trimestre</option>
                        <option value="2">Segundo Trimestre</option>
                        <option value="3">Tercer Trimestre</option>
                        <option value="4">Cuarto Trimestre</option>
                    </select>
                </div>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase">
                    <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
                    Buscar
                </button>
            </div>
        </form>
    </div>
</div>