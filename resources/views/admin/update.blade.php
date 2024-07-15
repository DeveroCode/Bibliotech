<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inserta o actualiza tu base de datos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:justify-center p-5 text-2xl">
                <livewire:insertar-db />
            </div>
        </div>
    </div>
</x-app-layout>