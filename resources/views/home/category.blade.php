<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">
            Libros relacionados con {{ $category->categoria }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <livewire:render-books :category="$category" />
    </div>
</x-app-layout>