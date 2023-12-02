<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelZahtevZaParenje extends Model
{
    use HasFactory;

    protected $table = 'zahtevzaparenje';
    protected $primaryKey = 'idZahtevZaParenje';

    public $timestamps = false;

    protected $fillable = [	
        'idZahtevZaParenje',
        'idSalje',
        'idPrima',
        'kada',
        'prihvacen_odbijen'
    ];

    
    public static function dohvatiZahtev($ljubimacSalje, $ljubimacPrima) {
        return ModelZahtevZaParenje::where('idSalje', $ljubimacSalje)->where('idPrima', $ljubimacPrima)->get()->first();
    }

    public static function zahteviZaParenje($id){
         $mojiZahtevi= DB::table('zahtevzaparenje')
        ->join('ljubimac', 'zahtevzaparenje.idPrima', '=', 'ljubimac.idLjubimac')
        ->join('ljubimac as lj', 'zahtevzaparenje.idSalje','=', 'lj.idLjubimac')
        ->join('rasapasa', 'rasapasa.idR', '=', 'lj.idR')
        ->join('korisnik', 'korisnik.idK', '=', 'lj.idK')
        ->where('zahtevzaparenje.prihvacen_odbijen',2) //nov zahtev => prihvacen_odbijen=2
        ->where('ljubimac.idK', $id)
        ->select('zahtevzaparenje.idZahtevZaParenje as id', 'ljubimac.ime as imeZa','lj.slika as slika', 'lj.ime as imeOd', 'lj.starost as starost',
         'rasapasa.naziv as rasa', 'korisnik.idK as idK', 'korisnik.ime as imeKorisnika');
        return $mojiZahtevi->get();
    }

    public static function statusZahteva($id, $status){
        DB::table('zahtevzaparenje')
        ->where('idZahtevZaParenje', $id)   
        ->limit(1) 
        ->update(array('prihvacen_odbijen' => $status));
    }

    public static function posaljiZahtev($ljubimacSalje, $ljubimacPrima){
        $zahtev= new ModelZahtevZaParenje();
        $zahtev->idSalje=$ljubimacSalje;
        $zahtev->idPrima=$ljubimacPrima;
        $zahtev->prihvacen_odbijen=2;
        $zahtev->save();
    }

}
