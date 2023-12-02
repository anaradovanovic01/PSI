<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRasa extends Model
{
    use HasFactory;

    protected $table='rasapasa';
    protected $primaryKey='idR';

    public $timestamps = false;

    protected $fillable = [	
        'idR',
        'naziv',	
    ];

    public static function dohvatiNazivRase($id)
    {
        return ModelRasa::where('idR', $id)->get()->first();
    }

    public static function dohvatiPrekoNaziva($rasa)
    {
        return ModelRasa::where('naziv', $rasa)->get()->first();
    }

    public static function dohvatiSve() {
        return ModelRasa::all();
    }

}
