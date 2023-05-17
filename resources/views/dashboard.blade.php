@extends('app')
@section('title')
    Dashboard
@endsection
@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection
@section('content')
    @if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
    @endif

    @if (auth()->user()->role === 2)
        {{-- Opciones Administrador --}}
        <div class="p-6 bg-gray-200 rounded-lg shadow-lg md:flex-col md:justify-center ">
            <h2 class="p-6 text-3xl font-bold text-center text-black uppercase">Selecciona una opción</h2>
            <div class="md:flex md:justify-evenly">
                <div>
                    <a href="{{route('create_concert')}}"
                        class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000">Agregar
                        Concierto</a>
                </div>

                <div>
                    <a href="#" class="p-3 font-bold text-center text-white bg-blue-700 rounded ">Buscar
                        Cliente</a>
                </div>

                <div>
                    <a href="#" class="p-3 font-bold text-center text-white bg-blue-700 rounded ">Desplegar
                        Recaudación</a>
                </div>

                <div>
                    <a href="#" class="p-3 font-bold text-center text-white bg-blue-700 rounded ">Visualizar
                        Compras</a>
                </div>
            </div>
        </div>
    @endif
@endsection
