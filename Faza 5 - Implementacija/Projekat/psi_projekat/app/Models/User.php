<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;

    protected $table = 'korisnik';
    //postoji problem kada se idK postavi za PK, mora da bude email jer on to kasnije koristi u nekim metodama
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    

    protected $fillable = [
        'idK','email', 'lozinka','ime','prezime','vrsta','odobren'
    ];

    public function getAuthPassword(){
        return $this->lozinka;
    }

    public static function neprihvaceniZahtevi(){
        return User::where('odobren',0)->get();
    }
    
    public static function odobreniKorisnici(){
        return User::where('odobren',1)->get();
    }

    public static function obrisiKorisnika($id){
        User::where('idK',$id)->delete();
    }
    public static function prihvatiZahtev($id){
        User::where('idK',$id)->update(['odobren'=>1]);
    }
    public static function isOdobren($email){
        $u=User::where('email', $email)->get();
        if (!$u->isEmpty()){
            return (User::where('email', $email)->value('odobren')==1);}
        return true;
    }

}
