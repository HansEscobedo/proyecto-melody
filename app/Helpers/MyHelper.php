<?php
use Carbon\Carbon;
use App\Models\Concert;



function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo Tu nombre.',
        'name.min' => 'El largo del nombre es inferior a 3 caracteres',
        'name.alpha' => 'El nombre contiene carácteres no permitidos. Ingrese solo letras',
        'email.required' => 'Debe completar el campo Correo electrónico',
        'email.unique' => 'El correo ingresado ya existe en el sistema, intente iniciar sesión',
        'email.email' => 'El correo no es válido',
        'password.required' => 'Debe completar el campo Contraseña',
        'password.min' => 'La contraseña posee menos de 8 caracteres',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
    ];

    return $messages;
}

function validDate($date)
{
    $fechaActual = date("d-m-Y");
    $fechaVerificar = Carbon::parse($date);

    if ($fechaVerificar->lessThanOrEqualTo($fechaActual)) {
        return true;
    }

    return false;
}

function existConcertDay($date_concert)
{
    $concerts = Concert::getConcerts();
    $date = date($date_concert);

    foreach ($concerts as $concert) {

        if ($concert->date == $date) {
            return true;
        }
    }
    return false;
}

