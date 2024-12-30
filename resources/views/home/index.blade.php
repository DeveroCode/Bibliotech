<x-app-layout>
    <div class="py-20 md:py-24 bg-white overflow-hidden">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:my-auto lg:max-w-7xl flex flex-row-reverse mb-32">
            <div class="hidden md:w-full md:flex justify-center items-center ">
                <div class="relative">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                        class="absolute inset-0 w-full h-full z-10">
                        <path fill="#8A3FFC"
                            d="M36.5,-49.6C47.4,-42.3,56.4,-31.7,65.4,-18C74.4,-4.2,83.4,12.9,80,26.8C76.6,40.7,60.9,51.5,45.5,62.4C30.1,73.4,15.1,84.6,-0.2,85C-15.6,85.3,-31.1,74.8,-37.8,61C-44.5,47.2,-42.3,30.1,-46.2,15.6C-50.1,1.1,-60,-10.8,-57,-18.1C-54,-25.3,-38.1,-27.9,-26.5,-35C-14.8,-42.1,-7.4,-53.7,2.7,-57.4C12.8,-61.1,25.6,-56.9,36.5,-49.6Z"
                            transform="translate(100 100)" />
                    </svg>
                    <img src="{{ asset('imgs/people.png') }}" alt="Imge people funny" class="relative z-20" />
                </div>
            </div>

            <div class="relative w-full md:w-3/4">
                <h2 class="uppercase text-4xl leading-8 font-extrabold tracking-tight sm:text-6xl">hola, somos la nueva
                    biblioteca virtual</span></h2>
                <p class="mt-4 max-w-3xl mx-auto text-sm text-gray-500">La nueva plataforma del ITSNCG que conecta a
                    toda la comunidad escolar</p>

                {{-- Barra de busqueda --}}
                <div class="relative inset-0 bg-opacity-75 z-10 flex items-center space-x-2 md:space-x-4">
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a type="submit" href="{{ route('search.books') }}"
                            class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-inidgo-800 focus:ring-4 focus:ring-blue-300 uppercase">Iniciar
                            búsqueda</a>
                    </div>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a type="submit" href="{{ route('loans.status') }}"
                            class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-indigo-700 bg-white rounded-lg border border-gray-300 focus:ring-4 focus:ring-gray-300 uppercase">Verificar
                            préstamo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden md:py-24">
        <h3 class="px-5 md:px-0 text-center font-bold text-3xl md:text-5xl">Nos preocupamos por una mejor navegación
        </h3>
        <p class="px-5 md:px-0 text-lg text-center font-semibold text-indigo-700 mt-2">Por eso hemos
            incluido</p>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl grid grid-row-3 lg:grid-cols-3 md:gap-10 mt-16 items-center mb-16">
            <div class="col-span-1 py-5 md:py-0 text-center md:text-justify">
                <i class="fa-solid fa-mobile mr-3 text-indigo-700 text-4xl items-center"></i>
                <p class="text-lg font-bold capitalize">
                    Multiplataforma
                </p>
                <span class="text-gray-400">Con nuestra plataforma, puedes acceder a la biblioteca desde tu celular y
                    disfrutar de una experiencia de usuario óptima en cualquier dispositivo.</span>
            </div>
            <div class="col-span-1 py-5 md:py-0 text-center md:text-justify">
                <i class="fa-brands fa-windows mr-3 text-indigo-700 text-4xl"></i>
                <p class="text-xl font-bold capitalize">
                    Mejor interfaz de usuario
                </p>
                <span class="text-gray-400 ">Hemos mejorado la interfaz de usuario de nuestro gestor de biblioteca para
                    proporcionar una experiencia de usuario más intuitiva y fácil de usar.</span>
            </div>
            <div class="col-span-1 py-5 md:py-0 text-center md:text-justify">
                <i class="fa-solid fa-brain mr-1 text-indigo-700 text-4xl"></i>
                <p class="text-xl font-bold capitalize">
                    Préstamos Inteligentes
                </p>
                <span class="text-gray-400">La plataforma enviará alertas automáticamente al faltar 3 días para tu plazo
                    máximo, gracias al cálculo automático de la fecha de vencimiento.</span>
            </div>
        </div>
    </div>

    <div class="w-full pt-16 relative bg-white">
        <livewire:home-libros />
    </div>

    <livewire:send-suggestions />
</x-app-layout>