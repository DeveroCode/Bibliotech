<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buscador de  préstamos avanzado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="mb-10 text-center text-2xl mt-10 font-bold uppercase">
                    Libros Más Solicitados en Inventario
                </h2>

                <div class="p-5">
                    <livewire:table-custom-loans />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>