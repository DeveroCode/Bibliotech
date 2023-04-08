<div class="p-5 lg:px-40 bg-white">
    <article class="flex flex-col md:flex-row md:overflow-hidden my-14">
        <div class="max-w-md p-4 md:order-2">
            <img alt="Imagen {{ $libro->titulo }}"
                class="mx-auto object-contain object-center shadow-sm"
                src="{{ asset('storage/libros/' . $libro->imagen) }}" />
        </div>

        <div class="p-4 sm:p-6 w-full md:w-2/3 md:order-1 flex flex-row md:flex-col">
            <div class="md:px-10">
                <div class="text-center md:text-start">
                    <h2 class="text-4xl font-bold capitalize">{{ $libro->titulo }}</h2>
                    <span class="font-extrabold text-gray-500 capitalize">Por {{ json_decode($libro->autores)[0]->autor }}</span>
                    <p class="py-10 text-start">{{ $libro->descripcion }}</p>
                </div>

                <div class="flex flex-col lg:flex-row lg:justify-between">
                    <div>
                        <a href="{{ route('home') }}"
                                class="inline-flex items-center px-10 py-2 bg-purple-600
                                border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                hover:bg-purple-700  focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2
                                focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            regresar
                        </a>
                    </div>

                    <div class="mt-3">
                        <span class="mr-3 mt-10">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Estante: AE
                        </span>
                        @switch($libro->categoria->id)
                            @case(1)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 mt-2 md:mt-0 py-1 text-xs capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(2)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-indigo-100 px-2 py-1 md:mt-0 text-xs capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(3)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 md:mt-0 text-xs capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(4)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-1 md:mt-0 text-xs capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(5)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 text-xs md:mt-0 capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(6)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-xs md:mt-0 capitalize font-semibold text-blue-600">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @case(7)
                                <span
                                class="inline-flex items-center gap-1 rounded-full bg-orange-100 px-2 py-1 text-xs md:mt-0 capitalize font-semibold text-blue-500">
                                    {{ $libro->categoria->categoria}}
                                </span>
                                @break
                            @default
                        @endswitch

                        @if ($libro->cantidad <= 10)
                            <span
                            class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 py-1 mt-2 md:mt-0 text-xs capitalize font-semibold text-red-600 ml-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-600 capitalize"></span>
                                Disponibles:{{ $libro->cantidad}}
                            </span>
                        @elseif($libro->cantidad === 0)
                            <span
                            class="inline-flex items-center gap-1 rounded-full bg-orange-600 px-2 py-1 text-xs capitalize font-semibold text-red-600 ml-2">
                                Sin disponibilidad
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-600 ml-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600 capitalize"></span>
                                Disponibles {{ $libro->cantidad}}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </article>

    <div class="py-10 max-w-7xl">
        <h3 class="text-3xl uppercase font-bold text-center">Recomendaciones para ti</h3>
        <div class="flex flex-wrap justify-center swiper mySwiper">
            {{-- Inventory --}}
            <div class="swiper-wrapper mt-10 items-center">
                @foreach ($librosRelacionados as $relacionado)
                <div class="flex flex-col items-center swiper-slide max-w-sm m-4">
                    <div class="w-28 h-32 absolute z-10">
                        <img class="object-cover w-full h-full" src="{{ asset('storage/libros/' . $relacionado->imagen) }}" alt="Imagen {{ $libro->titulo }}">
                    </div>
                    <div class="bg-gray-100 rounded-lg shadow-md p-5 h-44 relative z-0 mt-28">
                        <div class="h-24">
                            <h5 class="text-gray-900 font-bold text-lg capitalize tracking-tight mb-2 dark:text-white">{{ Str::limit($relacionado->titulo, 31) }}</h5>
                            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400 capitalize">
                                @foreach($relacionado->autores as $autor)
                                    {{ $autor->autor }}
                                @endforeach
                            </p>
                        </div>

                        <div class="h-20 py-2">
                            <a href="{{ route('show.books', $relacionado->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Mas información
                                <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="swiper-button-next text-indigo-700"></div>
            <div class="swiper-button-prev text-indigo-700"></div>
        </div>
    </div>
</div>

{{-- Swiper --}}
@push('swipper')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          loop: true,
          spaceBetween: 30,
          keyboard: {
            enabled: true,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {
                640: {
                slidesPerView: 1,
                centeredSlides: true,
                },
                768: {
                slidesPerView: 3,
                centeredSlides: false,
                },
                1024: {
                slidesPerView: 4,
                centeredSlides: true,
                }
            }
        });
    </script>
@endpush
