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
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">
                    {{ '¡Bienvenido ' . Auth::user()->name . ', seleccione qué tipo de reporte desea imprimir!' }}
                </h2>

                <div class="md:flex md:justify-center p-5 text-2xl">
                    <livewire:generar-pdf />
                </div>
            </div>
        </div>
    </div>

    {{-- Botón fijo en la parte inferior derecha --}}
    <a href="{{ route('inventory.pie') }}"
        class="fixed bottom-4 right-4 z-50 flex items-center justify-center h-10 w-10 rounded-full bg-purple-700 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5
            1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5
            1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5
            1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375
            0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
    </a>

</x-app-layout>
