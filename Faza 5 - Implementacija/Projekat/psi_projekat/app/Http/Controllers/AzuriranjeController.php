<?php

namespace App\Http\Controllers;

use App\Models\ModelKorisnik;
use App\Models\ModelSetac;
use App\Models\ModelVlasnik;
use App\Models\ModelDeoGrada;
use Illuminate\Http\Request;

class AzuriranjeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function prikaziFormuZaAzuriranje() {
        $korisnikOsnovno=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
        if ($korisnikOsnovno->vrsta==1) $korisnik=ModelVlasnik::dohvatiKorisnika($korisnikOsnovno->idK);
        else  $korisnik=ModelSetac::dohvatiKorisnika($korisnikOsnovno->idK);
        $id=$korisnik->idDeoGrada;
        $deoGrada=ModelDeoGrada::dohvatiPrekoId($id);
        $deloviGrada=ModelDeoGrada::dohvatiSve();
        return view('azuriranjeProfila', ['korisnikOsnovno' => $korisnikOsnovno, 'korisnik' => $korisnik,  'deoGrada' => $deoGrada, 'deloviGrada'=> $deloviGrada]);
    } 
    
    public function azurirajProfil(Request $request) {
       ModelKorisnik::azurirajKorisnika($request);
       $setac=ModelSetac::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
       if($setac->vrsta==1) ModelVlasnik::azurirajKorisnika($request); 
       else ModelSetac::azurirajKorisnika($request);
       return app('App\Http\Controllers\ProfilController')->profil();
    } 

}
