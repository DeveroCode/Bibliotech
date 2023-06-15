<form class="md:w-1/2 mt-10">
    <section class="mb-10">
        <h2 class="font-bold">Configuraremos las cuentas de tus usuarios</h2>
        <x-input-label :value="__('Configura sus permisos y privilegios. Aquí podrás definir
        qué
        acciones pueden realizar tus usuarios, como acceder a determinadas funcionalidades o ver y
        modificar ciertos datos. Asegúrate de personalizar las configuraciones según las necesidades
        y
        roles de cada usuario.')" class="mt-2" />
    </section>

    {{-- <div>
        <label for="imagen" class="mb-5 text-sm uppercase text-black font-bold">Imagen de Perfil</label>

        <div class="flex">
            <div class="relative mt-10 mb-20">
                <label for="archivo-input" class="bg-black mt-10 px-16 py-10 rounded-md cursor-pointer relative">
                    <img src="{{ asset('imgs/icons/profile.svg') }}"
                        class="absolute w-28  -translate-x-[-6%] -translate-y-[38%] transform " alt="">
                </label>
            </div>

            <div>
                <input id="archivo-input" type="file" accept=".xlsm, .xlsx, .xls" wire:model="archivo" class="hidden" />
                <label for="archivo-input" class=" block font-medium text-sm text-gray-700 dark:text-gray-300">
                    Seleccionar archivo
                </label>
            </div>
        </div>


        <x-input-label for="imagen" :value="__('portada')" class="uppercase" />
        <x-text-input id="imagen" class="block text-sm mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />


        Preview image
        <div class="my-5 w-80">
            @if ($imagen)
            Imagen: <img src="{{ $imagen->temporaryUrl() }}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div> --}}

    {{-- Name --}}
    <div class="mt-5 flex gap-4">
        <div>
            <x-input-label for="name" :value="__('Nombres')" class="uppercase" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')"
                placeholder="Isaac Eduardo" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="apellidoP" :value="__('Apellido Paterno')" class="uppercase" />
            <x-text-input id="apellidoP" class="block mt-1 w-full" type="text" wire:model="apellidoP"
                :value="old('apellidoP')" placeholder="Carvajal" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="apellidoM" :value="__('Apellido Materno')" class="uppercase" />
            <x-text-input id="apellidoM" class="block mt-1 w-full" type="text" wire:model="apellidoM"
                :value="old('apellidoM')" placeholder="Rivera" />
            <x-input-error :messages="$errors->get('apellidoM')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex">
        <div class="w-1/2 mr-2">
            <x-input-label for="fecha" :value="__('fecha de alta')" class="uppercase" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" />
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

        <div class="w-1/2">
            <x-input-label for="email" :value="__('Correo')" class="uppercase" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" :value="old('email')"
                placeholder="Ej: calculo diferencial" placeholder="iscara@itsncg.edu.mx" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>


    <div class="mt-5 flex">
        <div class="w-1/2 mr-2">
            <x-input-label for="password" :value="__('password')" class="uppercase" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password"
                :value="old('password')" placeholder="Ej: 123456" />
        </div>

        <div class="w-1/2">
            <x-input-label for="genero" :value="__('Genero')" class="uppercase" />
            <x-text-input id="genero" class="block mt-1 w-full" type="text" wire:model="genero"
                :value="old('genero')" />
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex">
        <div class="md:w-1/2 mr-2">
            <x-input-label for="rol" :value="__('Rol')" class="uppercase" />
            <x-text-input id="rol" class="block mt-1 w-full" type="text" wire:model="rol" :value="old('rol')"
                placeholder="Bibliotecario, Invitado, Administrador" />
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <div class="md:w-1/2">
            <x-input-label for="telefono" :value="__('Telefono')" class="uppercase" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="tel" wire:model="telefono"
                :value="old('telefono')" placeholder="Ej: Mexico: Addisson Wesley 1998" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex flex-col">
        <x-input-label for="telefono" :value="__('Imagen de perfil')" class="font-bold mb-5" />
        <div class="cont-image flex flex-row gap-10">
            <div class="items-center justify-center bg-grey-lighter w-1/3">
                <label
                    class="flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <input type='file' accept=".jpeg, .jpg, .png" class="hidden" id="imagen" />
                </label>
            </div>

            <div class="w-1/2">
                <label
                    class="h-8 w-36 text-center overflow-hidden rounded-lg bg-white text-sm text-gray-500 shadow border border-gray-200 justify-center items-center flex"
                    for="imagen"><span class="px-5 font-bold">Subir imagen!</span>
                </label>
                <span class="text-sm text-gray-400">.png, .jpeg, archivos que pesen máximo 8MB. Es recomendable de 256px
                    x
                    256px</span>
            </div>
        </div>
    </div>

    <x-primary-button class="mt-5">
        Crear usuario
    </x-primary-button>

</form>