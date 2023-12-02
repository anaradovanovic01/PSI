<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class PrijavljivanjeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function neispravna_lozinka()
    {
        $response = $this->post('/logins', [
            'email' => 'naka2000@gmail.com',
            'pass' => 'password',
        ]);
        
        $this->assertGuest();
    }

    /** @test */
    public function prazna_lozinka()
    {
        $response = $this->post('/logins', [
            'email' => 'naka2000@gmail.com',
            'pass' => '',
        ]);
        
        $this->assertGuest();
    }

    /** @test */
    public function email_prazan()
    {
        $response = $this->post('/logins', [
            'email' => '',
            'pass' => 'password',
        ]);
        
        $this->assertGuest();
    }

    /** @test */
    public function email_ne_postoji()
    {
        $response = $this->post('/logins', [
            'email' => 'kokokok@gmail.com',
            'pass' => 'password',
        ]);
        
        $this->assertGuest();
    }

    /** @test */
    public function uspesna()
    {
        $response = $this->post('/logins', [
            'email' => 'naka2000@gmail.com',
            'pass' => 'jovana123',
        ]);
        
        $this->assertTrue(Auth::check());   
    }
}
