<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido' . ' ' . Auth::user()->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Alert
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div
                    class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
                    {{ session('message') }}
                </div>
            </div>
            @endif --}}

            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 text-lg">
                    {{ __('Verifica y Actualiza la información de manera inmediata') }}

                    {{-- Links --}}
                    <div class="flex min-h-screen text-gray-800 flex-wrap">
                        <div class="mt-10 w-full">
                            {{-- Cards --}}
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12 md:col-span-6">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4 h-auto">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                            <a href="{{ route('admin.create') }}"
                                                class="text-lg font-bold underline text-blue-700">Actualizar
                                                base de datos</a>
                                            <span class="text-sm text-gray-500">Actualiza la base de datos de los
                                                alumnos del ITSNCG</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- card 2 --}}
                                <div class="col-span-12 md:col-span-6">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4 h-auto">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                            <a href="#" class="text-lg font-bold underline text-blue-700">Administrar
                                                usuarios</a>
                                            <span class="text-sm text-gray-500">Modifica usuarios y designa sus
                                                privilegios</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- card 3 --}}
                                <div class="col-span-12 md:col-span-6">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4 h-auto">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                            <a href="#" class="text-lg font-bold underline text-blue-700">Lista de
                                                usuarios</a>
                                            <span class="text-sm text-gray-500">Verifica usarios inactivos, elimina o
                                                actualiza sus datos</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- card 4 --}}
                                <div class="col-span-12 md:col-span-6">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4 h-auto">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                            </svg>


                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                            <a href="#" class="text-lg font-bold underline text-blue-700">Actividades
                                                recientes</a>
                                            <span class="text-sm text-gray-500">Verifica las ultimas actividades de los
                                                usuarios</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>