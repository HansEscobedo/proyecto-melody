<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_orders = DetailOrder::all();
        return view('collection', [
            'detail_orders' => $detail_orders
        ]);

    }

    public function allConcertsTotalSales()
    {
        $concerts = Concert::withSum('detailOrder', 'total')->get();
        return response()->json($concerts);
    }

    public function allDetailOrders()
    {
        $detail_orders = DetailOrder::all();
        return response()->json($detail_orders);
    }
}
