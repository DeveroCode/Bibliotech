<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 text-lg">
                    {{ 'Bienvenido ' .Auth::user()->name }}

                    {{-- Links --}}
                    <div class="flex min-h-screen text-gray-800 flex-wrap">
                        <div class="mt-10 w-full">
                            {{-- Cards --}}
                            <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Libros</div>
                                        <div class="font-bold text-lg">1259</div>
                                        </div>
                                    </div>
                                    </div>

                                    {{-- card 2 --}}
                                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                                <i class="fa-solid fa-user-minus"></i>
                                            </div>
                                            <div class="flex flex-col flex-grow ml-4">
                                            <div class="text-sm text-gray-500">Prestamos</div>
                                            <div class="font-bold text-lg">1259</div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- card 3 --}}
                                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                                <i class="fa-solid fa-file"></i>
                                            </div>
                                            <div class="flex flex-col flex-grow ml-4">
                                            <div class="text-sm text-gray-500">Prestamos</div>
                                            <div class="font-bold text-lg">1259</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-indigo-700">
                                                <i class="fa-solid fa-eye"></i>
                                            </div>
                                            <div class="flex flex-col flex-grow ml-4">
                                            <div class="text-sm text-gray-500">Visitantes</div>
                                            <div class="font-bold text-lg">1259</div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            {{-- Table alumnos --}}
                            <section class="container mt-10 hidden md:flex md:flex-col mx-auto">
                                <div class="flex flex-col">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                                        <tr>
                                                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                <div class="flex items-center gap-x-3">
                                                                    <button class="flex items-center gap-x-2">
                                                                        <span>No. Control</span>

                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </th>

                                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                Fecha
                                                            </th>

                                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                Estado
                                                            </th>

                                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                                Alumno
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    {{-- Body table --}}
                                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                        <tr>
                                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                                <div class="inline-flex items-center gap-x-3">
                                                                    <span class="text-gray-500">19CG0063</span>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">Jan 6, 2022</td>
                                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>

                                                                    <h2 class="text-sm font-normal">Renovado</h2>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                                                    <div>
                                                                        <h2 class="text-sm font-medium text-gray-800 dark:text-white ">Carlos Martinez</h2>
                                                                        <p class="text-xs font-normal text-gray-600 dark:text-gray-400">19CG0063@itsncg.edu.mx</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-6">
                                    <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                        </svg>

                                        <span>
                                            previous
                                        </span>
                                    </a>

                                    <div class="items-center hidden md:flex gap-x-3">
                                        <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
                                        <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
                                    </div>

                                    <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                        <span>
                                            Next
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
@push('scripts')
    <script src="https://kit.fontawesome.com/85d631ed4b.js" crossorigin="anonymous"></script>
@endpush

