<?php
//Ana Radovanovic 2019/0282
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSetnja extends Model
{
    use HasFactory;

    protected $table = 'setnja';
    protected $primaryKey = 'idSetnja';

    public $timestamps = false;

    protected $fillable = [	
        'datum',	
        'vremeOd',	
        'vremeDo',	
        'cena',	
        'idDeoGrada',	
        'idK'	
    ];

    public static function dohvatiSetnju($id)
    {
        return ModelSetnja::where('idSetnja',$id)->get()->first();
    }

    public static function pretragaSetnji($request)
    {
        if($request->datum == "" && $request->deoGrada == "" && $request->vremeOd == "" && $request->vremeDo == "")
            return;
        $setnje = DB::table('setnja')
            ->join('korisnik', 'setnja.idK', '=', 'korisnik.idK')
            ->join('deograda', 'setnja.idDeoGrada', '=', 'deograda.idDeoGrada')
            ->join('setac', 'setnja.idK', '=', 'setac.idK');
        if($request->datum != "")
            $setnje = $setnje->where('datum', $request->datum);
        if($request->deoGrada != "")
            $setnje = $setnje->where('naziv', $request->deoGrada);
        $time1 = date('H:i:s', strtotime($request->vremeOd));
        if($request->vremeOd != "")
            $setnje = $setnje->where('vremeOd', '>=',$time1);
        $time2 = date('H:i:s', strtotime($request->vremeDo));
        if($request->vremeDo != "")
            $setnje = $setnje->where('vremeDo', '<=',$time2);
        return ModelSetnja::predstojeceSetnje($setnje);
    }

    public static function dodajSetnju($request) {
        if($request->datum == "" || $request->deoGrada == "" || $request->vremeOd == "" || $request->vremeDo == "" || 
            $request->cena == "" )
            return;
        $idDeoGrada = ModelDeoGrada::dohvatiPrekoNaziva($request->deoGrada)->idDeoGrada;
        ModelSetnja::insert([
            'datum' => $request->datum,	
            'vremeOd' => $request->vremeOd,	
            'vremeDo' => $request->vremeDo,	
            'cena' => $request->cena,
            'idDeoGrada' => $idDeoGrada,	
            'idK' => auth()->user()->idK
        ]);
    }

    public static function mojeSetnje($id){
        $mojeZakazaneSetnje=DB::table('ljubimac')
        ->join('vlasnik', 'ljubimac.idK','=','vlasnik.idK')
        ->join('zahtevzasetnju', 'ljubimac.idLjubimac','=','zahtevzasetnju.idLjubimac')
        ->select('zahtevzasetnju.idSetnja as idSetnja', 'vlasnik.idK as idVlasnik', 'zahtevzasetnju.prihvacen_odbijen as prihvacen_odbijen');
        $mojeZakazaneSetnje= $mojeZakazaneSetnje->where('vlasnik.idK', $id);
        $mojeZakazaneSetnje= $mojeZakazaneSetnje->where('prihvacen_odbijen', 1);
        $mojeZakazaneSetnje= $mojeZakazaneSetnje
        ->join('setnja', 'zahtevzasetnju.idSetnja','=','setnja.idSetnja')
        ->join('korisnik', 'korisnik.idK', '=', 'setnja.idK')
        ->join('setac', 'korisnik.idK', '=', 'setac.idK')
        ->join('deoGrada', 'setnja.idDeoGrada', '=', 'deoGrada.idDeoGrada')
        ->select('zahtevzasetnju.idZahteviZaSetnju as idZahteva','setnja.idSetnja as idSetnja', 'korisnik.idK as idK', 'korisnik.ime as imeSetac' ,'korisnik.prezime as prezimeSetac', 'setnja.datum as datum', 'setnja.vremeOd as vremeOd', 'setnja.vremeDo as vremeDo', 'deoGrada.naziv as deoGrada', 'setac.slika as slika' )
        ->orderBy('datum','desc')
        ->orderBy('vremeOd', 'asc')
        ->orderBy('vremeDo', 'asc');
        return  $mojeZakazaneSetnje;
    }

    public static function mojeSetnjeSetac($id){
        $mojeZakazaneSetnje=DB::table('setnja')
        ->join('deoGrada', 'setnja.idDeoGrada', '=', 'deoGrada.idDeoGrada')
        //->leftJoin('zahtevzasetnju', 'zahtevzasetnju.idSetnja','=','setnja.idSetnja')
        ->select(/*'zahtevzasetnju.idZahteviZaSetnju as idZahteva',*/'setnja.idSetnja as idSetnja', 'setnja.datum as datum', 'setnja.vremeOd as vremeOd', 'setnja.vremeDo as vremeDo', 'deoGrada.naziv as deoGrada')
        ->where('setnja.idK', $id)
        ->orderBy('datum','desc')
        ->orderBy('vremeOd', 'asc')
        ->orderBy('vremeDo', 'asc');
        return  $mojeZakazaneSetnje;
    }

    public static function protekleSetnje($mojeZakazaneSetnje){
        $currentDate = date('Y-m-d');
        $currentDate = date('Y-m-d', strtotime($currentDate));
        $protekleSetnje=$mojeZakazaneSetnje->where('datum','<', $currentDate);
        return $protekleSetnje->get();
    }

    public static function predstojeceSetnje($mojeZakazaneSetnje){
        $currentDate = date('Y-m-d');
        $currentDate = date('Y-m-d', strtotime($currentDate));
        $predstojeceSetnje=$mojeZakazaneSetnje->where('datum','>=', $currentDate);
        return $predstojeceSetnje->get();
    }

    public static function obrisiSetnju($idS){
        $setnja = ModelSetnja::find($idS);
        $setnja->delete();
    }

}