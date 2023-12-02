<?php

namespace Tests\Unit;

use Tests\TestCase;

class PretragaSetnjiTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/pretragaSetnji', [
            'datum' => '2022-06-12',
            'deoGrada' => 'Senjak',
            'vremeOd' => '18:00',
            'vremeDo' => '23:00',
        ]);
        
        $response->assertStatus(200);
        $response->assertDontSeeText('Ne postoje šetnje koje zadovoljavaju unete parametre');
    }

    /** @test */
    public function test_example1()
    {
        $response = $this->get('/pretragaSetnji', [
            'datum' => '2022-06-12'
        ]);
        
        $response->assertStatus(200);
        $response->assertDontSeeText('Ne postoje šetnje koje zadovoljavaju unete parametre');
    }

    /** @test */
    public function test_example2()
    {
        $response = $this->get('/pretragaSetnji', [
            'datum' => '2022-06-06',
        ]);
        
        $response->assertStatus(200);
        $data = $response->getOriginalContent()->getData();
        $this->assertNull($data['setnje']);
    }
}
