<?php

namespace Tests\Unit;

use Tests\TestCase;

class PretragaPartneraTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function pretragaSaSvimParametrima()
    {
        $response = $this->get('/pretragaPartnera', [
            'godineOd' => '3',
            'godineDo' => '10',
            'pol' => '0',
            'rasa'=>'Pudla'
        ]);
        $response->assertStatus(200);
        $response->assertDontSeeText("Ne postoje partneri koji zadovoljavaju unete parametre");
        
    }

     /** @test */
    public function pretragaBezParametara()
    {
        $response = $this->get('/pretragaPartnera', [
           
        ]);
        $response->assertStatus(200);
        $response->assertSeeText("Potreban je barem jedan parametar za pretragu");
        
    }

    /** @test */
    public function pretragaSaJednimParametrom()
    {
        $response = $this->get('/pretragaPartnera', [
            'rasa'=>'Pudla'
        ]);
        $response->assertStatus(200);
        $response->assertDontSeeText("Ne postoje partneri koji zadovoljavaju unete parametre");
        
    }
}
