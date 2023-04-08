<x-app-layout>
    <div class="py-16 bg-white overflow-hidden lg:py-24">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl flex flex-row-reverse mb-32">
            <div class="w-full flex justify-center items-center ">
                <div class="relative">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full z-10">
                        <path fill="#8A3FFC" d="M36.5,-49.6C47.4,-42.3,56.4,-31.7,65.4,-18C74.4,-4.2,83.4,12.9,80,26.8C76.6,40.7,60.9,51.5,45.5,62.4C30.1,73.4,15.1,84.6,-0.2,85C-15.6,85.3,-31.1,74.8,-37.8,61C-44.5,47.2,-42.3,30.1,-46.2,15.6C-50.1,1.1,-60,-10.8,-57,-18.1C-54,-25.3,-38.1,-27.9,-26.5,-35C-14.8,-42.1,-7.4,-53.7,2.7,-57.4C12.8,-61.1,25.6,-56.9,36.5,-49.6Z" transform="translate(100 100)" />
                    </svg>
                    <img src="{{ asset('imgs/people.png') }}" alt="Imge people funny" class="relative z-20"/>
                </div>
            </div>

            <div class="relative w-full md:w-3/4">
                <h2 class="uppercase text-4xl leading-8 font-extrabold tracking-tight sm:text-6xl">hola, somos la nueva biblioteca virtual</span></h2>
                <p class="mt-4 max-w-3xl mx-auto text-sm text-gray-500">La nueva plataforma del ITSNCG que conecta a toda la comunidad escolar</p>

                {{-- Barra de busqueda --}}
                <div class="relative inset-0 bg-opacity-75 z-10 flex items-center">
                    <div class="relative flex items-center bg-white rounded-md shadow-sm w-full md:w-10/12 mt-10">
                        <input type="text" name="search" id="search" class="block w-full pl-3 pr-10 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" placeholder="Buscar...">
                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-md">
                            <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
                            <span class="ml-2">Buscar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full py-16 relative">
        <livewire:home-libros/>
    </div>

    {{-- <div class="w-full py-16" style="background-image: {{ asset('imgs/background-book.svg') }};">
        <livewire:home-libros/>
    </div> --}}
</x-app-layout>
