<div>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6">
            <div class="flex flex-col bg-white shadow-sm rounded p-4 h-auto">
                <div class="image w-full h-auto">
                    <img src="{{ asset('imgs/icons/database.svg') }}" alt="Dibujo de una base de datos">

                    <h2 class="mt-5 text-lg text-center font-bold">Selecciones su archivo de excel</h2>
                    <p class="text-sm text-center text-wrap">Seleccione archivos compatibles con excel: <span
                            class="font-bold">XLSM, XLSX, XLS</span></p>
                </div>

                <div class="w-full h-16 mt-5">
                    <form action="{{ route('admin.importar') }}" method="POST">
                        @csrf
                        <label for="archivo-input"
                            class="flex items-center justify-center px-4 bg-indigo-700 py-2 bg-blue text-white rounded-lg cursor-pointer"
                            wire:loading.class="cursor-not-allowed opacity-50" wire:target="crearAlumnos">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="ml-2 text-base leading-normal uppercase font-bold">upload!</span>
                        </label>
                        <input id="archivo-input" type="file" class="hidden" accept=".xlsm, .xlsx, .xls"
                            wire:model="archivo" wire:change="crearAlumnos" />
                        @error('archivo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </form>
                </div>
            </div>
        </div>

        {{-- Descargar --}}
        <div class=" col-span-12 md:col-span-6">
            <div class="flex flex-col bg-white shadow-sm rounded p-4 h-auto">
                <div class="image w-full h-auto">
                    <img src="{{ asset('imgs/icons/donwload-db.svg') }}" alt="Dibujo de una base de datos">

                    <h2 class="mt-5 text-lg text-center font-bold">Descargue una copia de su base de datos
                    </h2>
                    <p class="text-sm text-center text-wrap">Guarde una copia de su actual base de
                        datos<span class="font-bold"> en caso de haberla perdido</span></p>
                </div>

                <div class="w-full h-16 mt-5">
                    <label
                        class="flex items-center justify-center px-4 bg-indigo-700 py-2 bg-blue text-white rounded-lg cursor-pointer">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="ml-2 text-base leading-normal uppercase font-bold">Download!</span>
                        <input type='file' class="hidden" />
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>