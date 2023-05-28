@extends('app')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Ingrese un concierto
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('createConcert')}}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del concierto</label>
                            <input id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre">

                            @error('name')
                                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                            @enderror


                        </div>
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha del concierto</label>
                            <input id="date" name="date"  type="date" onkeydown="return false" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('date')
                                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tickets_on_sale" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad de entradas</label>
                            <input id="tickets_on_sale" name="tickets_on_sale" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="min: 100, max:400">
                            @error('tickets_on_sale')
                                 <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="ticket_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Costo de las entradas</label>
                            <input id="ticket_price" name="ticket_price" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="min: $20.000">
                            @error('ticket_price')
                                 <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" onclick="return confirm('¿Está seguro de esta información?')" class="w-full text-white bg-blue-600 hover:bg-blue-custom-1000 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
      </section>
@endsection
