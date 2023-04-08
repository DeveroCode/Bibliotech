<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">
            {{ __('Más información') }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <livewire:mostrar-libro :libro="$libro">
    </div>
</x-app-layout>
