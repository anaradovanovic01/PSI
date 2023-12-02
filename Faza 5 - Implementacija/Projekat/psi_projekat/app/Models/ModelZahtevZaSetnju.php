<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelZahtevZaSetnju extends Model
{
    use HasFactory;

    protected $table = 'zahtevzasetnju';
    protected $primaryKey = 'idZahteviZaSetnju';

    public $timestamps = false;

    protected $fillable = [	
        'idZahteviZaSetnju',
        'idSetnja',
        'idLjubimcac',
        'prihvacen_odbijen'
    ];

    public static function dohvatiZahtev($setnja, $ljubimac) {
        return ModelZahtevZaSetnju::where('idSetnja', $setnja)->where('idLjubimac', $ljubimac)->get()->first();
    }

    public static function zahteviZaSetnju($id){
        return DB::table('zahtevzasetnju')
        ->join('setnja', 'zahtevzasetnju.idSetnja','=','setnja.idSetnja')
        ->join('ljubimac', 'zahtevzasetnju.idLjubimac', '=', 'ljubimac.idLjubimac')
        ->join('rasapasa', 'ljubimac.idR', '=', 'rasapasa.idR')
        ->join('korisnik', 'ljubimac.idK', '=', 'korisnik.idK')
        ->where('setnja.idK', $id)
        ->where('zahtevzasetnju.prihvacen_odbijen',2) //nov zahtev => prihvacen_odbijen=2
        ->select('zahtevzasetnju.idZahteviZaSetnju as id','ljubimac.slika as slika',
        'ljubimac.ime as imeLjubimca', 'setnja.datum as datum', 'rasapasa.naziv as rasa', 'ljubimac.starost as starost', 
        'korisnik.idK as idKorisnika','korisnik.ime as imeKorisnika')->get();
    }

    public static function statusZahteva($id, $status){
        DB::table('zahtevzasetnju')
        ->where('idZahteviZaSetnju', $id)   
        ->limit(1) 
        ->update(array('prihvacen_odbijen' => $status));
    }

    public static function obrisiZahtev($idS){
        $zahtevi = ModelZahtevZaSetnju::where('idZahteviZaSetnju', $idS);
        $zahtevi->delete();
    }

    public static function posaljiZahtev($setnja, $ljubimac) {
        $zahtev= new ModelZahtevZaSetnju();
        $zahtev->idSetnja=$setnja;
        $zahtev->idLjubimac=$ljubimac;
        $zahtev->prihvacen_odbijen=2;
        $zahtev->save();
    }
}
