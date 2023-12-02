<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use App\Http\Controllers\AdminController;

class BlokiranjeRadaKorisnikaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = (new AdminController())->obrisiKorisnika(13);
        $this->assertDataBaseMissing('korisnik',[
        
                'idK' => '13'
        ]);
    }
}
