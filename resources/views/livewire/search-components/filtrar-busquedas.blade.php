<div class="py-10">
    <form  wire:submit.prevent='searchWord'>
        <div class="md:grid md:grid-cols-3 gap-5">
            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="termino">Nombre del libro
                </label>
                <input id="termino" type="text" placeholder="Buscar por Término: ej. Cálculo"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    wire:model.lazy="palabra"
                    />
            </div>

            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Categoría</label>
                <select class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria">
                    <option value="0">--Seleccione--</option>

                    @foreach ($categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Editorial</label>
                <select class="border-gray-300 p-2 w-full rounded-md" wire:model="edicion">
                    <option value="0">--Seleccione--</option>

                    @foreach ($editoriales as $editorial )
                        <option value="{{ $editorial->edicion }}">{{ $editorial->edicion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>
