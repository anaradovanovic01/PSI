<?php
//Ana Radovanovic 2019/0282
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModelLjubimac extends Model
{
    use HasFactory;

    protected $table = 'ljubimac';
    protected $primaryKey = 'idLjubimac';

    public $timestamps = false;

    protected $fillable = [	
        'idLjubimac',
        'ime',	
        'starost',	
        'pol',	
        'idR',	
        'parenje',	
        'opis',
        'idK',
        'slika'
    ];

    public static function dohvatiLjubimceVlasnika($id)
    {
        return ModelLjubimac::where('idK', $id)->get();
    }

    public static function pretragaPartnera($request)
    {
        if($request->rasa == "" && $request->pol == "" && $request->godineOd == "" && $request->godineDo == "")
            return;
        $ljubimci = DB::table('ljubimac')
            ->join('korisnik', 'ljubimac.idK', '=', 'korisnik.idK')
            ->join('rasapasa', 'ljubimac.idR', '=', 'rasapasa.idR')
            ->select('ljubimac.idLjubimac as idLjubimac','ljubimac.ime as imeLjubimca', 'starost', 'ljubimac.pol as polLjubimca', 'ljubimac.opis as opisLjubimca', 
                'parenje', 'slika', 'naziv as rasa', 'korisnik.ime as imeVlasnika', 'korisnik.idK as idKorisnik')
            ->where('parenje', '1');
        if (Auth::check()) $ljubimci = $ljubimci->where('korisnik.idK', '!=', auth()->user()->idK);
        if($request->rasa != "")
            $ljubimci = $ljubimci->where('naziv', $request->rasa);
        if($request->pol != "")
            $ljubimci = $ljubimci->where('pol', $request->pol);
        if($request->godineOd != "")
            $ljubimci = $ljubimci->where('starost', '>=', $request->godineOd);
        if($request->godineDo != "")
            $ljubimci = $ljubimci->where('starost', '<=', $request->godineDo);
        return $ljubimci->get();
    }

    public static function ljubimciPoSetnji($idSetnja){
        $ljubimci=DB::table('ljubimac')
        ->join('zahtevzasetnju', 'zahtevzasetnju.idLjubimac','=', 'ljubimac.idLjubimac')
        ->join('vlasnik', 'vlasnik.idK', '=' , 'ljubimac.idK')
        ->where('zahtevzasetnju.idSetnja', $idSetnja)
        ->select('vlasnik.idK as idVlasnika', 'ljubimac.slika as slika');
        return $ljubimci->get();
    }

    public static function obrisiLjubimca($id){
        $ljubimac = ModelLjubimac::find($id);
        $ljubimac->delete();
    }

    public static function dohvatiRase($ljubimci){
        return $ljubimci->join('rasapasa', 'ljubimci.idR', '=', 'rasapasa.idR')->get();
    }

    public static function dohvatiLjubimce($id){
        $ljubimci=DB::table('ljubimac')
        ->join('korisnik', 'korisnik.idK', '=', 'ljubimac.idK')
        ->join('rasapasa', 'rasapasa.idR', '=', 'ljubimac.idR')
        ->where('korisnik.idK', $id)
        ->select('ljubimac.idLjubimac as idLjubimac', 'ljubimac.ime as ime', 'rasapasa.naziv as naziv', 'ljubimac.starost as starost', 'ljubimac.slika as slika');
        return $ljubimci->get();
    }

    public static function dohvatiMojeLjubimcePoPolu($id, $pol){
        $ljubimci=DB::table('ljubimac')
        ->join('korisnik', 'korisnik.idK', '=', 'ljubimac.idK')
        ->where('korisnik.idK', $id)
        ->where('ljubimac.pol', $pol)
        ->select('ljubimac.idLjubimac as idLjubimac', 'ljubimac.ime as ime', 'ljubimac.slika as slika');
        return $ljubimci->get();
    }

    public static function dohvatiLjubimcaPoId($id){
        return ModelLjubimac::where('idLjubimac', $id)->get()->first();
    }
}
