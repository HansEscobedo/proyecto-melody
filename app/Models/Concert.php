<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'date',
        'tickets_on_sale',
        'ticket_price'
    ];
<<<<<<< HEAD

=======
>>>>>>> ffc1eac778460e648ccafec0bff6655e55f1d972
    public static function getConcerts()
    {
        return self::all();
    }
}
