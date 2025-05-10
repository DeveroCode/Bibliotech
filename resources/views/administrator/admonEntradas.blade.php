<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador de Entradas') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">
                    {{ '¡Bienvenido ' . Auth::user()->name . '! En esta vista podrás ver todas las entradas registradas en la biblioteca. Además, podrás aplicar distintos filtros para gestionar y visualizar la información de manera eficiente.' }}
                </h2>
                

                <livewire:table-entries-users />
            </div>
        </div>
    </div>
</x-app-layout>