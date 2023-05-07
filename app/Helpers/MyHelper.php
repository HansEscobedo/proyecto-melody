<?php

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
        'password.regex' => 'La contraseña ingresada no es alfanumérica'
    ];

    return $messages;
}
