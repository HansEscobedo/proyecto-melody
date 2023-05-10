<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        //dd('Desde login controller');
        return view('login');
    }
    public function store(Request $request){
        $messages = makeMessages();
        // Validación de credenciales
        $this->validate($request,[
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ], $messages);
        //dd($request);
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Las credenciales son incorrectas');
        }
        return view('dashboard');

    }
}
