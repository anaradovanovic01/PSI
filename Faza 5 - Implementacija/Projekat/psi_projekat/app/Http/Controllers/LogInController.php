<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LogInController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function login_submit(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|min:3|email',
            'pass'=>'required|min:5'
        ]);
        if (!User::isOdobren($request->email)){
            return back()->with('status','Vaš zahtev za registraciju još uvek nije odobren');
        }
        if (!auth()->attempt(['email' => $request->email,'lozinka' => $request->pass])){
            return back()->with('status','Uneti su neispravni podaci'); 
        }
        //dd(session()->all());
        if ( DB::table('korisnik')->where('email', $request['email'])->value('vrsta')==0){
            return redirect()->route('admin_prikaziZahteve');
        }
        return redirect()->route('profil');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

}
