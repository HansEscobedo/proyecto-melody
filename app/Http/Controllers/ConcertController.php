<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
<<<<<<< HEAD

    public function index()
    {
        return view('#');//dashboard
=======
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        if ($user->role == 2) {
            $concerts = Concert::getConcerts();
            return view('admin_dashboard', [
                'concerts' => $concerts,
            ]);
        } else {
            return view('client_dashboard');
        }
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
    }

    public function create()
    {
<<<<<<< HEAD
        return view('concertViews.create_concert');
=======
        return view('create_concert');
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
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

<<<<<<< HEAD
        toastr()->success('El concierto fue creado con éxito', 'Concierto creado!');

        return redirect()->route('createConcert');//dashboard
=======
        toastr()->success('El concierto fue creado con éxito', '¡Concierto creado!');

        return redirect()->route('dashboard');//dashboard
    }

    public function searchDate(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'date_search' => ['required']
        ], $messages);

        $date = date($request->date_search);
        if ($date == null) {
            $concerts = Concert::getConcerts();
            return view('index', [
                'concerts' => $concerts,
            ]);
        } else {
            $concerts = Concert::where('date', "=", $date)->simplePaginate(1);
            return view('index', [
                'concerts' => $concerts
            ]);
        }
    }


    public function concertsList()
    {
        $concerts = Concert::getConcerts();
        return view('index', [
            'concerts' => $concerts,
        ]);
    }

    public function myConcerts()
    {
        // dd(auth()->user());
        return view('my_concerts', [
            'user' => auth()->user()
        ]);
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
    }
}
