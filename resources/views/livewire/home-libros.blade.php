<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/swipper.css') }}">
</head>

<body>
    <div class="py-10 bg-gray-100">
        <h3 class="text-3xl uppercase font-bold text-center">Selecciona tu categoria</h3>
        <div class="flex flex-wrap justify-center mt-14 swiper mySwiper">
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

    <div class="mt-36 overflow-hidden lg:py-24 bg-white">
        <h3 class="capitalize text-4xl font-extrabold text-center">nuestros libros</h3>

        <div class="md:flex md:justify-center p-5 text-2xl">
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    @foreach ($libros as $libro)
                        <div class="w-full md:w-1/4 mb-16 md:mr-6 md:mb-0">
                            <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg my-14">
                                <div class="max-w-md p-4">
                                    <img alt="Imagen {{ $libro->titulo }}"
                                        class="w-1/2 h-56 mx-auto object-contain object-center"
                                        src="{{ asset('storage/libros/' . $libro->imagen) }}" />
                                </div>


                                <div class="bg-white p-4 sm:p-6 h-36">
                                    <time class="block text-xs text-gray-500">
                                        {{ $libro->created_at->format('d/m/Y') }}
                                    </time>

                                    <a href="#">
                                        <h3 class="mt-0.5 text-lg text-gray-900 capitalize">
                                            {{ $libro->titulo }}
                                        </h3>
                                    </a>
                                </div>

                                <a href="{{ route('show.books', $libro->id) }}"
                                    class="inline-block text-gray-500 text-sm float-right py-3 px-3 hover:text-indigo-800">
                                    Mas información
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
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
