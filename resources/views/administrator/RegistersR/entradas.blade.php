<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registro de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">{{ '¡Bienvenido al panel de "Registro de Usuarios"! 
                Está sección te permite registrar tu entrada a la Biblioteca del ITSNCG'}}</h2>

                <div class="md:flex md:justify-center p-5 text-2xl">
              
                    <livewire:registrar-usuarios/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>