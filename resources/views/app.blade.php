<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }

        .text-center {
            text-align: center;
        }
    </style>
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
    <title>Melody - @yield('title')</title>
</head>
<body class="bg-gray-50">
    <header class="p-5 bg-gray-200 border-b border-blue-custom-700">
        <div class="container flex items-center justify-between mx-auto">
            @auth

                <img src="https://drive.google.com/uc?id=1J0CL4IOjiCvZNStaMo4LFEVW96085all" class="h-20 rounded w-30">
                {{--<form method="POST" action="{{ route('logout') }}">--}}
                <form action="{{route('logout')}}" method="POST" >
                    @csrf
                    <button type="submit" class="font-bold uppercase transition hover:text-white">Cerrar Sesión</button>
                </form>
            @endauth
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-3xl font-bold text-center text-black uppercase">@yield('title-page')</h2>
        @yield('content')
    </main>
    <footer class="p-5 font-bold text-center text-gray-900 uppercase ">

        Melody - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>
    @yield('script')
</html>
