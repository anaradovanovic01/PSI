<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class OdjavljivanjeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     /** @test */
    public function uspesno()
    {
        $response = $this->post('/logins', [
            'email' => 'naka2000@gmail.com',
            'pass' => 'jovana123',
        ]);
        
        $this->assertTrue(Auth::check()); 
        
        $response = $this->get('/logout');

        $this->assertGuest();

    }
}
