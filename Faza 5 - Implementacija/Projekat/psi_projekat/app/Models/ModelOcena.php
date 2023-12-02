<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOcena extends Model
{
    use HasFactory;

    protected $table = 'ocena';
    protected $primaryKey = 'idOcena';

    public $timestamps = false;

    protected $fillable = [	
        'ocena',
        'idKOcenjuje',
        'idKOcenjen',
        'opis'
    ];

    public static function dodajOcenu($request, $idKo)
    {
        ModelOcena::insert([
            'ocena' => $request->ocena,
            'idKOcenjuje' => $idKo,
            'idKOcenjen' => $request->idKome,
            'opis' => $request->opis
        ]);
    }

    public static function dohvatiProsecnuOcenu($idK)
    {
        return ModelOcena::where('idKOcenjen', $idK)->avg('ocena');
    }

    public static function dohvatiOcene($idK) {
        return ModelOcena::where('idKOcenjen', $idK)->get();
    }

    public static function proveriDaLiPostojiOcena($idKo, $idKome) {
        return ModelOcena::where('idKOcenjuje', $idKo)->where('idKOcenjen', $idKome)->get()->first();
    }

}
