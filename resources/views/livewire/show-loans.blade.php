<div>
    <div class="w-full flex flex-wrap">
        @foreach ($loans as $loan)
        <div class="bg-white relative shadow-lg  rounded-3xl p-4 m-4">
            <div class="flex-none sm:flex">
                <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
                    <img src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                        alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
                    <a href="#"
                        class="absolute -right-2 bottom-2  -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="flex-auto justify-evenly">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center  my-1">
                            <span class="mr-3 rounded-full bg-white w-8 h-8">
                                <img src="https://image.winudf.com/v2/image1/Y29tLmJldHMuYWlyaW5kaWEudWlfaWNvbl8xNTU0NTM4MzcxXzA0Mw/icon.png?w=&amp;fakeurl=1"
                                    class="h-8 p-1">
                            </span>
                            @foreach ($loan->alumnos as $alumno)
                            <div class="flex flex-row justify-center items-center space-x-32">
                                <h2 class="text-md md:text-xl md:font-medium">
                                    {{ $alumno->nombre }}
                                </h2>
                                <span class="ml-3 text-blue-800 text-[15px] md:text-xl">{{ $alumno->no_institucional }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="border-dashed border-b-2 my-5"></div>
                    <div class="flex items-center gap-10">
                        {{-- Date --}}
                        <div class="flex flex-col">
                            <div class="flex-auto text-xs text-gray-400 my-1">
                                <span class="mr-1 ">Fecha</span><span>{{
                                    Carbon\Carbon::parse($loan->fecha_inicio)->format('d-m-Y') }}</span>
                            </div>
                            @foreach ($loan->libros as $libro)
                            <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">
                                {{ Str::limit($libro->titulo, 20) }}
                            </div>
                            @endforeach
                            @if ($loan->autores->isNotEmpty())
                            <div class="text-xs font-medium">{{ $loan->autores->first()->autor }}</div>
                            @endif
                        </div>
                        <div class="flex flex-col mt-4">
                            <div class="flex-auto text-xs text-gray-400 my-1">
                                <span class="mr-1">Renovacion</span><span>{{
                                    Carbon\Carbon::parse($loan->fecha_fin)->format('d-m-Y')
                                    }}</span>
                            </div>
                            <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">Cantidad
                            </div>
                            <div class="text-xs">{{ $loan->cantidad }}</div>
                        </div>

                    </div>
                    <div class="border-dashed border-b-2 my-5 pt-5">
                        <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                        <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                    </div>
                    <div class="flex items-center mb-5 p-5 text-sm">
                        <div class="flex flex-col">
                            <span class="text-sm">Prestado por</span>
                            <div class="font-semibold">{{ $loan->user->name }}</div>

                        </div>
                        <div class="flex flex-col ml-auto">
                            <span class="text-sm">Tipo de usuario</span>
                            <div class="font-semibold">Bibliotecario</div>
                        </div>
                    </div>
                    <div class="flex items-center mb-4 px-5">
                        <div class="flex flex-col text-sm">
                            <span class="">Hora</span>
                            <div class="font-semibold">{{ $loan->created_at->format('h:i A')}}
                            </div>

                        </div>
                        <div class="flex flex-col mx-auto text-sm">
                            <span class="">No. Folio</span>
                            <div class="font-semibold">{{ $loan->folio }}</div>
                        </div>
                        <div class="flex flex-col text-sm">
                            <span class="">Entrgado</span>
                            <div class="font-semibold uppercase">Pendiente</div>

                        </div>
                    </div>
                    <div class="border-dashed border-b-2 my-5 pt-5">
                        <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                        <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>