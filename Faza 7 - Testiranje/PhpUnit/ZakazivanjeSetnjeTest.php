<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ZahteviZaSetnjeController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZakazivanjeSetnjeTest extends TestCase
{
    use DatabaseTransactions;
    public function test_example()
    {
        (new ZahteviZaSetnjeController())->posaljiZahtevZaSetnju(6, 9);
        $this->assertDataBaseHas('zahtevzasetnju',[
            'idSetnja' => '6',
            'idLjubimac' => '9'
        ]);
    }
}
