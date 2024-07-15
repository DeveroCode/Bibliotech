<x-app-layout>
    <div class="py-12">
        {{-- Alert --}}
        @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div
                class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
                {{ session('message') }}
            </div>
        </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:flex md:justify-center p-5 text-2xl">
                    <section class="w-full md:w-1/2 mt-10">
                        <div class="flex flex-col items-center gap-11 mx-auto">
                            {{-- First Card Guest --}}
                            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg w-full sm:w-3/4 lg:w-1/2">
                                <div
                                    class="flex py-2 px-2 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="font-bold uppercase text-xl text-gray-500">Invitado</h2>
                                    <p class="mt-2 text-sm text-gray-500">Los usuarios invitados tienen permisos para
                                        realizar acciones básicas como ver contenido público, realizar búsquedas,
                                        navegar por el sitio o la aplicación.</p>
                                </div>
                            </div>

                            {{-- Second Card --}}
                            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg w-full sm:w-3/4 lg:w-1/2">
                                <div
                                    class="flex py-2 px-2 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="font-bold uppercase text-xl text-gray-500">Bibliotecario</h2>
                                    <p class="mt-2 text-sm text-gray-500">El usuario bibliotecario tiene permisos para
                                        la gestión de recursos, la administración de préstamos, la atención al usuario y
                                        la generación de informes.</p>
                                </div>
                            </div>

                            {{-- Third Card --}}
                            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg w-full md:w-3/4 lg:w-1/2">
                                <div
                                    class="flex py-2 px-2 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="font-bold uppercase text-xl text-gray-500">Administrador</h2>
                                    <p class="mt-2 text-sm text-gray-500">Los administradores tienen acceso completo y
                                        autoridad sobre todas las funcionalidades y datos del sistema, lo que les
                                        permite realizar tareas de configuración, gestión de usuarios, mantenimiento del
                                        sistema y toma de decisiones.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <livewire:crear-usuario />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>