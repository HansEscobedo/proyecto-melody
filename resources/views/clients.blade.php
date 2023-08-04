@extends('app')

@section('title')
    Buscar Cliente
@endsection

@section('content')

    <form action="{{ route('client.search') }}" method="GET" class="my-12 mb-2">
        <div class="flex items-center justify-center">
            <label for="email_search" class="sr-only">Search</label>
            <div class="relative w-80">
                <input type="search" id="email_search" name="email_search" placeholder="Ingresa un correo electrónico a buscar" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
            <div>
                <a href="{{ route('dashboard') }}" type="button"
                    class="p-2.5 ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Volver
                </a>
            </div>

        </div>
    </form>


    @if ($client == null)
        @if ($message)
        <div class="flex items-center justify-center">
             <p class="p-2 my-2 relative w-80 text-lg text-center text-white bg-red-500 rounded-lg">{{$message }}</p>
        </div>

        @endif
    @elseif($detail_orders->count() > 0)
        <h2 class="text-center text-gray-700 text-3xl font-bold uppercase my-10">Cliente {{ $client->name }}</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                N° Reserva
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Nombre Concierto
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Fecha Concierto
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Fecha Compra
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Cantidad Entradas
                            </p>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Total Pagado
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Medio de Pago
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Descargar
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_orders as $detail_order)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- Numero de reserva --}}
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p class="text-center">
                                    {{ $detail_order->reservation_number }}
                                </p>
                            </td>
                            {{-- Nombre de Concierto --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $detail_order->concertDates->name }}
                                </p>
                            </td>
                            {{-- Fecha Concierto --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y', strtotime($detail_order->concertDates->date)) }}
                                </p>
                            </td>
                            {{-- Fecha Compra --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y H:i:s', strtotime($detail_order->created_at)) }}
                                </p>
                            </td>
                            {{-- Cantidad Entradas --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $detail_order->quantity }}
                                </p>
                            </td>
                            {{-- Total Pagado --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ '$'.number_format($detail_order->total, 0, ',', '.')  }}
                                </p>
                            </td>
                            {{-- Medio Pago --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    @switch($detail_order->payment_method)
                                        @case('1')
                                            Efectivo
                                        @break

                                        @case('2')
                                            Transferencia
                                        @break

                                        @case('3')
                                            Débito
                                        @break

                                        @case('4')
                                            Crédito
                                        @break
                                    @endswitch
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <a class="w-auto h-auto"
                                    href="{{ route('pdf.descargar', ['id' => $detail_order->voucher->id]) }}">
                                    <p class="text-center text-blue-custom-700 ">DESCARGAR</p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif ($client)
        <p class="text-2xl text-gray-700 text-center font-bold">El cliente {{ $client->name }} no ha adquirido entradas</p>
    @endif


@endsection

