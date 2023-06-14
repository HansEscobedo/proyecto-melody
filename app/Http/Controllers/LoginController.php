<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request){
        $messages = makeMessages();
        // Validación de credenciales
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ], $messages);
        //dd($request);
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta');
        }
        //toastr()->success('¡Has iniciado sesión en melody!', 'Inicio de sesión completado');
        return redirect()->route('dashboard');


    }
}
