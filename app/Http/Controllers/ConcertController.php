<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');//dashboard
    }

    public function create()
    {
        return view('create_concert');
    }

    public function store(Request $request)
    {

        $messages = makeMessages();

        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'date' => ['required', 'date', 'unique:concerts', 'after:today'],
            'tickets_on_sale' => ['required', 'numeric', 'between:100,400'],
            'ticket_price' => ['required', 'numeric', 'min:20000', 'max:2147483647']
        ], $messages);

        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back();
        }

        $existConcert = existConcertDay($request->date);
        if($existConcert)
        {
            return back();
        }

        Concert::create([
            'name' => $request->name,
            'date' => $request->date,
            'tickets_on_sale' => $request->tickets_on_sale,
            'ticket_price' => $request->ticket_price
        ]);

        toastr()->success('El concierto fue creado con éxito', '¡Concierto creado!');

        return redirect()->route('dashboard');//dashboard
    }
}
