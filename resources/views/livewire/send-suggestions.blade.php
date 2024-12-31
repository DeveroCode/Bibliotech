<div class="bg-white py-24 px-4 md:px-24 flex flex-col md:flex-row md:gap-20 md:justify-between items-center">
    <div class="w-full md:w-1/3 text-center md:text-left">
        <h3 class="font-bold text-2xl capitalize">Envíanos tus dudas o sugerencias</h3>
        <p class="text-md font-semibold text-gray-500 mt-2">Estamos abiertos a cualquier sugerencia que ayude a
            mejorar la experiencia del usuario, ¡contáctanos ahora mismo!</p>
    </div>
    <form wire:submit.prevent='sendMessage'
        class="relative z-0 w-full md:w-2/3 flex flex-col md:flex-row justify-center md:justify-end items-center md:items-start py-6 md:py-0">
        <div class="relative z-0 w-full md:w-3/4">
            <textarea name="suggestion" id="suggestion" wire:model="suggestion"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                placeholder=" "></textarea>
            <label
                class="absolute top-0 w-full -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Coloca
                tus sugerencias</label>

            @error('suggestion') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4 md:ml-4">
            <button type="submit"
                class="relative inline-flex items-center justify-center md:justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                <span
                    class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span
                    class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Enviar</span>
            </button>
        </div>
    </form>
</div>