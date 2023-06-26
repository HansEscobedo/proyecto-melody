@extends('app')

@section('title')
    Home
@endsection

@push('styles')
    @vite(['resources/css/fonts.css', 'resources/css/order-status.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
@endpush

@section('content')

    <form action="{{ route('concert.search') }}" method="POST" class="my-12">
        @csrf
        <div class="flex items-center justify-center"> <!-- Agregar la clase "justify-center" para centrar -->
            <label for="date" class="sr-only">Search</label>
            <div class="relative"> <!-- Eliminar la clase "w-full" para ajustar el tamaño -->
                <input type="date" name="date_search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5"> <!-- Eliminar la clase "w-full" para ajustar el tamaño -->
            </div>
            <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>

            <a type="button" href={{ route('concert.list') }}
                class="p-2.5 ml-2 text-sm font-medium text-white bg-amber-500 rounded-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh hover:animate-spin" width="22"
                    height="22" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                <span class="sr-only">Search</span>
            </a>
        </div>
    </form>
    @if ($totalConcert->count() > 0)

        @if ($concerts->count() > 0)
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                @foreach ($concerts as $concert)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="p-8 rounded-t-lg" src="{{ asset('img/concert.png') }}" alt="concert image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-bold tracking-tight text-center text-gray-900">
                                    {{ $concert->name }}
                                </h5>
                            </a>

                            <p class="font-semibold tracking-tight text-center text-gray-900 text-md">
                                Fecha: {{ date('d/m/Y', strtotime($concert->date)) }}
                            </p>

                            <p class="font-semibold tracking-tight text-center text-gray-900 text-md">
                                Stock: {{ $concert->tickets_on_sale }}
                            </p>

                            <p class="font-semibold tracking-tight text-center text-gray-900 text-md">
                                Valor de la entrada: {{ '$' . $concert->ticket_price }}
                            </p>
                            <span class="text-xl text-gray-900">
                            </span>

                            <p class="font-semibold lg:flex lg:items-center lg:justify-center">
                                @if ($concert->tickets_on_sale > 0)
                                <a href={{ route('concert.order', ['id' => $concert->id]) }}
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto"
                                    type="submit">
                                    Comprar Entrada
                                </a>
                                @else
                                    <button href="#" id="add-concert"
                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-not-allowed disabled: opacity-75 ">
                                        Agotado
                                    </button>
                                @endif
                            </p>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
                <p class="text-2xl font-bold text-center text-black">No hay conciertos disponibles para el día seleccionado, intenta con otra fecha o recarga la página</p>
        @endif

    @else
        <p class="text-2xl font-bold text-center text-black">No hay conciertos en sistema. Intente más tarde</p>
    @endif
@endsection
