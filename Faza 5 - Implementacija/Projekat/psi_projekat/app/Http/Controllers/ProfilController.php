<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSetac;
use App\Models\ModelDeoGrada;
use App\Models\ModelKorisnik;
use App\Models\ModelVlasnik;
use App\Models\ModelLjubimac;
use App\Models\ModelOcena;

class ProfilController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function profil(){
        $korisnik=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
        if($korisnik->vrsta==1) {
            $ocena = ModelOcena::dohvatiProsecnuOcenu(auth()->user()->idK);
            $vlasnik=ModelVlasnik::dohvatiKorisnika($korisnik->idK);
            $ljubimci=ModelLjubimac::dohvatiLjubimce($korisnik->idK);
            $id=$vlasnik->idDeoGrada;
            $deoGrada=ModelDeoGrada::dohvatiPrekoId($id);
            $slika=base64_encode($vlasnik->slika);
            return view('profilVlasnik', ['vlasnik' => $vlasnik, 'korisnik' => $korisnik, 'ljubimci' => $ljubimci, 'deoGrada' => $deoGrada, 'slika'=> $slika, 'ocena' => $ocena]);
        }
        else if ($korisnik->vrsta==2){
            $ocena = ModelOcena::dohvatiProsecnuOcenu(auth()->user()->idK);
            $setac=ModelSetac::dohvatiKorisnika($korisnik->idK);
            $id=$setac->idDeoGrada;
            $deoGrada=ModelDeoGrada::dohvatiPrekoId($id);
            $slika=base64_encode($setac->slika);
            return view('profilSetac', ['setac' => $setac, 'korisnik' => $korisnik, 'deoGrada' => $deoGrada,'slika' => $slika, 'ocena' => $ocena]);
        }
        else if ($korisnik->vrsta==0){
            return view('profilAdmin',['korisnik' => $korisnik]);
        }
    }

    public function profilId($id){
        $korisnik=ModelKorisnik::dohvatiKorisnika($id);
        $ocena = ModelOcena::dohvatiProsecnuOcenu($id);
        if($korisnik->vrsta==1) {
            $vlasnik=ModelVlasnik::dohvatiKorisnika($korisnik->idK);
            $ljubimci=ModelLjubimac::dohvatiLjubimce($korisnik->idK);
            $id=$vlasnik->idDeoGrada;
            $deoGrada=ModelDeoGrada::dohvatiPrekoId($id);
            $slika=base64_encode($vlasnik->slika);
            return view('profilVlasnik', ['vlasnik' => $vlasnik, 'korisnik' => $korisnik, 'ljubimci' => $ljubimci, 'deoGrada' => $deoGrada, 'slika'=> $slika, 'ocena' => $ocena]);
        }
        else if ($korisnik->vrsta==2){
            $setac=ModelSetac::dohvatiKorisnika($korisnik->idK);
            $id=$setac->idDeoGrada;
            $deoGrada=ModelDeoGrada::dohvatiPrekoId($id);
            $slika=base64_encode($setac->slika);
            return view('profilSetac', ['setac' => $setac, 'korisnik' => $korisnik, 'deoGrada' => $deoGrada,'slika' => $slika, 'ocena' => $ocena]);
        }
        //dodaj za Admina
    }

    public function ukloniLjubimca($id){
        ModelLjubimac::obrisiLjubimca($id);
        return redirect('/profil');
    }
}
