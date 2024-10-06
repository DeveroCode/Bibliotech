<form class="flex flex-col items-center" wire:submit.prevent='editarPrestamo'>
    @if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="uppercase border border-red-600 bg-red-100 text-red-600 font-bold p-2 my-3 text-sm text-center">
            {{ session('message') }}
        </div>
    </div>
    @endif
    <fieldset class="flex gap-5 w-full justify-center my-10">
        {{-- Nombre alumno --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="name" wire:model="nombre"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Nombre del alumno')" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        {{-- carrera --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="carrera" wire:model="carrera"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Carrera')" />
            @error('carrera') <span class="error text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        {{-- Correo --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="correo" wire:model="correo"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Correo institucional')" />
            @error('correo') <span class="error text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

    </fieldset>

    <fieldset class="flex gap-5 w-full justify-center my-10">
        <div class="relative z-0  w-full md:w-1/3">
            <x-text-input id="user_biblio" wire:model="user_biblio"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('Nombre del bibliotecario')" />
            @error('user_biblio') <span class="error text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Tipo de prestamo --}}
        <div class="relative z-0  w-full md:w-1/3">
            <select id="tipo_prestamo" wire:model="tipo_prestamo"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" ">
                <option>Tipo préstamo</option>
                @foreach ($tipos_prestamos as $tipo)
                <option value="{{ $tipo->id }}" class="rounded-none">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- Folio --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="folio" wire:model="folio"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('No. Folio')" />
            @error('folio') <span class="error text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- cantidad --}}
        <div class="relative z-0 w-full md:w-1/3">
            <x-text-input id="cantidad" wire:model="cantidad"
                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                placeholder=" " />
            <x-input-label
                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                :value="__('No. de Libros')" />
            @error('total_books') <span class="error text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </fieldset>

    <x-primary-button class="mt-5">
        Actualizar Prestamo
    </x-primary-button>
</form>