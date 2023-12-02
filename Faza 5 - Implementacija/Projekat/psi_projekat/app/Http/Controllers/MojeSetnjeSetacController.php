<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSetnja;
use App\Models\ModelLjubimac;
use App\Models\ModelKorisnik;
use App\Models\ModelZahtevZaSetnju;

class MojeSetnjeSetacController extends Controller
{
    public function mojeSetnje() {
        $korisnik=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
        $mojeSetnje=ModelSetnja::mojeSetnjeSetac($korisnik->idK);
        $mojeSetnje1=ModelSetnja::mojeSetnjeSetac($korisnik->idK);
        $protekleSetnje = ModelSetnja::protekleSetnje( $mojeSetnje); 
        $predstojeceSetnje=ModelSetnja::predstojeceSetnje( $mojeSetnje1);
        $ljubimciProsli= [];
        for ($i=0; $i<count($protekleSetnje); $i++){
            $ljubimciProsli[$i]=ModelLjubimac::ljubimciPoSetnji($protekleSetnje[$i]->idSetnja);
        }
        $ljubimciSlede= [];
        for ($i=0; $i<count($predstojeceSetnje); $i++){
            $ljubimciSlede[$i]=ModelLjubimac::ljubimciPoSetnji( $predstojeceSetnje[$i]->idSetnja);
        }
        return view('mojeSetnjeSetac',  ['mojesetnje' => $mojeSetnje->get(),'prosle' => $protekleSetnje, 'slede' => $predstojeceSetnje,'ljubimciProsli' => $ljubimciProsli, 'ljubimciSlede' =>   $ljubimciSlede] );
    }

    public static function odjaviSetnju($idSetnje){
        ModelZahtevZaSetnju::obrisiZahtev($idSetnje);
        ModelSetnja::obrisiSetnju($idSetnje);
        return app('App\Http\Controllers\MojeSetnjeSetacController')->mojeSetnje();
    }
}
