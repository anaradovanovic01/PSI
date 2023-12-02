<?php
//Ana Radovanovic 2019/0282
namespace App\Http\Controllers;

use App\Models\ModelSetnja;
use App\Models\ModelDeoGrada;
use Illuminate\Http\Request;

class PretragaSetnjiController extends Controller
{
    public function pretragaSetnji(Request $request) {
        $setnje = ModelSetnja::pretragaSetnji($request); 
        $sviDeloviGrada = ModelDeoGrada::dohvatiSve();
        return view('izlistaneSetnje', ['setnje' => $setnje, 'sviDeloviGrada' => $sviDeloviGrada, 'request' => $request]);
    }

}