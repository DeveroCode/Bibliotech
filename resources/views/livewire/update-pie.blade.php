<div class="flex items-center justify-center p-12 w-full">
    <div class="mx-auto w-full max-w-[550px] bg-white">
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
                                class="mt-1 w-full inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] cursor-pointer bg-transparent"
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
                                class="mt-1 w-full inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] cursor-pointer bg-transparent"
                                type="file" wire:model="footer" accept="image/*" />

                            {{-- Preview image --}}
                            <div class="my-5 w-80">
                                @if ($footer)
                                Imagen: <img src="{{ $footer->temporaryUrl() }}">
                                @endif
                            </div>

                            <x-input-error :messages="$errors->get('footer')" class="mt-2" />
                        </div>
                    </label>
                </div>
            </div>

            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-indigo-600 hover:bg-indigo-800 hover:transition-all hover:ease-linear hover:duration-200 py-3 px-8 text-center text-xl font-semibold text-white outline-none">
                    Subir images
                </button>
            </div>
        </form>
    </div>
</div>