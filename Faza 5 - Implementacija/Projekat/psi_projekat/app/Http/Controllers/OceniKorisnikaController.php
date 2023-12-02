<?php

namespace App\Http\Controllers;

use App\Models\ModelKorisnik;
use Illuminate\Http\Request;
use App\Models\ModelOcena;
use App\Models\ModelVlasnik;
use App\Models\ModelSetac;

class OceniKorisnikaController extends Controller
{
    public function dodajOcenu($id) {
        if(auth()->user()->idK == $id) return app('App\Http\Controllers\ProfilController')->profil();
        $korisnik = ModelKorisnik::dohvatiKorisnika($id);
        $ocena = ModelOcena::proveriDaLiPostojiOcena(auth()->user()->idK, $id);
        if(!$ocena)
            return view('dodajOcenu', ['korisnik' => $korisnik]);
        else {
            $ocenjen = ModelKorisnik::dohvatiKorisnika($id);
            return view('pogledajOcenu', ['ocenjen' => $ocenjen, 'request' => $ocena]);
        }
    }

    public function pogledajOcenu(Request $request) {
        $this->validate($request,[
            'ocena'=> 'required',
            'opis'=>'required'
        ]);
        ModelOcena::dodajOcenu($request, auth()->user()->idK);
        $ocenjen = ModelKorisnik::dohvatiKorisnika($request->idKome);
        return view('pogledajOcenu', ['ocenjen' => $ocenjen, 'request' => $request]);
    }

    public function pogledajOcene($idK) {
        $prosecnaOcena = ModelOcena::dohvatiProsecnuOcenu($idK);
        $ocene = ModelOcena::dohvatiOcene($idK);
        $korisnik = ModelKorisnik::dohvatiKorisnika($idK);
        $ocenjuje = [];
        $slike = [];
        for($i=0; $i<count($ocene); $i++) {
            $ocenjuje[$i] = ModelKorisnik::dohvatiKorisnika($ocene[$i]->idKOcenjuje);
            if($ocenjuje[$i]->vrsta == 1) $slike[$i]=ModelVlasnik::dohvatiKorisnika($ocene[$i]->idKOcenjuje)->slika;
            else $slike[$i]=ModelSetac::dohvatiKorisnika($ocene[$i]->idKOcenjuje)->slika;
        }
        return view('pogledajOceneKorisnika', ['ocene' => $ocene, 'korisnik' => $korisnik, 'prosecnaOcena' => $prosecnaOcena, 'ocenjuje' => $ocenjuje, 'slike' => $slike]);
    }
}
