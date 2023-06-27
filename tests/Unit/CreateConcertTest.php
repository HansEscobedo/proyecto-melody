<?php

namespace Tests\Unit;

use Tests\TestCase;

class CreateConcertTest extends TestCase
{


    public function testTicketsVerifier()
    {
        $this->withoutMiddleware();
        $concertData = [
            'name' => 'Luis Miguel',
            'date'=> '2023-06-26',
            'tickets_on_sale' => 110,
            'ticket_price' => 25000,
        ];

        $response = $this->post('createConcert', $concertData);
        $response->assertStatus(302);
        $this->assertGreaterThanOrEqual(100, $concertData['tickets_on_sale']);
    }
}
