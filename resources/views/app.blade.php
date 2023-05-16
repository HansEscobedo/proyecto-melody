<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Melody - @yield('title')</title>
</head>
<body class="bg-white">
    <header class="p-5 border-b border-blue-custom-700 bg-blue-custom-600">
        <div class="container flex items-center justify-between mx-auto">
            @auth

                <img src="https://drive.google.com/uc?id=1J0CL4IOjiCvZNStaMo4LFEVW96085all" class="h-20 rounded w-30">
                {{--<form method="POST" action="{{ route('logout') }}">--}}
                <form action="{{route('logout')}}" method="POST" >
                    @csrf
                    <button type="submit" class="font-bold uppercase transition hover:text-white">Cerrar Sesión</button>
                </form>
            @endauth
            @guest
                <a href="{{route('dashboard')}}" class="text-2xl font-black uppercase">
                    <img src="https://drive.google.com/uc?id=1J0CL4IOjiCvZNStaMo4LFEVW96085all" class="h-20 rounded w-30">
                </a>
                <nav class="flex flex-col items-center gap-2">
                    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                    <a href="{{ route('login') }}" class="font-bold uppercase hover:text-white">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase hover:text-white">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-3xl font-bold text-center text-white uppercase">@yield('title-page')</h2>
        @yield('content')
    </main>
    <footer class="p-5 font-bold text-center text-gray-900 uppercase">
        Melody - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>
</html>
