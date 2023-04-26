<div class="flex items-center justify-center p-12 w-full">
    <div class="mx-auto md:w-[500px] w-[350px] bg-white">
        <form class="py-6 px-9" wire:submit.prevent='updatePie'>
            <div class="mb-6 pt-4">
                <label class="mb-5 block text-xl font-semibold lg:text-3xl">
                    Subida de archivos
                </label>

                <div class="mb-8">
                    <label for="file"
                        class="relative flex flex-col min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                        <div>
                            <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                Seleccione el encabezado
                            </span>
                            <input id="header"
                                class="mt-1 md:w-72 w-[250px] inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] cursor-pointer bg-transparent"
                                type="file" wire:model="header" accept="image/*" />

                            {{-- Preview image --}}
                            <div class="my-5 w-80">
                                @if ($header)
                                Imagen: <img src="{{ $header->temporaryUrl() }}">
                                @endif
                            </div>

                            <x-input-error :messages="$errors->get('header')" class="mt-2" />
                        </div>

                        <div>
                            <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                Seleccione el pie de página
                            </span>
                            <input id="footer"
                                class="mt-1 md:w-72 w-[250px] inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] cursor-pointer bg-transparent"
                                type="file" wire:model="footer" accept="image/*" />

                            {{-- Preview image --}}
                            <div class="my-5 w-80">
                                @if ($footer)
                                Imagen: <img src="{{ $footer->temporaryUrl() }}">
                                @endif
                            </div>

                            <x-input-error :messages=" $errors->get('footer')" class="mt-2" />
                        </div>
                    </label>
                </div>
            </div>

            <div class="flex justify-center">
                <button
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 uppercase">
                    Subir imagenes
                </button>
            </div>
        </form>
    </div>
</div>