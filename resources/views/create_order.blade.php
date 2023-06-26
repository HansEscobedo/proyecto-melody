@extends('app')

@section('title')
    {{ $concert->name }}
@endsection



@section('content')
    <br>
    <br>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Realice su Compra
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('concert.order.pay',['id' => $concert->id])}}" method="POST">

                        @csrf
                        <div class=" items-center">
                            <h2 class="text-l font-semibold mr-2">Nombre del concierto:</h2>
                            <p class="text-xl">{{ $concert->name }}</p>
                        </div>
                        <div class="items-center gap-1">
                            <h2 class="text-l font-semibold mr-2">Fecha:</h2>
                            <p class="text-xl">{{ date('d/m/Y', strtotime($concert->date)) }}</p>
                        </div>

                        <div class="items-center gap-1">
                            <h2 class="text-l font-semibold mr-2">Valor entrada:</h2>
                            <p class="text-xl">{{ '$'.number_format($concert->ticket_price, 0, ',', '.') }}</p>
                        </div>

                        <label for="quantity" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Cantidad de
                            entradas</label>
                        <div class="flex items-center gap-1">

                            <select id="quantity" name="quantity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">--Seleccione las entradas--</option>
                                @for ($i = 1; $i <= $concert->tickets_on_sale; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>

                        </div>
                        @error('quantity')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                            {{ $message }}</p>
                        @enderror

                        @if (session('message'))
                            <p class="bg-red-500 text-white my-2 rounded-xl text-sm text-center p-2">
                                {{ session('message') }}</p>
                        @endif

                        <label for="pay_method" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Forma de
                            pago</label>
                        <select id="pay_method" name="pay_method"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">--Seleccione un método de pago--</option>
                            <option value="1">Efectivo</option>
                            <option value="2">Transferencia</option>
                            <option value="3">Débito</option>
                            <option value="4">Crédito</option>
                        </select>
                        @error('pay_method')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm text-center p-2">
                                {{ $message }}</p>
                        @enderror
                        <div class="flex items-center justify-center">
                            <h2 class="font-bold text-xl uppercase mr-3">Total: $</h2>
                            <p id="total" class="text-2xl text-center font-semibold">{{ number_format($concert->ticket_price, 0, ',', '.') }}</p>
                        </div>
                        <input id="total-s" name="total" value="{{ $concert->ticket_price }}" hidden>
                        <input name="reservation_number" value="" hidden>

                        <div
                        class="flex items-center justify-center p-6 space-x-2  rounded-b dark:border-gray-600">

                        <button type="submit" onclick="return confirm('¿Está seguro de esta información?')" class="w-full text-white bg-blue-600 hover:bg-blue-custom-1000 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Finalizar compra</button>
                        <a href="{{ route('dashboard') }}" type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Volver
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
@endsection


@section('alerts')
    <script>
        // Aqui va nuestro script de sweetalert
        const boton = document.getElementById("boton");
        const formulario = document.getElementById("formulario");

        boton.addEventListener('click', (e) => {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que quieres enviar estos datos?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD091',
                cancelButtonColor: '#FF5C77',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    formulario.submit();
                }
            })
        })
    </script>
@endsection


@section('script')
    <script>
        const button = document.getElementById('add-concert');
        const cantidad = document.getElementById('quantity');
        const total = document.getElementById('total');
        const total_Submit = document.getElementById('total-s');

        window.addEventListener('DOMContentLoaded', (e) => {
            e.preventDefault();
            button.disabled = true;
        })

        cantidad.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(cantidad.value);
            const venta = {{ $concert->ticket_price }} * cantidad.value;
            const formattedVenta = venta.toLocaleString(); // Formatear el número con puntos
            total.textContent = formattedVenta;
            total_Submit.value = venta;


        })
    </script>
@endsection
