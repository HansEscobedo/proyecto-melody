@extends('app')

@section('title')
    {{ auth()->user()->name }}
@endsection

@section('content')
    @if (session('success'))
    @endif
    {{-- Opciones Administrador --}}
    <div class="p-6 bg-gray-200 rounded-lg shadow-lg md:flex-col md:justify-center ">
        <h2 class="p-6 text-3xl font-bold text-center text-black uppercase">Selecciona una opción</h2>
        <div class="md:flex md:justify-evenly">
            <div>
                <a data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" href="{{route('create_concert')}}"
                    class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000">Agregar
                    Concierto
                </a>
                <div id="tooltip-bottom" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Crea nuevos conciertos en el
                    <br>
                    sistema para los clientes de Melody.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div>
                <a data-tooltip-target="tooltip-bottom-cliente" data-tooltip-placement="bottom" href="{{route('clients')}}" class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000">Buscar
                    Cliente
                </a>
                <div id="tooltip-bottom-cliente" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Revisa el historial de compras
                    <br>
                    de un cliente en Melody.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div>
                <a data-tooltip-target="tooltip-bottom-recaudacion" data-tooltip-placement="bottom" href="{{ route('collection.index') }}" class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000"">Desplegar
                    Recaudación
                </a>
                <div id="tooltip-bottom-recaudacion" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Visualiza la recaudación en gráficos
                    <br>
                    de las ventas realizadas en Melody.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div>
                <a  data-tooltip-target="tooltip-bottom-compras" data-tooltip-placement="bottom" href="{{ route('concerts') }}"
                    class="p-3 font-bold text-center text-white transition rounded bg-blue-custom-700 hover:bg-blue-custom-1000">Compras
                    Realizadas
                </a>
                <div id="tooltip-bottom-compras" role="tooltip"
                    class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Revisa la lista de conciertos y sus
                    <br>
                    compras por los clientes de Melody.
                    <div   div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
