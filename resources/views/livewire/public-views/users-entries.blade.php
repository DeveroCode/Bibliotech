<div class="py-10">
    <form wire:submit.prevent='shearchUser' class="w-full flex gap-2">
        <div class="flex flex-wrap gap-5 items-center w-3/4">
            <div class="mb-5 flex-grow">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="termino">Número de
                    control</label>
                <input id="termino" type="text" placeholder="Ej: 19CG0063"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full uppercase"
                    wire:model.debounce.900ms="user_control" />
            </div>
        </div>

        <div class="mt-5">
            <x-button-search  :disabled="empty($user_control)" 
            class="{{ empty($user_control) ? 'opacity-50 cursor-not-allowed' : '' }}" type="submit">Buscar</x-button-search>
        </div>
    </form>
</div>