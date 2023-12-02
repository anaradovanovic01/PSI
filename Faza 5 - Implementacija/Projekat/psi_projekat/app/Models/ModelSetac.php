<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class ModelSetac extends ModelKorisnik
{
    use HasFactory;

    protected $table = 'setac';
    protected $primaryKey = 'idK';

    public $timestamps = false;

    protected $fillable = [	
        'idK',
        'godine',	
        'telefon',	
        'pol',	
        'opis',	
        'idDeoGrada',	
        'slika'	
    ];

    public static function dohvatiKorisnika($id)
    {
        return ModelSetac::where('idK', $id)->get()->first();
    }

    public static function azurirajKorisnika($request){
        if ($request->telefon=="" && $request->deoGrada=="" && $request->opis=="" && $request->slika=="") return;
        $korisnik=ModelKorisnik::dohvatiKorisnikaPrekoEmail(auth()->user()->email);
        if ($request->telefon!="") {
            DB::table('setac')
            ->where('idK', $korisnik->idK) 
            ->limit(1)  
            ->update(array('telefon' => $request->telefon));
        }
        if ($request->deoGrada!="Izaberi..") {
            $grad=ModelDeoGrada::dohvatiPrekoNaziva($request->deoGrada);
            DB::table('setac')
            ->where('idK',$korisnik->idK ) 
            ->limit(1)  
            ->update(array('idDeoGrada' => $grad->idDeoGrada));
        }
        if ($request->opis!="") {
            DB::table('setac')
            ->where('idK', $korisnik->idK) 
            ->limit(1)  
            ->update(array('opis' => $request->opis));
        }
        if ($request->slika!="") {
            $file = $request->file('slika');
            $extendion = $request->file('slika')->getClientOriginalExtension();
            $filename= date('YmdHi').$korisnik->idK.'.'.$extendion;
            $path = $request->file('slika')->storeAs('public/slike',$filename);
            DB::table('setac')
            ->where('idK', $korisnik->idK) 
            ->limit(1)  
            ->update(array('slika' =>  $filename));
        }
    }
}
