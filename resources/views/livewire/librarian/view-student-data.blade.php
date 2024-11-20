<div class="flex flex-wrap justify-end items-center">
    <div class="mt-10 mb-5 w-full justify-end md:mr-4">
        <label for="word" class="block mb-1 text-sm text-gray-500 uppercase font-bold">No. Control</label>
        <livewire:search-user />
    </div>

    @if (!$found &&count($alumno) > 0 )
    <form class="flex gap-5 w-full md:flex-row flex-col py-6 justify-center items-center mb-20">
        {{-- nombre --}}
        <div class="relative z-0 w-full md:w-1/3">

            <x-text-input id="name" wire:model="nombre"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " :value="$alumno[0]->nombre" />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Nombre del alumno')" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        {{-- carrera --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="carrera" wire:model="carrera"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " :value="$alumno[0]->carrera" />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Carrera')" />
            @error('carrera') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>
        {{-- Correo --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="correo" wire:model="correo"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " :value="$alumno[0]->correo" />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Correo institucional')" />
            @error('correo') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>
    </form>
    @endif
</div>