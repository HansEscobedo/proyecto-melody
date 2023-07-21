<?php
use Carbon\Carbon;
use App\Models\Concert;
use App\Models\DetailOrder;


function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo Nombre.',
        'name.min' => 'El largo del nombre es inferior a :min caracteres',
        'name.regex' => 'El nombre contiene caracteres no permitidos. Ingrese solo letras',
        'email.required' => 'Debe completar el campo Correo electrónico',
        'email.unique' => 'El correo ingresado ya existe en el sistema, intente iniciar sesión',
        'email.email' => 'El correo no es válido',
        'password.required' => 'Debe completar el campo Contraseña',
        'password.min' => 'La contraseña posee menos de 8 caracteres',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'password.alpha_num' => 'La contraseña ingresada no es alfanumérica',
        'date.required' => 'Debe completar el campo Fecha del Concierto',
        'date.unique' => 'Ya hay un concierto agendado para el día ingresado',
        'date.after' => 'La fecha debe ser después de la fecha actual',
        'tickets_on_sale.required' => 'Debe completar el campo Cantidad de entradas',
        'tickets_on_sale.numeric' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400',
        'tickets_on_sale.between' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400',
        'ticket_price.required' => 'Debe completar el campo Costo de las entradas',
        'ticket_price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos',
        'ticket_price.max' => 'El valor de la entrada supera el máximo',
        'ticket_price.numeric' => 'El valor ingresado no es numérico',
        'quantity.required'=>'Seleccione una cantidad de entrada',
        'pay_method.required'=>'Seleccione un método de pago'
    ];

    return $messages;
}

function validDate($date)
{
    $currentDate = date("d-m-Y");
    $dateVerifier = Carbon::parse($date);

    if ($dateVerifier->lessThanOrEqualTo($currentDate))
    {
        return true;
    }

    return false;
}

function existConcertDay($concertDate)
{
    $concerts = Concert::getConcerts();
    $date = date($concertDate);

    foreach ($concerts as $concert)
    {
        if ($concert->date == $date)
        {
            return true;
        }
    }

    return false;
}

function verifyStock($id, $quantity)
{
    $concert = Concert::find($id);

    if ($quantity > $concert->tickets_on_sale){
        return false;
    }
    return true;
}

function discountStock($id, $quantity)
{
    $concert = Concert::find($id);

    $concert->tickets_on_sale -= $quantity;
    $concert->save();
    return true;
}

function generateReservationNumber($attempts)
{
    $number = null;

    do {
        $number = mt_rand(1000, 9999);
        // ejecutar foreach
    } while (substr($number, 0, 1) === '0');

    $maxAttempts = 9000; // Número máximo de intentos para encontrar un número no utilizado


    while ($attempts < $maxAttempts) {
        $detailOrder = DetailOrder::where('reservation_number', $number)->first();

        if (!$detailOrder) {
            // Si no se encontró una reserva con este número, entonces es válido y lo podemos retornar
            return $number;
        }

        $attempts++;
        $number = generateReservationNumber($attempts); // Generar un nuevo número
    }

    // Si se alcanza el número máximo de intentos sin encontrar un número no utilizado, retornamos null
    return null;
}
