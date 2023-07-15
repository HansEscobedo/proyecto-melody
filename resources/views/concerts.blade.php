@extends('app')

@section('title')
    Conciertos
@endsection

@section('content')
    <div class="flex-row justify-center">
        <h2 class="text-center text-gray-700 text-3xl font-bold uppercase my-10 mb-6">Lista de conciertos</h2>
    </div>
    <div class="flex items-center justify-center">
        <a href="{{ route('dashboard') }}" type="button"
            class="p-2.5 ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Volver
        </a>
    </div>


    <br>
    @if ($concerts->count())

        <div class="relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Nombre
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Fecha Concierto
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Cantidad Entradas
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Cantidad Entradas Vendidas
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Cantidad Entradas Disponibles
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Monto Total Vendido
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Acción
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($concerts as $concert)
                        <tr
                            class="bg-white border-b hover:bg-gray-50 ">
                            {{-- Nombre Concierto --}}
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <p class="text-center">
                                    {{ $concert->name }}
                                </p>
                            </td>
                            {{-- Fecha Concierto --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y', strtotime($concert->date)) }}
                                </p>
                            </td>
                            {{-- Cantidad Entradas --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $concert->current_tickets}}
                                </p>
                            </td>
                            {{-- Cantidad Entradas Vendidas --}}
                            <td class="px-6 py-4">
                                @if ($concert->tickets_on_sale != $concert->current_tickets)
                                    <p class="text-center">
                                        {{ $concert->current_tickets - $concert->tickets_on_sale}}
                                    </p>
                                @else
                                    <p class="text-center">
                                        0
                                    </p>
                                @endif
                            </td>
                            {{-- Cantidad Entradas Disponibles --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $concert->tickets_on_sale }}
                                </p>
                            </td>
                            {{-- Monto Total Vendido --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    @if ($concert->detail_order_sum_total)
                                        {{'$'.number_format($concert->detail_order_sum_total, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </td>
                            @if ($concert->tickets_on_sale != $concert->current_tickets)
                                {{-- Ver detalles --}}
                                <td class="px-6 py-4">

                                    <a class="w-auto h-auto" href="{{ route('concert.clients', ['id' => $concert->id]) }}">
                                        <p class="text-center text-blue-custom-700 ">Ver</p>
                                    </a>

                                    {{--<div id="tooltip-right-conciertos" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-center text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Visualiza el listado de conciertos
                                        <br>
                                        que ofrece Melody.
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>--}}

                                </td>
                            @else
                                <td class="px-6 py-4">
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-2xl font-bold text-center text-black">No hay conciertos por mostrar</p>
    @endif
@endsection
