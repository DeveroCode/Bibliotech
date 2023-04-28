<div>
    <div class="mx-auto py-5">
        <form class="flex flex-wrap justify-end items-center">
            <div class="relative z-0 mb-5 w-full md:w-1/3 md:mr-4">
                <input type="text" name="no_institutcional" id="no_institutcional"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                    No. Institutcional
                </label>
                @error('no_institutcional') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <input type="submit"
                    class="inline-flex items-center w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700 text-center"
                    value="Buscar">
            </div>
        </form>
    </div>

    {{-- Form alumno --}}
    <div class="mt-2">
        {{-- Start form for students --}}
        <span class="text-xl font-bold mb-10">Datos del alumno</span>
        <hr class="bg-indigo-800 mt-3">

        <form class="flex gap-5 flex-row py-6 justify-center items-center mb-20">
            {{-- nombre --}}
            <div class="relative z-0 w-1/3">
                <input type="text" name="name" id="name"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                    Nombre del alumno
                </label>
                @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- carrera --}}
            <div class="relative z-0 w-1/3">
                <input type="text" name="carrera" id="carrera"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                    Carrera en curso
                </label>
                @error('carrera') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- Escuela --}}
            <div class="relative z-0 w-1/3">
                <input type="text" name="escuela" id="escuela"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                    Nombre de la escuela
                </label>
                @error('escuela') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </form>

        {{-- End form for students --}}
        <span class="text-xl font-bold">Datos del prestamista y material didactico</span>
        <hr class="bg-indigo-800 mt-3">

        {{-- Search ISB --}}
        <div class="mt-10">
            <livewire:filtrar-isbn />
        </div>

        {{-- form for librarian--}}
        <form class="flex flex-col py-6 gap-10">
            <div class="block-primary w-full flex flex-row gap-5">
                {{-- nombre --}}
                <div class=" relative z-0 w-1/3">
                    <input type="text" name="name_prestamista"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Nombre del prestamista
                    </label>
                </div>
                {{-- folio --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="name_prestamista"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        No. Folio
                    </label>
                </div>
                {{-- date --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="fecha_prestamo"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " value="{{
                            now()->format('d/m/Y') }}" />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Fecha
                    </label>
                </div>
            </div>

            <div class="block-secondary w-full flex flex-row gap-5">
                {{-- Name Book --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="nombre_liro"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Libro
                    </label>
                </div>
                {{-- Autores --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="autores"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Autores
                    </label>
                </div>
                {{-- ISBN--}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="isbn"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        ISBN
                    </label>
                </div>
            </div>

            <div class="block-trhee w-full flex flex-row gap-5">
                {{-- No. adquisicion --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="no.adquisicion"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        No. adquisicon
                    </label>
                </div>

                {{-- Renovacion --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="fecha_prestamo"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Renovacion
                    </label>
                </div>

                {{-- Estatus --}}
                <div class="relative z-0 w-1/3">
                    <input type="text" name="Estatus"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                        Estatus
                    </label>
                </div>
            </div>
        </form>

        <div class="pt-10 flex justify-end">
            <input type="submit"
                class="inline-flex uppercase items-center w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700 text-center"
                value="Enviar e Imprimir">
        </div>
    </div>
</div>clear
