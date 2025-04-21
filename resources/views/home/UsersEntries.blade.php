<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consulta de acceso a la Biblioteca') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">Ingresa tu número de control escolar
                    para acceder a la biblioteca.</h2>

                <div class="p-5 mx-auto max-w-lg">
                    <livewire:users-entries />
                    <livewire:user-activity-registration />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>