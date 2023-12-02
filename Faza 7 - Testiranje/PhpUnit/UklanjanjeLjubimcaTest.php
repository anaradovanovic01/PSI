<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ProfilController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UklanjanjeLjubimcaTest extends TestCase
{
    use DatabaseTransactions;
    public function test_example()
    {
        (new ProfilController())->ukloniLjubimca(8);
        $this->assertDataBaseMissing('ljubimac',[
            'idLjubimac' => '8'
        ]);
    }
}