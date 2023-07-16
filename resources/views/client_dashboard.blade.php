@extends('app')

@section('title')
    Dashboard {{ auth()->user()->name }}
@endsection

@section('content')
    <div class="p-6 bg-gray-200 rounded-lg shadow-lg md:flex-col md:justify-center ">
        <h2 class="p-6 text-3xl font-bold text-center text-black uppercase">Selecciona una opción</h2>
        <div class="md:flex md:justify-evenly">
            <div>
                <a data-tooltip-target="tooltip-bottom-ver_conciertos" data-tooltip-placement="bottom" href="{{ route('concert.list') }}"
                    class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000">Ver conciertos
                </a>
                <div id="tooltip-bottom-ver_conciertos" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Revisa la lista de conciertos
                    <br>
                    y compra entradas para estos.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div>
                <a data-tooltip-target="tooltip-bottom-ver_compras" data-tooltip-placement="bottom" href="{{ route('client.concerts') }}"
                class="p-3 font-bold text-center text-white bg-blue-700 rounded">Detalle de compras realizadas
                </a>
                <div id="tooltip-bottom-ver_compras" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Revisa la información de tus
                    <br>
                    compras realizadas en Melody
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    </div>
@endsection
