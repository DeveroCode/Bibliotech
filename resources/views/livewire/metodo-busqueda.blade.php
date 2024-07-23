<div>
    {{-- Be like water. --}}
    <form wire:submit.prevent='searchWord'>
        <div class="py-10">
         <div class="max-w-7xl mx-auto">
    
            <div class="md:grid md:grid-cols-5 gap-5">
        <div class="mb-4">
            <x-input-label for="sexo" :value="__('Sexo:')" class="block mb-1 text-xs text-gray-700 uppercase font-bold" />
             <select class="border-gray-300 p-2 w-full rounded-md" wire:model="sexo">
                <option value="" >--Seleccione--</option>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
                <option value="otro">Otro</option>
              </select>
        </div>

        <div class="mb-4">
            <x-input-label for="carrera" :value="__('Carrera:')" class="block mb-1 text-xs text-gray-700 uppercase font-bold" />
            <select class="border-gray-300 p-2 w-full rounded-md" wire:model="carrera">
                <option value="0">--Seleccione--</option>
              @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach  

             </select>
        </div>

        <div class="mb-4">
            <x-input-label for="corte" :value="__('Corte Semestral:')" class="block mb-1 text-xs text-gray-700 uppercase font-bold" />
             <select class="border-gray-300 p-2 w-full rounded-md" wire:model="corte">
                <option value="" >--Seleccione--</option>
                <option value="1">Enero - Marzo</option>
                <option value="2">Abril - Junio</option>
                <option value="3">Julio - Septiembre</option>
                <option value="4">Octubre - Diciembre</option>
              </select>
        </div>
        <div class="mb-4">
            <x-input-label for="fechainicio" :value="__('Fecha Inicio:')" class="block mb-1 text-xs text-gray-700 uppercase font-bold" />
            <input id="termino" type="date" placeholder="" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 
            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" wire:model="fechainicio">
            
        </div>   
        <div class="mb-4">
            <x-input-label for="fechafin" :value="__('Fecha Fin:')" class="block mb-1 text-xs text-gray-700 uppercase font-bold" />
            <input id="termino" type="date" placeholder="" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 
            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" wire:model="fechafin">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto">
               Consultar
            </button>
        </div>

        <div class="w-full h-16 mt-5">
            <button wire:click="export"
                class="w-full flex items-center justify-center px-4 bg-indigo-700 py-2 bg-blue text-white rounded-lg cursor-pointer">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="ml-2 text-base leading-normal uppercase font-bold">descargar!</span>
                <input type='file' class="hidden" />
            </button>
        </div>

    </form>

    

</div>
