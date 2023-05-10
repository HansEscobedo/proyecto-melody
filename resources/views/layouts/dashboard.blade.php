@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('title-page')
    Bienvenido {{ auth()->user()->name }} a Melody
@endsection
@section('content')
    @if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
        <div class="bg-black">
            <h2 text-white>No soy admin</h2>
        </div>
    @endif

    @if (auth()->user()->role === 2)
        {{-- Opciones Administrador --}}
        <div class="bg-black">
            <h2 text-white>Soy admin</h2>
        </div>
    @endif
@endsection
