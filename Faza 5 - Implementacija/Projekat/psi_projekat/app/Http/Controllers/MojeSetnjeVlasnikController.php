<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSetnja;
use App\Models\ModelKorisnik;
use App\Models\ModelZahtevZaSetnju;


class MojeSetnjeVlasnikController extends Controller
{
    public function mojeSetnje() {
        $korisnik=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
        $mojeSetnje=ModelSetnja::mojeSetnje($korisnik->idK);
        $mojeSetnje1=ModelSetnja::mojeSetnje($korisnik->idK);
        $protekleSetnje = ModelSetnja::protekleSetnje( $mojeSetnje); 
        $predstojeceSetnje=ModelSetnja::predstojeceSetnje( $mojeSetnje1);
        return view('mojeSetnjeVlasnik', ['prosle' => $protekleSetnje, 'slede' => $predstojeceSetnje]);
    }

    public static function odjaviSetnjuVlasnika($idZahteva){
        ModelZahtevZaSetnju::obrisiZahtev($idZahteva);
        return redirect('/mojeSetnjeVlasnik');
    }

}
