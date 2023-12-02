<?php

namespace App\Http\Controllers;

use App\Models\ModelLjubimac;
use Illuminate\Http\Request;
use App\Models\ModelRasa;
use App\Models\ModelKorisnik;

class DodajLjubimcaController extends Controller
{
    public function dodajLjubimca(){
        $sveRase = ModelRasa::dohvatiSve();
        return view('dodajLjubimca', ['sveRase' => $sveRase]);
    }

    public function dodajLjubimca_submit(Request $request) {
        $this->validate($request,[
            'ime' => 'required|min:2|alpha',
            'godine' => 'required|numeric',
            'opis' => 'required',
            'slika' => 'file|image|required'
        ]);
        $user = new ModelLjubimac;
        $user->ime = $request['ime'];
        $user->starost = $request['godine'];
        $user->pol = $request['pol'];
        $user->opis = $request['opis'];
        $user->idR = ModelRasa::dohvatiPrekoNaziva($request->rasa)->idR;
        $user->idK = ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email)->idK;
        $file = $request->file('slika');
        $extendion = $request->file('slika')->getClientOriginalExtension();
        $filename= date('YmdHi').$request['ime'].'.'.$extendion;
        $path = $request->file('slika')->storeAs('public/slike',$filename);
        $user->slika = $filename;
        $user->slika = $filename;

        if(isset($request->parenje)) $user->parenje = 1;
        else $user->parenje = 0;
            
        $user->save();

        return redirect()->route('profil');
    
    }
}
