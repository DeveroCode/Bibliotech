<!DOCTYPE html>
<html>

<head>
    <title>Error 404</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif !important;
        }

        @media (min-width: 767px) {
            .center {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="flex flex-row p-10 h-screen">
        <div class="center">
            <div class="image hidden md:block md:w-1/2">
                <img src="{{ asset('imgs/error/404.svg') }}" alt="Error">
            </div>
            <div class="info md:w-1/2 flex justify-center m-0 flex-col px-6 text-center md:text-start">
                <p class="text-xl">Código de error: <span class="text-indigo-500">404</span></p>
                <h1 class="text-5xl font-bold text-indigo-800 mb-10 mt-5">Página no encontrada</h1>
                <span>Lamentamos la molestia pero la página solicitada no existe o no se pudo abrir. Inténtelo más
                    tarde o
                    verifique sus credenciales.</span>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-10 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-1/4 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                    Inicio
                </a>
            </div>
        </div>
    </div>



</body>

</html>