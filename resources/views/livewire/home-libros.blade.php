<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/swipper.css') }}">
</head>

<body>
    {{-- Our collection --}}
    <div class="mt-20 overflow-hidden lg:py-5 bg-white">
        <h3 class="uppercase text-4xl font-bold px-5 w-full md:px-40 text-indigo-700">conoce nuestra colleción</h3>
        <div class="md:flex md:justify-center p-5 text-2xl">
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    @foreach ($libros as $libro)
                        <div class="w-56 p-2 mt-10">
                            <article class="overflow-hidden">
                                <div class="max-w-md p-3">
                                    <img alt="Imagen {{ $libro->titulo }}" class="h-40 mx-auto object-contain object-center rounded-md" src="{{ asset('storage/libros/' . $libro->imagen) }}" />
                                </div>
                                <div class="p-4 md:p-0 h-16">
                                    <h3 class="mt-1 text-base text-gray-900 capitalize md:mb-1">
                                        <i class="fa-solid fa-pen-nib text-sm"></i>
                                        {{ Str::limit($libro->titulo, 25) }}
                                    </h3>
                                </div>
                                <time class="block text-xs text-gray-500 md:mb-3 px-4 md:px-0 mt-3">
                                    <i class="fa-solid fa-calendar-days text-gray-900 text-sm"></i>
                                    {{ $libro->created_at->format('d/m/Y') }}
                                </time>
                                <a href="{{ route('show.books', $libro->id) }}" class="inline-block text-gray-500 text-xs px-4 md:px-0 hover:text-indigo-800">
                                    Mas información <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- preview Books--}}
    <div class="py-10 bg-gray-100" id="categorias">
        <h3 class="text-3xl uppercase font-bold text-center">Selecciona tu categoria</h3>
        <div class="flex flex-wrap justify-center mt-14 swiper mySwiper py-10">
            {{-- Inventory --}}
            <div class="swiper-wrapper">
                @foreach ($categorias as $categoria)
                <div class="flex flex-col items-center swiper-slide">
                    @switch($categoria->id)
                    @case(1)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/sistemas.png') }}" alt="Icon sistemas">
                    </div>
                    @break
                    @case(2)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/contaduria.png') }}" alt="Icon contabilidad">
                    </div>
                    @break
                    @case(3)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/mecatronica.png') }}" alt="Icon mecatronica">
                    </div>
                    @break
                    @case(4)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/electronica.png') }}" alt="Icon electronmecanica">
                    </div>
                    @break
                    @case(5)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/gestion.png') }}" alt="Icon gestion empresarial">
                    </div>
                    @break
                    @case(6)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/industrial.png') }}" alt="Icon industrial">
                    </div>
                    @break
                    @case(7)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/electronica-2.png') }}" alt="Icon automotriz">
                    </div>
                    @break
                    @case(8)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/revista.png') }}" alt="Icon revista">
                    </div>
                    @break
                    @case(9)
                    <div class="w-12 h-12">
                        <img src="{{ asset('imgs/icons/cd-video.png') }}" alt="Icon automotriz">
                    </div>
                    @break
                    @default

                    @endswitch
                    <a href="{{ route('dashboard') }}" class="mb-1 text-xl font-medium text-gray-900 text-center">{{
                        $categoria->categoria }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                slidesPerView: 1,
                centeredSlides: false,
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
</body>

</html>
