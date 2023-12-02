<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSetnja;
use App\Models\ModelDeoGrada;

class DodajSetnjuController extends Controller
{
    public function dodajSetnju(Request $request) {
        ModelSetnja::dodajSetnju($request);
        $sviDeloviGrada = ModelDeoGrada::dohvatiSve();
        return view('dodajSetnju', ['sviDeloviGrada' => $sviDeloviGrada, 'request' => $request]);
    }
}
