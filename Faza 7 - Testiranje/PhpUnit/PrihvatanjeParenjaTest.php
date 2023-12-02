<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ZahteviZaParenjeController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PrihvatanjeParenjaTest extends TestCase
{
    use DatabaseTransactions;
    public function test_example()
    {
        (new ZahteviZaParenjeController())->prihvatiZahtev(8);
        $this->assertDataBaseHas('zahtevzaparenje',[
            'idZahtevZaParenje' => '8',
            'prihvacen_odbijen' => '1'
        ]);
    }
}