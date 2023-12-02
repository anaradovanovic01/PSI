<?php

namespace App\Http\Controllers;

use App\Models\ModelSetnja;
use Illuminate\Http\Request;
use App\Models\ModelZahtevZaSetnju;
use App\Models\ModelLjubimac;

class ZahteviZaSetnjeController extends Controller
{
    public static function izlistajZahteve(){
        $zahtevi=ModelZahtevZaSetnju::zahteviZaSetnju(auth()->user()->idK);
        return view('zahteviZaSetnje', ['zahtevi' => $zahtevi]); 
    }

    public static function prihvatiZahtev($id){
        ModelZahtevZaSetnju::statusZahteva($id, 1);
        return app('App\Http\Controllers\MojeSetnjeSetacController')->mojeSetnje();
    }

    public static function odbiZahtev($id){
        ModelZahtevZaSetnju::statusZahteva($id, 0);
        return app('App\Http\Controllers\ZahteviZaSetnjeController')->izlistajZahteve();
    }

    public static function izabriSvogLjubimcaZaSetnju($idSetnja){
        $setnja=ModelSetnja::dohvatiSetnju($idSetnja);
        $ljubimci = ModelLjubimac::dohvatiLjubimceVlasnika(auth()->user()->idK);
        return view('izabriSvogLjubimcaZaSetnju', ['ljubimci' => $ljubimci, 'setnja' => $setnja]); 
    }

    public static function posaljiZahtevZaSetnju($setnja, $ljubimac){
        $zahtev = ModelZahtevZaSetnju::dohvatiZahtev($setnja, $ljubimac);
        if(!$zahtev) {
            ModelZahtevZaSetnju::posaljiZahtev($setnja, $ljubimac);
        }
        return redirect()->route('profil');
    }

}
