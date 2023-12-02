<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ZahteviZaParenjeController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZakazivanjeParenjaTest extends TestCase
{
    use DatabaseTransactions;
    public function test_example()
    {
        (new ZahteviZaParenjeController())->posaljiZahtevZaParenje(1, 7);
        $this->assertDataBaseHas('zahtevzaparenje',[
            'idSalje' => '1',
            'idPrima' => '7'
        ]);
    }
}