<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDeoGrada extends Model
{
    use HasFactory;

    protected $table = 'deograda';
    protected $primaryKey = 'idDeoGrada';

    public $timestamps = false;

    protected $fillable = [	
        'idDeoGrada',
        'naziv'
    ];

    public static function dohvatiPrekoId($id)
    {
        return ModelDeoGrada::where('idDeoGrada', $id)->get()->first();
    }

    public static function dohvatiPrekoNaziva($deoGrada)
    {
        return ModelDeoGrada::where('naziv', $deoGrada)->get()->first();
    }

    public static function dohvatiSve() {
        return ModelDeoGrada::all();
    }
}
