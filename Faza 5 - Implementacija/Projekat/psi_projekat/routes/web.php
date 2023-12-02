<?php

use Illuminate\Support\Facades\Route;

Route::get('/pretragaSetnji', 'App\Http\Controllers\PretragaSetnjiController@pretragaSetnji')->name('pretragaSetnji');
Route::get('/pretragaPartnera', 'App\Http\Controllers\PretragaPartneraController@pretragaPartnera')->name('pretragaPartnera');
Route::get('/zabranjenPristup', '\App\Http\Controllers\AdminController@pogresanPristup')->name('zabranjenPristup');

Route::group(["middleware" => ["omoguciPristupAutentifikovani", "omoguciPristupAdmin"]], function(){
    Route::get('/adminzahtevi', '\App\Http\Controllers\AdminController@prikaziZahteve')->name('admin_prikaziZahteve');
    Route::get('/admin_obrisizahtev/{id}', '\App\Http\Controllers\AdminController@obrisiZahtev')->name('admin_obrisiZahtev');
    Route::get('/admin_prihvatizahtev/{id}', '\App\Http\Controllers\AdminController@prihvatiZahtev')->name('admin_prihvatiZahtev');
    Route::get('/adminkorisnici', '\App\Http\Controllers\AdminController@prikaziKorisnike')->name('admin_prikaziKorisnike');
    Route::get('/admin_obrisikorisnika/{id}', '\App\Http\Controllers\AdminController@obrisiKorisnika')->name('admin_obrisiKorisnika');
});

Route::group(["middleware" => ["omoguciPristupAutentifikovani", "omoguciPristupVlasnik"]], function(){
    Route::get('/mojeSetnjeVlasnik', 'App\Http\Controllers\MojeSetnjeVlasnikController@mojeSetnje')->name('mojeSetnjeVlasnik');
    Route::get('/dodajLjubimca', 'App\Http\Controllers\DodajLjubimcaController@dodajLjubimca')->name('dodajLjubimca');
    Route::post('/dodajLjubimcas', 'App\Http\Controllers\DodajLjubimcaController@dodajLjubimca_submit')->name('dodajLjubimca_submit');
    Route::get('/odjaviSetnjuVlasnika/{idZahteva}', 'App\Http\Controllers\MojeSetnjeVlasnikController@odjaviSetnjuVlasnika')->name('odjaviSetnjuVlasnika');
    Route::get('/ukloniLjubimca/{id}', 'App\Http\Controllers\ProfilController@ukloniLjubimca')->name('ukloniLjubimca');
    Route::get('/zahteviZaParenje', 'App\Http\Controllers\ZahteviZaParenjeController@izlistajZahteve')->name('zahteviZaParenje');
    Route::get('/prihvatiZahtevParenje/{id}', 'App\Http\Controllers\ZahteviZaParenjeController@prihvatiZahtev')->name('prihvatiZahtevParenje');
    Route::get('/odbiZahtevParenje/{id}', 'App\Http\Controllers\ZahteviZaParenjeController@odbiZahtev')->name('odbiZahtevParenje');
    Route::get('/izabriSvogLjubimcaZaParenje/{partner}', 'App\Http\Controllers\ZahteviZaParenjeController@izabriSvogLjubimcaZaParenje')->name('izabriSvogLjubimcaZaParenje');
    Route::get('/izabriSvogLjubimcaZaSetnju/{setnja}', 'App\Http\Controllers\ZahteviZaSetnjeController@izabriSvogLjubimcaZaSetnju')->name('izabriSvogLjubimcaZaSetnju');
    Route::get('/posaljiZahtevZaParenje/{salje}/{prima}', 'App\Http\Controllers\ZahteviZaParenjeController@posaljiZahtevZaParenje')->name('posaljiZahtevZaParenje');
    Route::get('/posaljiZahtevZaSetnju/{salje}/{prima}', 'App\Http\Controllers\ZahteviZaSetnjeController@posaljiZahtevZaSetnju')->name('posaljiZahtevZaSetnju');
});

Route::group(["middleware" => [ "omoguciPristupAutentifikovani", "omoguciPristupSeatc"]], function(){
    Route::get('/mojeSetnjeSetac', 'App\Http\Controllers\MojeSetnjeSetacController@mojeSetnje')->name('mojeSetnjeSetac');
    Route::get('/zahteviZaSetnju', 'App\Http\Controllers\ZahteviZaSetnjeController@izlistajZahteve')->name('zahteviZaSetnju');
    Route::get('/prihvatiZahtev{id}', 'App\Http\Controllers\ZahteviZaSetnjeController@prihvatiZahtev')->name('prihvatiZahtev');
    Route::get('/odbiZahtev{id}', 'App\Http\Controllers\ZahteviZaSetnjeController@odbiZahtev')->name('odbiZahtev');
    Route::get('/dodajSetnju', 'App\Http\Controllers\DodajSetnjuController@dodajSetnju')->name('dodajSetnju');
    Route::get('/odjaviSetnju/{idSetnja}', 'App\Http\Controllers\MojeSetnjeSetacController@odjaviSetnju')->name('odjaviSetnju');
});

Route::group(["middleware" => [ "omoguciPristupAutentifikovani", "omoguciPristupVlasnikSeatc"]], function(){
    Route::get('/prikaziFormuZaAzuriranje', 'App\Http\Controllers\azuriranjeController@prikaziFormuZaAzuriranje')->name('prikaziFormuZaAzuriranje');
    Route::post('/azurirajProfil', 'App\Http\Controllers\azuriranjeController@azurirajProfil')->name('azurirajProfil');
    Route::post('/pogledajOcenu', 'App\Http\Controllers\OceniKorisnikaController@pogledajOcenu')->name('pogledajOcenu');
    Route::get('/dodajOcenu/{idK}', 'App\Http\Controllers\OceniKorisnikaController@dodajOcenu')->name('dodajOcenu');    
});

Route::group(["middleware" => [ "omoguciPristupNeAutentifikovani"]], function(){
    Route::get('/', 'App\Http\Controllers\PocetnaController@index')->name('index');
    Route::get('/login','App\Http\Controllers\LogInController@login')->name('login');
    Route::post('/logins','App\Http\Controllers\LogInController@login_submit')->name('login_submit');
    Route::get('/registracija', '\App\Http\Controllers\RegistracijaController@registracija')->name('registracija');
    Route::post('/registracijas', '\App\Http\Controllers\RegistracijaController@registracija_submit')->name('registracija_submit');
});

Route::group(["middleware" => [ "omoguciPristupAutentifikovani"]], function(){
    Route::get('/profil', 'App\Http\Controllers\ProfilController@profil')->name('profil');
    Route::get('/profilId/{idK}', 'App\Http\Controllers\ProfilController@profilId')->name('profilId');
    Route::get('/logout', '\App\Http\Controllers\LogInController@logout')->name('logout');
    Route::get('pogledajOcene/{id}', 'App\Http\Controllers\OceniKorisnikaController@pogledajOcene')->name('pogledajOcene');
});

