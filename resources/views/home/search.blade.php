<x-app-layout>
    <x-slot name="header">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">
                {{ __('Buscando...') }}
            </h2>
    </x-slot>

    <div class="py-16 overflow-hidden lg:py-24">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h2 class="text-center text-4xl md:text-6xl leading-8 font-extrabold tracking-tight text-indigo-600 ">Encuentra tu libro de la mejor manera</h2>
                <p class="mt-4 max-w-3xl mx-auto text-center text-lg text-gray-500">busca entre {{ $libros_en_existencia }} libros disponibles</p>
            </div>

            <div>
                <livewire:filtrar-busquedas />
            </div>
        </div>


        <livewire:mostrar-resultados />
    </div>
</x-app-layout>
