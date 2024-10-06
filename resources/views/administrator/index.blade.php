<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Alert --}}
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div
                    class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
                    {{ session('message') }}
                </div>
            </div>
            @endif

            <div class="overflow-hidden sm:rounded-lg p-6 text-gray-900 text-lg">
                {{ 'Bienvenido ' .Auth::user()->name }}
                {{-- Links --}}
                <div class="flex flex-row gap-10 min-h-screen text-gray-800">
                    <div class="mt-10 w-full">
                        {{-- Cards --}}
                        <livewire:show-cards-biblio>
                            {{-- Grafica --}}
                            <livewire:show-charts />
                            {{-- Table alumnos --}}
                            <section class="container mt-10 hidden md:flex md:flex-col mx-auto">
                                <h2 class="text-2xl font-bold py-3">Actividades recientes</h2>
                                <livewire:show-activities />
                            </section>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>