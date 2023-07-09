<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Prueba el inicio de sesión fallido.
     *
     * @return void
     */
    public function testSuccessLogin()
    {
        $this->withoutMiddleware();
        $user = User::create([
            'name' => 'Mario',
            'email' => 'mario@correo.com',
            'password' => bcrypt('mari0password'),
            'role' => 1,
        ]);


        $response = $this->post('/login', [
            'email' => 'mario@correo.com',
            'password' => 'mari0password',
        ]);


        $response->assertStatus(302); // Verifica el código de estado de la respuesta (redirección)
        $response->assertRedirect('dashboard'); // Verifica que se redirija a la página de dashboard}

        $this->assertAuthenticatedAs($user); // Verifica que el usuario esté autenticado
    }
}
