<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use App\Models\User;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
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
            'current_tickets'=>$request->tickets_on_sale,
            'ticket_price' => $request->ticket_price
        ]);

        toastr()->success('El concierto fue creado con éxito', '¡Concierto creado!');

        return redirect()->route('dashboard');//dashboard
    }

    public function searchDate(Request $request)
    {
        $search = 1;
        $totalConcert=Concert::getConcerts();
        $currentDate = date('Y-m-d'); // Obtener la fecha actual en formato 'YYYY-MM-DD'
        $date = date($request->date_search);

        if ($date == null || $date <= $currentDate) {
            $concerts = Concert::where('date', '>', $currentDate)->get();

        } else {
            $concerts = Concert::where('date', "=", $date)->simplePaginate(1);


        }

        return view('index', [
            'concerts' => $concerts,
            'totalConcert' => $totalConcert,
            'search' => $search
        ]);
    }


    public function concertsList()
    {
        $search = 0;
        $currentDate = date('Y-m-d');
        $totalConcert=Concert::where('date', '>', $currentDate)->get();
        $concerts = Concert::where('date', '>', $currentDate)->get();
        return view('index', [
            'concerts' => $concerts,
            'totalConcert' => $totalConcert,
            'search' => $search
        ]);
    }

    public function myConcerts()
    {
        // dd(auth()->user());
        return view('my_concerts', [
            'user' => auth()->user()
        ]);
    }

    public function clients()
    {
        $client = null;
        return view('clients', [
            'message' => null,
            'client' => $client,
            'detail_orders' => null
        ]);
    }

    public function searchClient(Request $request)
    {
        $email = $request->email_search;
        $client = User::where('email', "=",$email)->first();
        if(!$client){
            return view('clients', [
                'message' => 'El correo elecrónico no existe',
                'client' => $client,
                'detail_orders' => null
            ]);
        }

        $detail_orders = DetailOrder::where('user_id', $client->id)->get();
        return view('clients', [
            'message' => null,
            'client' => $client,
            'detail_orders' => $detail_orders
        ]);
    }
    public function allConcerts()
    {
        $concerts = Concert::withSum('detailOrder', 'total')->get();
        return view('concerts', compact('concerts'));
    }

    public function concertClients($id)
    {

        $concert = Concert::find($id);

        // Obtener los detalles de orden para el concierto seleccionado mediante su id
        $detail_orders = DetailOrder::where('concert_id', $id)->orderBy('created_at', 'asc')->get();

        // Obtener los usuarios relacionados con los detalles de orden
        $clients = User::whereIn('id', $detail_orders->pluck('user_id'))->get();


        return view(
            'concert_clients',

            compact('detail_orders', 'clients', 'concert')
        );
    }
}
