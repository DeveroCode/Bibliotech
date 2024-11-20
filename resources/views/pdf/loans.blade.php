<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ public_path('css/app_2.css') }}">

    <title>Reporte - Prestamos 2024</title>
</head>

<body>
    {{-- Header and Footer --}}
    <livewire:header-footer />

    <main>
        <div class="header">
            <h1 class="title">Instituto Tecnólogico Superior de Nuevo Casas Grandes Chihuahua</h1>
            <p class="subtitle">Av. Tecnologico No. 7100 C.P. 31700</p>
            <span class="text-info">Prestamos de libros de la biblioteca</span>
        </div>

        <div class="information">
            <h2 class="information__title p-1">Prestamos en existencia</h2>
            <div class="libros-count">
                <p class="information__sub p-1 fs-2 text-capitalize">expedición: <span class="text-normal fs-1">{{
                        now()->format('d-M-Y') }}</span></p>
                <span class="information__sub p-1 fs-2 text-capitalize">total prestamos: <span
                        class="text-normal fs-1">{{
                        $count}}
                    </span>
            </div>
            @php
            $lastUserId = null;
            $cont=0;
            $total_pages=0;
            @endphp

            @foreach ($loans as $loan)
            <div class="libros-bibliotecario">
                @if ($lastUserId != $loan->user()->first()->id)
                <p class="information__sub pr-1 fs-2 text-capitalize">expedido por:
                    <span class="fs-1 text-normal text-capitalize">
                        {{ $loan->user()->first()->name . " " . $loan->user()->first()->apellido_paterno . " " .
                        $loan->user()->first()->apellido_materno }}
                    </span>
                </p>
                @php
                $lastUserId = $loan->user()->first()->id;
                @endphp

                <p class="information__sub fs-2 text-capitalize">folio: <span class="text-normal fs-1">{{
                        $loan->user()->first()->email }}</span></p>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="table-group marginT-5">
            <!-- Table start -->
            <table class="group">
                <thead class="group-thead">
                    <tr class="group-tr">
                        <th class="group-title group-thead-title">Alumno</th>
                        <th class="group-title group-thead-title">Libro</th>
                        <th class="w-4 group-thead-title">Datos</th>
                        <th class="w-4 group-thead-title">Estado</th>
                        <th class="w-4 group-thead-title">Prestamista</th>
                    </tr>
                </thead>

                @foreach ($loans as $loan)
                <tbody class="group-tbody">
                    <tr class="group-tbody-cell">
                        <!-- Titulo y autores -->
                        <th class="group-tbody-book py-1">
                            <div class="tbody-book cell">
                                <span class="tbody-book-title text-normal fs-1">{{ $loan->alumnos()->first()->nombre . "
                                    " . $loan->alumnos()->first()->apellidoP . " " .
                                    $loan->alumnos()->first()->apellidoM
                                    }}</span>
                                <span class="tbody-book-title text-uppercase fs-1">{{
                                    $loan->alumnos()->first()->no_institucional}}</span>
                            </div>
                        </th>

                        <th class="group-tbody-book py-1">
                            <div class="tbody-book cell">
                                <span class="tbody-book-title text-normal fs-1">{{ $loan->libros()->first()->titulo
                                    }}</span>
                            </div>
                        </th>

                        <!-- Entreaga -->
                        <td class="group-tbody-category cell">
                            <div class="text-flex">
                                <div>
                                    <p>Salida</p>
                                    <span class="tbody-book-title text-normal fs-1">{{ \Carbon\Carbon::parse(
                                        $loan->fecha_entrega)->format('d-M-Y') }}</span>
                                </div>

                                <div>
                                    <p>Entrega</p>
                                    <span class="tbody-book-title text-normal fs-1">{{ \Carbon\Carbon::parse(
                                        $loan->fecha_limite)->format('d-M-Y') }}</span>
                                </div>
                            </div>
                        </td>

                        {{-- Tipo de prestamo --}}
                        <td class="group-tbody-category cell">
                            <span class="tbody-book-title text-normal fs-1">
                                {{ $loan->tipo_prestamo()->first()->nombre }}
                            </span>
                        </td>


                        {{-- Prestamista --}}
                        <td class="group-tbody-edicion cell text-normal text-capitalize fs-1">{{
                            $loan->user()->first()->name . " "
                            . $loan->user()->first()->apellido_paterno . " " . $loan->user()->first()->apellido_materno
                            }}
                        </td>

                        @if(count($loans) > 8 && $cont === 8)
                    <tr colspan="60">
                        @for ($i = 1; $i <= 7; $i++) <br>
                            @endfor
                    </tr>
                    @endif
                    @php
                    $cont++;
                    $total_pages++;
                    @endphp
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </main>
    {{-- Information font-sans antialiased --}}
</body>

</html>