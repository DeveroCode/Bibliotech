<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inserta o actualiza tu base de datos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        {{-- Alert
        @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div
                class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
                {{ session('message') }}
            </div>
        </div>
        @endif --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:justify-center p-5 text-2xl">
                <livewire:insertar-db />
            </div>
        </div>
    </div>
</x-app-layout>