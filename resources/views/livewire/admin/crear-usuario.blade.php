<form class="w-full md:w-1/2 mt-10" wire:submit.prevent='createUser'>
    <section class="mb-10">
        <h2 class="font-bold">Configuraremos las cuentas de tus usuarios</h2>
        <x-input-label :value="__('Configura sus permisos y privilegios...')" class="mt-2" />
    </section>

    {{-- Name --}}
    <div class="mt-5 flex flex-col sm:flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/3">
            <x-input-label for="name" :value="__('Nombres')" class="uppercase" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name"
                placeholder="Isaac Eduardo" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="w-full md:w-1/3">
            <x-input-label for="apellido_paterno" :value="__('Apellido Paterno')" class="uppercase" />
            <x-text-input id="apellido_paterno" class="block mt-1 w-full" type="text" wire:model="apellido_paterno"
                placeholder="Carvajal" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <div class="w-full md:w-1/3">
            <x-input-label for="apellido_materno" :value="__('Apellido Materno')" class="uppercase" />
            <x-text-input id="apellido_materno" class="block mt-1 w-full" type="text" wire:model="apellido_materno"
                placeholder="Rivera" />
            <x-input-error :messages="$errors->get('apellido_materno')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/2">
            <x-input-label for="fecha" :value="__('Fecha de Alta')" class="uppercase" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" />
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

        <div class="w-full md:w-1/2">
            <x-input-label for="email" :value="__('Correo')" class="uppercase" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
                placeholder="iscara@itsncg.edu.mx" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/2">
            <x-input-label for="password" :value="__('Password')" class="uppercase" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password"
                placeholder="Ej: 123456" />
        </div>

        <div class="w-full md:w-1/2">
            <x-input-label for="genero" :value="__('Género')" class="uppercase" />
            <select id="genero" class="rounded-md mt-1 w-full border-gray-300" wire:model="genero">
                <option value="3" selected> ---Selección--- </option>
                @foreach ($generos as $genero)
                <option value="{{ $genero['id'] }}">{{ $genero['nombre'] }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/2">
            <x-input-label for="rol" :value="__('Rol')" class="uppercase" />
            <select id="rol" class="rounded-md mt-1 w-full border-gray-300" wire:model="rol">
                <option value="3" selected> ---Selección--- </option>
                @foreach ($roles as $rol)
                <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <div class="w-full md:w-1/2">
            <x-input-label for="telefono" :value="__('Teléfono')" class="uppercase" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="tel" wire:model="telefono"
                placeholder="Ej: 6141234567" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex flex-col">
        <x-input-label for="imagen" :value="__('Imagen de perfil')" class="font-bold mb-5" />
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/3">
                <label
                    class="flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-50">
                    <svg class="w-8 h-8 mb-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <input type='file' accept=".jpeg, .jpg, .png" class="hidden" id="imagen" wire:model="imagen" />
                    <span class="text-sm">Subir imagen</span>
                </label>
            </div>

            <div class="w-full md:w-2/3">
                <label
                    class="h-10 w-full text-center overflow-hidden rounded-lg bg-white text-sm text-gray-500 shadow border border-gray-200 flex items-center justify-center mb-2">
                    <span class="px-5 font-bold">Subir imagen!</span>
                </label>
                <span class="text-sm text-gray-400">.png, .jpeg, máx. 8MB. Recomendado: 256x256px</span>
            </div>
        </div>
    </div>

    <x-primary-button class="mt-5 w-full md:w-auto">
        {{ $editMode ? 'Actualizar usuario' : 'Crear usuario' }}
    </x-primary-button>
</form>
