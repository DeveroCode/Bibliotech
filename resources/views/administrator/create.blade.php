<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{ '¡Bienvenido' . Auth::user()->name .' al panel de "Agregar Libro"! Esta sección te permite crear y gestionar tus libros en línea de una manera fácil y sencilla.'}}
            </div>

            {{-- Links --}}
            <div class="p-6 ">
                <div class="container w-1/3 mx-auto px-4 py-4 sm:px-6 lg:px-8">
                    <div class="bg-sea-400 p-4 rounded-md">
                        <p class="text-xl text-gray-800 uppercase font-bold mb-2">Agregar</p>
                        <div class="flex justify-center">
                        <a href="{{ route('dashboard.create') }}" class="text-blue-500 hover:text-blue-600 underline">Libro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stack('scripts')
    </div>
</x-app-layout>

