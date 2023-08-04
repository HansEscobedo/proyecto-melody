@extends('app')
@section('title')
@endsection

@section('content')
    {{-- Barra de progreso compra --}}


    {{-- Detalle de la compra --}}
    <div class="flex flex-col items-center">
        <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="bg-cyan-600 p-10 rounded-t-lg">
                <p class="text-xl text-white text-center">Tu pago ha sido <br> <span class="font-bold text-2xl">realizado con
                        éxito</span></p>
            </div>
            <div class="flex flex-col p-5">

                {{-- Empieza el contenido de la tabla --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr
                                class="bg-cyan-100 border-b border-cyan-500 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Número de reserva
                                </th>
                                <td class="px-6 py-4">
                                    {{ $detail_order->reservation_number }}
                                </td>
                            </tr>
                            <tr
                                class="bg-cyan-100 border-b border-cyan-500 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Medio de pago
                                </th>
                                <td class="px-6 py-4">

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

                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Concierto
                                </th>
                                <td class="px-6 py-4">
                                    {{ $detail_order->concertDates->name }}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Fecha del concierto
                                </th>
                                <td class="px-6 py-4">
                                    {{date('d/m/Y', strtotime( $detail_order->concertDates->date) )}}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Cantidad de entradas
                                </th>
                                <td class="px-6 py-4">
                                    {{ $detail_order->quantity }}
                                </td>
                            </tr>
                            <tr class="bg-cyan-100 border-b border-cyan-500">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Total pagado
                                </th>
                                <td class="px-6 py-4">
                                    {{ '$'.number_format($detail_order->total, 0, ',', '.') }}

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('pdf.descargar', ['id' => $voucher->id]) }}"
                    class="inline-flex items-center mx-auto my-4 px-3 py-2 text-sm font-medium text-center text-white bg-cyan-700 rounded-lg hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Descargar Comprobante
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="flex items-center justify-center p-6 space-x-2  rounded-b dark:border-gray-600">
                    <a href="{{ route('dashboard') }}" type="button"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Finalizar
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
