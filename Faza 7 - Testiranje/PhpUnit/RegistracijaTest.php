<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistracijaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function uspesna()
    {
        $response = $this->post('/registracijas', [
            'ime' => 'Nikolina',
            'prezime' => 'Grujić',
            'v-s' => '1',
            'godine' => '22',
            'm-z' => '1',
            'telefon' => '0658796325',
            'deograda' => 'Autokomanda',
            'email'=> 'nikolina@gmail.com',
            'lozinka'=>'nikolina123',
            'plozinka' => 'nikolina123',
            'bio' => 'Ćao nikolina je',
            'slika' => 'C:\xampp\htdocs\psi_projekat\resources\slike\coka.jpg'
        ]);

        $this->assertDataBaseHas('korisnik',[
            'email' => 'nikolina@gmail.com',
            'odobren' => '0'
        ]);
    }

    /** @test */
    public function neuspesna_emailPostoji()
    {
        $response = $this->post('/registracijas', [
            'ime' => 'Nikolina',
            'prezime' => 'Grujić',
            'v-s' => '2',
            'godine' => '22',
            'm-z' => '1',
            'telefon' => '0658796325',
            'deograda' => 'Autokomanda',
            'email'=> 'naka2000@gmail.com',
            'lozinka'=>'nikolina1',
            'plozinka' => 'nikolina1',
            'bio' => 'Ćao nikolina je',
            'slika' => 'C:\xampp\htdocs\psi_projekat\resources\slike\coka.jpg'
        ]);

        $this->assertDataBaseMissing('korisnik',[
            'email' => 'nikolina1@gmail.com',
        ]);
    }

     /** @test */
     public function neuspesna_praznoPolje()
     {
         $response = $this->post('/registracijas', [
             'prezime' => 'Grujić',
             'v-s' => '2',
             'godine' => '22',
             'm-z' => '1',
             'telefon' => '0658796325',
             'deograda' => 'Autokomanda',
             'email'=> 'nikolina12@gmail.com',
             'lozinka'=>'nikolina12',
             'plozinka' => 'nikolina12',
             'bio' => 'Ćao nikolina je',
             'slika' => 'C:\xampp\htdocs\psi_projekat\resources\slike\coka.jpg'
         ]);
 
         $this->assertDataBaseMissing('korisnik',[
             'email' => 'nikolina12@gmail.com',
         ]);
     }

     /** @test */
     public function neuspesna_potvrdaLozinke()
     {
         $response = $this->post('/registracijas', [
            'ime' => 'Nikolina',
             'prezime' => 'Grujić',
             'v-s' => '2',
             'godine' => '22',
             'm-z' => '1',
             'telefon' => '0658796325',
             'deograda' => 'Autokomanda',
             'email'=> 'nikolina12@gmail.com',
             'lozinka'=>'nikolina12',
             'plozinka' => 'nikolina123',
             'bio' => 'Ćao nikolina je',
             'slika' => 'C:\xampp\htdocs\psi_projekat\resources\slike\coka.jpg'
         ]);
 
         $this->assertDataBaseMissing('korisnik',[
             'email' => 'nikolina12@gmail.com',
         ]);
     }



   
}
