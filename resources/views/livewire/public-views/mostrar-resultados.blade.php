<div class="py-10">
    <div class="flex flex-col md:flex-row flex-wrap gap-10 items-center justify-center px-14">
        @foreach ($libros as $libro)
            <div class="flex w-[350px] h-[200px] bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="w-1/3 h-full flex justify-center items-center bg-gray-100">
                    <img src="{{ asset('storage/libros/' . $libro->imagen) }}" alt="Imagen del libro" class="object-contain h-full w-full">
                </div>
                <div class="flex flex-col justify-between flex-1 p-4">
                    <div>
                        <h2 class="text-gray-900 font-bold text-xl capitalize truncate">
                            {{ Str::limit($libro->titulo, 20) }}
                        </h2>
                        <p class="mt-2 text-gray-600 text-sm overflow-hidden" style="height: 48px;">
                            {{ Str::limit($libro->descripcion, 80) }}
                        </p>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            @if ($libro->cantidad <= 10 && $libro->cantidad > 0)
                                <span class="inline-flex items-center gap-1 rounded-full text-xs font-semibold text-red-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                    Disponibles: {{ $libro->cantidad }}
                                </span>
                            @elseif ($libro->cantidad === 0)
                                <span class="inline-flex items-center gap-1 rounded-full text-xs font-semibold text-red-600">
                                    Sin disponibilidad
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full text-xs font-semibold text-green-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                    Disponibles: {{ $libro->cantidad }}
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('show.books', $libro->id) }}"
                                class="px-3 py-2 bg-indigo-500 hover:bg-indigo-800 transition-all text-white text-xs font-bold uppercase rounded">
                                Más información
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10 px-32">
        {{ $libros->links() }}
    </div>
</div>
