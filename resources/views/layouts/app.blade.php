<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title></title>
</head>
<body>
    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-3xl font-bold text-center text-black uppercase">@yield('title-page')</h2>
        @yield('content')
    </main>
    <footer class="p-5 font-bold text-center text-black uppercase">
        Melody - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>
</html>
