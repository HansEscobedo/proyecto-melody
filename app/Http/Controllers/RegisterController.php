<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\MyHelper;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registerCustomer');
    }

    public function back()
    {
        return view('welcome');
    }


    public function store(Request $request)
    {


        $messages = makeMessages();
        // Validación
        $this->validate($request, [
            'name' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required','alpha_num', 'min:8', 'regex:/^(?=.*[A-Za-zñÑ])(?=.*\d)[A-Za-zñÑ\d]+$/']
        ], $messages);
        // Crear al usuario
        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
            'role' => 1
        ]);

        // Autenticar al usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redireccionar al usuario
        toastr()->success('¡Te has registrado en Melody!', 'Inicia Sesion Ahora');
        return redirect()->route('login');


    }
}
