<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelVlasnik;
use App\Models\ModelSetac;
use App\Models\ModelDeoGrada;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function prikaziZahteve()
    {
        $zahtevi = User::neprihvaceniZahtevi();
        return view('adminZahtevi',['zahtevi'=>$zahtevi]);
    }

    public function obrisiZahtev($id){
        User::obrisiKorisnika($id);
        return redirect()->route('admin_prikaziZahteve');
    }

    public function prihvatiZahtev($id){
        User::prihvatiZahtev($id);
        return redirect()->route('admin_prikaziZahteve');
    }

    public function prikaziKorisnike()
    {
        $zahtevi = User::odobreniKorisnici();
        return view('adminListaKorisnika',['zahtevi'=>$zahtevi]);
    }
    public function obrisiKorisnika($id){
        User::obrisiKorisnika($id);
        return redirect()->route('admin_prikaziKorisnike');
    }
    public function pogresanPristup(){
        return view('zabranjenPristup');
    }
}
