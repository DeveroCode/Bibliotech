<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imprimir reporte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Alert --}}
            @if (session()->has('message') || session()->has('error'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div
                    class="uppercase border p-2 my-3 text-sm text-center font-bold
            {{ session()->has('message') ? 'border-green-600 bg-green-100 text-green-600' : 'border-red-600 bg-red-100 text-red-600' }}">
                    {{ session('message') ?? session('error') }}
                </div>
            </div>
            @endif

            <div>
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">{{ '¡Bienvenido ' . Auth::user()->name
                    .' seleccione que tipo de reporte desea imprimir!'}}</h2>

                <div class="md:flex md:justify-center p-5 text-2xl">
                    <livewire:generar-pdf />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
