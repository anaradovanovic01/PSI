<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelVlasnik;
use App\Models\ModelSetac;
use App\Models\ModelDeoGrada;
use Illuminate\Support\Facades\DB;


class RegistracijaController extends Controller
{
    public function registracija()
    {
        $delovi = ModelDeoGrada::dohvatiSve();
        return view('registracija',['delovi'=>$delovi]);
    }
    public function registracija_submit(Request $request)
    {
        $this->validate($request,[
            'ime' => 'required|min:2|alpha',
            'prezime' => 'required|min:2|alpha',
            'godine' => 'required|numeric',
            'telefon' => 'required|numeric',
            'email'=> 'required|min:3|email|unique:App\Models\User,email',
            'lozinka'=>'required|min:5',
            'plozinka' => 'required|same:lozinka',
            'bio' => 'required'
        ]);
        $user = new User;
        $user->email = $request['email'];
        $user->lozinka = $request['lozinka'];
        $user->ime = $request['ime'];
        $user->prezime = $request['prezime'];
        $user->vrsta = $request['v-s'];
        $user->odobren = 0;
        $user->save();
        
        if ($request['v-s']=='1'){
            $vlasnik = new ModelVlasnik;
            $vlasnik->idK = DB::table('korisnik')->where('email', $request['email'])->value('idK');
            $vlasnik->godine = $request['godine'];
            $vlasnik->telefon = $request['telefon'];
            $vlasnik->opis = $request['bio'];
            $vlasnik->pol = $request['m-z'];
            $vlasnik->idDeoGrada = $request['deograda'];
            $file = $request->file('slika');
            $extendion = $request->file('slika')->getClientOriginalExtension();
            $filename= date('YmdHi').$request['ime'].$request['idK'].'.'.$extendion;
            $path = $request->file('slika')->storeAs('public/slike',$filename);
            $vlasnik->slika = $filename;
            $vlasnik->save();
        }else{
            $vlasnik = new ModelSetac();
            $vlasnik->idK = DB::table('korisnik')->where('email', $request['email'])->value('idK');
            $vlasnik->godine = $request['godine'];
            $vlasnik->telefon = $request['telefon'];
            $vlasnik->opis = $request['bio'];
            $vlasnik->pol = $request['m-z'];
            $vlasnik->idDeoGrada = $request['deograda'];
            $file = $request->file('slika');
            $extendion = $request->file('slika')->getClientOriginalExtension();
            $filename= date('YmdHi').$request['ime'].$request['idK'].'.'.$extendion;
            $path = $request->file('slika')->storeAs('public/slike',$filename);
            $vlasnik->slika = $filename;
            $vlasnik->save();
        }
        
        return redirect()->route('index');
    }
  
}
