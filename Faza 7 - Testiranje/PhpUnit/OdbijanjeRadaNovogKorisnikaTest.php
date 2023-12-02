<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use App\Http\Controllers\AdminController;

class OdbijanjeRadaNovogKorisnikaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = (new AdminController())->obrisiZahtev(11);
        $this->assertDataBaseMissing('korisnik',[
                'idK' => '11',
               
        ]);
    }
}