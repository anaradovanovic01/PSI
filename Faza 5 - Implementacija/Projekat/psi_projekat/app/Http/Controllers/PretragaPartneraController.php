<?php
//Ana Radovanovic 2019/0282
namespace App\Http\Controllers;

use App\Models\ModelLjubimac;
use App\Models\ModelRasa;
use Illuminate\Http\Request;

class PretragaPartneraController extends Controller
{
    public function pretragaPartnera(Request $request) {
        $partneri = ModelLjubimac::pretragaPartnera($request); 
        $sveRase = ModelRasa::dohvatiSve();
        return view('izlistaniPartneri', ['partneri' => $partneri, 'sveRase' => $sveRase, 'request' => $request]);
    }
}
