<form class="w-full md:w-1/2 mt-10" wire:submit.prevent="saveUser">
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
            <x-input-error :messages="$errors->get('apellido_paterno')" class="mt-2" />
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

        <div class="w-full md:w-1/3">
            <x-input-label for="rol" :value="__('Rol')" class="uppercase" />
            <select id="rol" class="rounded-md mt-1 w-full border-gray-300" wire:model="rol">
                <option value="3" selected> ---Selección--- </option>
                @foreach ($roles as $rol)
                <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>
    </div>

    <x-primary-button class="mt-5 w-full md:w-auto">
        {{ $editMode ? 'Actualizar usuario' : 'Crear usuario' }}
    </x-primary-button>
</form>
