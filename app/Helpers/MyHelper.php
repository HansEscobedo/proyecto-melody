<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo Nombre.',
        'name.min' => 'El largo del nombre es inferior a :min caracteres',
        'name.regex' => 'El nombre contiene carácteres no permitidos. Ingrese solo letras',
        'email.required' => 'Debe completar el campo Correo electrónico',
        'email.unique' => 'El correo ingresado ya existe en el sistema, intente iniciar sesión',
        'email.email' => 'El correo no es válido',
        'password.required' => 'Debe completar el campo Contraseña',
        'password.min' => 'La contraseña posee menos de 8 caracteres',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'password.alpha_num' => 'La contraseña ingresada no es alfanumérica',
        'date.required' => 'Debe completar el campo Fecha del Concierto',
        'date.unique' => 'Ya hay un concierto agendado para el día ingresado',
        'date.after' => 'La fecha debe ser despues de la fecha actual',
        'tickets_on_sale.required' => 'Debe completar el campo Cantidad de tickets',
        'tickets_on_sale.numeric' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400',
        'tickets_on_sale.between' => 'El valor ingresado no es numérico o es inferior a 100 o superior a 400',
        'ticket_price.required' => 'Debe completar el campo Costo del ticket',
        'ticket_price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos'
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
