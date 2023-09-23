<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">

    <title>Reporte - Inventario</title>
</head>

<body>
    {{-- Information font-sans antialiased --}}
    <header class="header marginT-4">
        <h1 class="title marginT-4">Instituto Técnologico Superior de Nuevo Casas Grandes Chihuahua</h1>
        <div class="header__text">
            <h1 class="header__text-title">Reporte inventario de libros en existencia</h1>
            <p class="header__text-sub">con fecha de expedición: {{ now()->format('d/m/Y') }}</p>
        </div>
    </header>
    {{-- Table --}}
    <div class="table-group marginT-5">
        <!-- Table start -->
        <table class="group">
            <thead class="group-thead">
                <tr class="group-tr">
                    <th class="group-thead-title group-title">Título</th>
                    <th class="group-thead-title">Estado</th>
                    <th class="group-thead-title">Edición</th>
                    <th class="group-thead-title">Categoría</th>
                </tr>
            </thead>
            @foreach ($libros as $libro)
            <tbody class="group-tbody">
                <tr class="group-tbody-cell">
                    <!-- Titulo y autores -->
                    <th class="group-tbody-book">
                        <div class="tbody-book">
                            <div class="tbody-book-title">{{ $libro->titulo }}</div>
                            <div class="tbody-book-autor">
                                {{-- Autores --}}
                                @foreach ($libro->autores as $autor)
                                {{ $autor->autor }}
                                @endforeach
                            </div>
                        </div>
                    </th>

                    <!-- Disponibles -->
                    <td class="group-tbody-category">
                        <span class="group-tbody-background">
                            <span class="group-tbody-category-text"></span>
                            Disponibles {{ $libro->cantidad }}
                        </span>
                    </td>

                    <!-- Edicion -->
                    <td class="group-tbody-edicion">México: Phillips 2020</td>
                    <!-- Categoria -->
                    <td class="group-tbody-categoria">
                        <div class="group-categoria">
                            @switch($libro->categoria->id)
                            @case(1)
                            <span class="group-all sistemas">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(2)
                            <span class="group-all contaduria">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(3)
                            <span class="group-all mecatronica">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(4)
                            <span class="group-all electromecanica">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(5)
                            <span class="group-all gestion">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(6)
                            <span class="group-all industrial">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @case(7)
                            <span class="group-all electronica">
                                {{ $libro->categoria->categoria}}
                            </span>
                            @break
                            @default
                            @endswitch
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>