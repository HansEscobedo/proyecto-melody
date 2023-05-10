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
        <div class="md:flex-col md:justify-center bg-azul-custom-600  p-6 rounded-lg shadow-lg ">
            <h2 class="text-center text-white uppercase font-bold text-3xl p-6">Selecciona una opción</h2>
            <div class="md:flex md:justify-evenly">
                <div>
                    <a href="'concert.create'"
                        class="text-center text-black font-bold p-3 bg-red-custom-200 rounded hover:bg-red-custom-200 transition">Agregar
                        Concierto</a>

                </div>

                <div>
                    <a href="#" class="text-center text-black font-bold p-3 bg-red-500 rounded ">Agregar
                        Concierto</a>
                </div>

                <div>
                    <a href="#" class="text-center text-black font-bold p-3 bg-red-500 rounded ">Agregar
                        Concierto</a>
                </div>
            </div>
        </div>
    @endif
@endsection