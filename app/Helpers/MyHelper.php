<?php
<<<<<<< HEAD

use Carbon\Carbon;
use App\Models\Concert;

=======
use Carbon\Carbon;
use App\Models\Concert;






>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo Nombre.',
        'name.min' => 'El largo del nombre es inferior a :min caracteres',
<<<<<<< HEAD
        'name.alpha' => 'El nombre contiene carácteres no permitidos. Ingrese solo letras',
=======
        'name.regex' => 'El nombre contiene caracteres no permitidos. Ingrese solo letras',
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
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
        'ticket_price.numeric' => 'El valor ingresado no es numérico'
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
<<<<<<< HEAD
=======

function verifyStock($id, $quantity)
{
    $concert = Concert::find($id);

    if ($quantity > $concert->stock) {
        return false;
    }
    return true;
}

function discountStock($id, $quantity)
{
    $concert = Concert::find($id);

    $concert->stock -= $quantity;
    $concert->save();
    return true;
}
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
