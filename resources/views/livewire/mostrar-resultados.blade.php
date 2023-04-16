<div class="py-10">
    <div class="max-w-8xl mx-auto">
        <div class="py-6">
            <div class="flex flex-col md:flex-row flex-wrap gap-10 items-center justify-center">
                @foreach ($libros as $libro)
                    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden mb-5">
                        <div class="w-1/3 bg-cover">
                            <img src="{{ asset('storage/libros/' . $libro->imagen) }}" alt="Libro . {{ $libro->titulo }}">
                        </div>
                        <div class="w-2/3 p-4">
                            <h2 class="text-gray-900 font-bold text-2xl capitalize">{{ Str::limit($libro->titulo, 19) }}
                            </h2>
                            <p class="mt-2 text-gray-600 text-sm h-24">{{ Str::limit($libro->descripcion, 100) }}</p>
                            <div class="flex item-center capitalize">
                                @if ($libro->cantidad <= 10) <span
                                    class="inline-flex items-center gap-1 rounded-full px-2 py-1 mt-2 md:mt-0 text-xs capitalize font-semibold text-red-600 ml-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-600 capitalize"></span>
                                    Disponibles:{{ $libro->cantidad}}
                                    </span>
                                    @elseif($libro->cantidad === 0)
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full text-xs capitalize font-semibold text-red-600 ml-2">
                                        Sin disponibilidad
                                    </span>
                                    @else
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full text-xs font-semibold text-green-600 ml-2">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600 capitalize"></span>
                                        Disponibles {{ $libro->cantidad}}
                                    </span>
                                @endif
                            </div>
                            <div class="flex item-center justify-between mt-5">
                                    <a type="submit"
                                        href="{{ route('show.books', $libro->id) }} }}"
                                        class="px-3 py-2 bg-indigo-500 hover:transition-all hover:bg-indigo-800 cursor-pointer hover:ease-out text-white text-xs font-bold uppercase rounded">mas
                                        información
                                    </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-10">
            {{ $libros->links() }}
        </div>
    </div>
</div>
