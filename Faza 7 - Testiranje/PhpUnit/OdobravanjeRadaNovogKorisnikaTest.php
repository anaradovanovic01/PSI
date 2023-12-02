<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use App\Http\Controllers\AdminController;

class OdobravanjeRadaNovogKorisnikaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function test_example()
    {
        $response = (new AdminController())->prihvatiZahtev(16);
        $this->assertDataBaseHas('korisnik',[
                'idK' => '16',
                'odobren' => '1'
        ]);
    }
}

