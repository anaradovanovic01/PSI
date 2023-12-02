<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKorisnik extends Model
{
    use HasFactory;

    protected $table = 'korisnik';
    protected $primaryKey = 'idK';

    public $timestamps = false;

    protected $fillable = [	
        'idK',
        'email',	
        'lozinka',	
        'ime',	
        'prezime',
        'vrsta',
        'odobren'	
    ];

    public static function dohvatiKorisnika($id)
    {
        return ModelKorisnik::where('idK',$id)->get()->first();
    }

    public static function azurirajKorisnika($request){
        if ($request->ime=="" && $request->prezime=="" && $request->email=="" && $request->stara=="" && $request->nova=="" && $request->provera=="") return;
        if ($request->ime != "") {
            DB::table('korisnik')
            ->where('idK', auth()->user()->idK) 
            ->limit(1)  
            ->update(array('ime' => $request->ime));
        }
        if ($request->prezime!="") {
            DB::table('korisnik')
            ->where('idK', auth()->user()->idK) 
            ->limit(1)  
            ->update(array('prezime' => $request->prezime));
        }
        if ($request->email!="") {
            DB::table('korisnik')
            ->where('idK', auth()->user()->idK) 
            ->limit(1)  
            ->update(array('email' => $request->email));
        }
        if ($request->stara!=""){
            $lozinka=ModelKorisnik::dohvatiKorisnika(auth()->user()->idK)->lozinka;
            if($lozinka==$request->stara && $request->nova==$request->potvrda){
                DB::table('korisnik')
                ->where('idK', auth()->user()->idK) 
                ->limit(1)  
                ->update(array('lozinka' => $request->nova));
            }
        }

        
    }

    public static function dohvatiKorisnikaPrekoEmail($email){
        return ModelKorisnik::where('email',$email)->get()->first();
    }
}
