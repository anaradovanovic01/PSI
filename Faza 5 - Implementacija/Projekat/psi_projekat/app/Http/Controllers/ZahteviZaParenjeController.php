<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKorisnik;
use App\Models\ModelZahtevZaParenje;
use App\Models\ModelLjubimac;


class ZahteviZaParenjeController extends Controller
{
    public static function izlistajZahteve(){
        $id=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email)->idK;
        $zahtevi=ModelZahtevZaParenje::zahteviZaParenje($id);
        return view('zahteviZaParenje', ['zahtevi' => $zahtevi]); 
    }

    public static function prihvatiZahtev($id){
        ModelZahtevZaParenje::statusZahteva($id,1);
        return redirect()->route('zahteviZaParenje');
    }

    public static function odbiZahtev($id){
        ModelZahtevZaParenje::statusZahteva($id,0);
        return redirect()->route('zahteviZaParenje');
    }

    public static function izabriSvogLjubimcaZaParenje($idLj){
        $partner=ModelLjubimac::dohvatiLjubimcaPoId($idLj);
        if ($partner->pol==1) $mojPol=0;
        else $mojPol=1;
        $id=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email)->idK;
        $ljubimci=ModelLjubimac::dohvatiMojeLjubimcePoPolu($id,$mojPol);
        return view('izabriSvogLjubimcaZaParenje', ['ljubimci' => $ljubimci, 'partner' => $partner]); 
    }

    public static function posaljiZahtevZaParenje($ljubimacSalje, $ljubimacPrima){
        $zahtev = ModelZahtevZaParenje::dohvatiZahtev($ljubimacSalje, $ljubimacPrima);
        if(!$zahtev) {
            ModelZahtevZaParenje::posaljiZahtev($ljubimacSalje, $ljubimacPrima);
        }
        return redirect()->route('profil');
    }
}
