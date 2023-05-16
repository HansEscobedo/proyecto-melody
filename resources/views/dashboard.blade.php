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
        <div class="p-6 rounded-lg shadow-lg md:flex-col md:justify-center bg-blue-custom-600 ">
            <h2 class="p-6 text-3xl font-bold text-center text-white uppercase">Selecciona una opción</h2>
            <div class="md:flex md:justify-evenly">
                <div>
                    <a href="{{route('create_concert')}}"
                        class="p-3 font-bold text-center text-black transition rounded bg-red-custom-200 hover:bg-red-custom-200">Agregar
                        Concierto</a>

                </div>

                <div>
                    <a href="#" class="p-3 font-bold text-center text-black bg-red-500 rounded ">Quitar
                        Concierto</a>
                </div>

                <div>
                    <a href="#" class="p-3 font-bold text-center text-black bg-red-500 rounded ">Modificar
                        Concierto</a>
                </div>
            </div>
        </div>
    @endif
@endsection
