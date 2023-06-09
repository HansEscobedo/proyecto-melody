<!DOCTYPE html>
<html lang="en">
@section('title')
    Iniciar Sesión
@endsection

<head>
    @vite('resources/css/app.css')
</head>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="h-20 mr-2 w-27" src="https://drive.google.com/uc?export=download&id=1J0CL4IOjiCvZNStaMo4LFEVW96085all" alt="logo">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Inicie sesión en su cuenta
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('login')}}" method="POST" novalidate>
                        @csrf
                        @if (session('message'))
                            <p class="p-2 my-2 text-lg text-center text-white bg-red-500 rounded-lg">{{ session('message') }}</p>
                        @endif
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="correo@correo.com" required="">
                        @error('email')
                            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                        @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        @error('password')
                            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-custom-700 hover:bg-blue-custom-1000 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar Sesión</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            ¿No tienes una cuenta? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Regístrate</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</html>
