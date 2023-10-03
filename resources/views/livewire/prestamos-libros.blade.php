<div>
    {{-- Form alumno --}}
    <div class="mt-2">
        {{-- Start form for students --}}
        <span class="text-xl font-bold mb-10">Datos del alumno</span>
        <hr class="bg-indigo-800 mt-3">
        <div class="mx-auto py-5">
            <div class="flex flex-wrap justify-end items-center">
                <div class="mt-10 mb-5 w-full justify-end md:mr-4">
                    <label for="word" class="block mb-1 text-sm text-gray-500 uppercase font-bold">No. Control</label>
                    <livewire:search-user />
                </div>
            </div>
        </div>


        <form class="flex gap-5 md:flex-row flex-col py-6 justify-center items-center mb-20">
            @if (count($alumno) > 0 )
            {{-- nombre --}}
            <div class="relative z-0 w-full md:w-1/3">

                <x-text-input id="name" wire:model="nombre"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$alumno[0]->nombre" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Nombre del alumno')" />
                @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
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
            @endif
        </form>

        {{-- End form for students --}}
        <span class="text-xl font-bold">Datos del prestamista y material didáctico</span>
        <hr class="bg-indigo-800 mt-3">

        {{-- Search ISB --}}
        <div class="mt-10">
            <livewire:filtrar-isbn />
        </div>

        {{-- form for librarian--}}
        <form class="flex flex-col md:flex-row py-6 gap-10">
            <div class="block-primary w-full flex flex-col gap-5">
                @if (isset($isbn))
                {{-- nombre --}}
                <div class="relative z-0 md:w-full">
                    <x-text-input id="user_biblio" wire:model="user_biblio"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->user_biblio" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('Nombre del bibliotecario')" />
                    @error('user_biblio') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                {{-- folio --}}
                <div class="relative z-0 md:w-full">
                    <div class="relative z-0 md:w-full">
                        <x-text-input id="folio" wire:model="folio"
                            class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                            placeholder=" " :value="$isbn[0]->folio" />
                        <x-input-label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                            :value="__('No. Folio')" />
                        @error('folio') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                {{-- date --}}
                <div class="relative z-0 md:w-full">
                    <x-text-input id="fecha_inicial" wire:model="fecha_inicial"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->fecha_inicial" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('Fecha')" />
                    @error('fecha_inicial') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="block-secondary w-full flex flex-col gap-5">
                {{-- Name Book --}}
                <div class="relative z-0 w-full">
                    <x-text-input id="titulo" wire:model="titulo"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->titulo" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('Titulo')" />
                    @error('titulo') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                {{-- Autores --}}
                <div class="relative z-0 w-full">
                    <x-text-input id="autores" wire:model="autores"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->autores" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('Autor || Autores')" />
                    @error('autores') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                {{-- ISBN--}}
                <div class="relative z-0 w-full">
                    <x-text-input id="identificacion" wire:model="identificacion"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->identificacion" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('ISBN')" />
                    @error('identificacion') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="block-trhee w-full flex flex-col gap-5">
                {{-- No. adquisicion --}}
                <div class="relative z-0 w-full">
                    <x-text-input id="no_adquisicion" wire:model="no_adquisicion"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->no_adquisicion" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('No. Adquisición')" />
                    @error('no_adquisicion') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                {{-- Renovacion --}}
                <div class="relative z-0 w-full">
                    <x-text-input id="fecha_renovacion" wire:model="fecha_renovacion"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->fecha_renovacion" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('Fecha de renovacion')" />
                    @error('fecha_renovacion') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                {{-- Cantidad --}}
                <div class="relative z-0 w-full">
                    <x-text-input id="cantidad" wire:model="cantidad"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->cantidad" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('No. de Libros')" />
                    @error('cantidad') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                @endif
            </div>
        </form>

        <div class="pt-10 flex justify-end">
            <input type="submit"
                class="inline-flex uppercase items-center justify-center md:justify-start w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700"
                value="Enviar e Imprimir">
        </div>
    </div>
</div>