<div>
    @if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="text-green-600 font-bold mb-4 transition-opacity duration-500 ease-in-out">
        {{ session('message') }}
    </div>
    @endif

    @if(!empty($data))
    <form wire:submit.prevent='createActivity'>
        <fieldset class="mb-5 flex flex-col md:flex-row gap-5">
            <div class="md:w-1/2 w-full">
                <x-input-label for="nombre" :value="__('Nombre(s)')" class="uppercase" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre"
                    :value="old('nombre')" placeholder="Ej: Carlos Ramirez" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
            <div class="md:w-1/2 w-full">
                <x-input-label for="last_names" :value="__('Apellidos')" class="uppercase" />
                <x-text-input id="last_names" class="block mt-1 w-full" type="text" wire:model="apellidos"
                    :value="old('apellidos')" placeholder="Ej: Ramirez Herrera" />
                <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
            </div>
        </fieldset>

        <fieldset class="mb-5 flex md:flex-row flex-col gap-5">
            <div class="md:w-1/2 w-full">
                <x-input-label for="control" :value="__('Número de control')" class="uppercase" />
                <x-text-input id="control" class="block mt-1 w-full" type="text" wire:model="no_control"
                    :value="old('no_control')" placeholder="Ej: 19CG0063" />
                <x-input-error :messages="$errors->get('no_control')" class="mt-2" />
            </div>
            <div class="md:w-1/2 w-full">
                <x-input-label for="carrera" :value="__('Carrera')" class="uppercase" />
                <x-text-input id="carrera" class="block mt-1 w-full" type="text" wire:model="carrera"
                    :value="old('carrera')" placeholder="Ej: ISC" />
                <x-input-error :messages="$errors->get('carrera')" class="mt-2" />
            </div>
        </fieldset>

        <fieldset class="mb-5 flex gap-5">
            <div class="w-1/2">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="activity">Actividad</label>
                <select class="border-gray-300 p-2 w-full rounded-md" wire:model="actividad" id="activity">
                    <option selected>--Seleccione--</option>
                    <option value="Estudio" selected>Estudio</option>
                    <option value="Consulta">Consulta</option>
                    <option value="Tarea">Tarea</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="w-1/2">
                <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="sexo">Sexo</label>
                <select class="border-gray-300 p-2 w-full rounded-md capitalize" wire:model="sexo" id="sexo">
                    <option selected disabled>--Seleccione--</option>
                    <option selected value="{{ data_get($data, 'sexo', '') }}">{{ data_get($data, 'sexo', '') }}
                    </option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <x-input-label for="subject" :value="__('Materia')" class="uppercase" />
            <x-text-input id="subject" class="block mt-1 w-full" type="text" wire:model="materia"
                :value="old('materia')" placeholder="Ej: Matemáticas" />
            <x-input-error :messages="$errors->get('materia')" class="mt-2" />
        </fieldset>

        <div class="mt-5">
            <x-button type="submit">Registrarse</x-button>
        </div>
    </form>
    @endif
</div>

<pre class="hidden">{{ var_dump($data) }}</pre>