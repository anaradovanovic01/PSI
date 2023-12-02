<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AzuriranjeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_example()
    {
        if(!Auth::check()) {
            auth()->attempt(['email' => 'sofijanosevic@gmail.com','lozinka' => 'sifra123']);
        }
        $response = $this->followingRedirects()->post('/azurirajProfil', [
            'ime' => 'Ana'
        ]);
        
        $response->assertStatus(200);
        $response->assertSee('profil');
        $data = $response->getOriginalContent()->getData();
        $ime = $data['korisnik']->ime;
        $this->assertTrue($ime=='Ana');
    }

    /** @test */
    public function azuriranjeVlasnik()
    {
        if(!Auth::check()) {
            auth()->attempt(['email' => 'sofijanosevic@gmail.com','lozinka' => 'sifra123']);
        }
        $response = $this->followingRedirects()->post('/azurirajProfil', [
            'ime' => 'Ana',
            'prezime' => 'Peric',
            'stara' => 'sifra123',
            'nova' => 'sifra1',
            'provera' => 'sifra1',
            'telefon' => '064667788',
            'deoGrada' => 'Senjak',
            'opis' => 'Ja sam Ana.'
        ]);
        
        $response->assertStatus(200);
        $response->assertSee('profil');
        $data = $response->getOriginalContent()->getData();
        $korisnik = $data['korisnik'];
        $vlasnik = $data['vlasnik'];
        $this->assertTrue($korisnik->ime=='Ana');
        $this->assertTrue($korisnik->prezime=='Peric');
        $this->assertTrue($vlasnik->telefon=='064667788');
        $this->assertTrue($vlasnik->idDeoGrada=='93');
        $this->assertTrue($vlasnik->opis=='Ja sam Ana.');
    }
    
    /** @test */
    public function azuriranjeSetaca()
    {
        if(!Auth::check()) {
            auth()->attempt(['email' => 'djidja@gmail.com','lozinka' => 'sifra123']);
        }
        $response = $this->followingRedirects()->post('/azurirajProfil', [
            'ime' => 'Ana',
            'prezime' => 'Peric',
            'stara' => 'sifra123',
            'nova' => 'sifra1',
            'provera' => 'sifra1',
            'telefon' => '064667788',
            'deoGrada' => 'Senjak',
            'opis' => 'Ja sam Ana.'
        ]);
        
        $response->assertStatus(200);
        $data = $response->getOriginalContent()->getData();
        $korisnik = $data['korisnik'];
        $setac = $data['setac'];
        $this->assertTrue($korisnik->ime=='Ana');
        $this->assertTrue($korisnik->prezime=='Peric');
        $this->assertTrue($setac->telefon=='064667788');
        $this->assertTrue($setac->idDeoGrada=='93');
        $this->assertTrue($setac->opis=='Ja sam Ana.');
    }
}
