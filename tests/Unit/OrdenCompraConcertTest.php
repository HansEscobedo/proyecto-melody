<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\DetailOrder;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrdenCompraConcertTest extends TestCase
{

    use DatabaseTransactions;
    public function testSelectPaymentMethod()
    {
        $this->withoutMiddleware();
        //Crear la orden de compra
        $detail_order = [
            'reservation_number' => '4529',
            'quantity' => '3',
            'total' => '90000',
            'payment_method' => '1',
            'user_id' => '2',
            'concert_id' => '0'
        ];

        //Registro con campos invalidos
        $response = $this->post('/concert-order/{id}', $detail_order);
        $response->assertStatus(302);

        $this->assertNotEquals(0, $detail_order['payment_method']);
    }
}
