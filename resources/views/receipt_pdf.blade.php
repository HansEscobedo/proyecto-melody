<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $detail_order->reservation_number . '-' . $detail_order->concertDates->date }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

        body {
            font-family: 'Merriweather Sans', sans-serif;
            padding: 10px;
        }

        .title {
            font-weight: bold;
            text-align: center;
        }

        h2 {
            color: #a00318;
        }

        h3 {
            font-weight: bold;

        }

        p {
            font-weight: bold;
        }

        span {
            font-weight: 700;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .total-pay {
            margin-bottom: 0px;
            text-align: center;
        }

        .method-pay {
            color: #a9a9a9;
            font-weight: bold;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class=" title">Comprobante de Entradas: {{ $detail_order->reservation_number }}</h1>
    <div>
        <h3>Productora Melody</h3>
        <h3>Fecha:
            <span>{{ $date }}</span>
        </h3>
    </div>
    <div>
        <h2>Datos del concierto</h2>
        <p>Reserva de número:
            <span>{{ $detail_order->reservation_number }}</span>
        </p>
        <p>Concierto:
            <span>{{ $detail_order->concertDates->name }}</span>
        </p>
        <p>Fecha del concierto:
            <span>{{date('d/m/Y', strtotime( $detail_order->concertDates->date) )}}</span>
        </p>
        <p>Método de pago:
            <span>
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
            </span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $detail_order->quantity }}</span>
        </p>
        <p>Valor Entrada:
            <span>{{ '$'.number_format($detail_order->concertDates->ticket_price, 0, ',', '.') }}</span>

        </p>
    </div>
    <hr>
    <div>
        <h2>Datos del cliente</h2>
        <p>Cliente:
            <span>{{ $user->name }}</span>
        </p>
        <p>Correo electrónico:
            <span>{{ $user->email }}</span>
        </p>
    </div>
    <hr>
    <div class="total">
        <p class="total-pay">Total pagado: {{ '$'.number_format($detail_order->total, 0, ',', '.')  }}</p>
        <p class="method-pay">
            <span>
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
            </span>
        </p>
    </div>
</body>

</html>
