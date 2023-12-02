@extends('template')

@section('title', 'VeseliPSI')

@section('header')
<div class="header">
    <img src='{{ asset('slike/logo.jpg')}}'>
    <h1>Veseli PSI</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-darks" style="display: flex;  justify-content: space-around;">
    @guest
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href = "{{ route('index')}}">Početna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pretragaSetnji')}}" lang="sr">Šetnja</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('pretragaPartnera')}}">Partner</a>
        </li>
    </ul>
    
    <ul class="navbar-nav">
      <li class="nav-item" >
          <a class="nav-link" href = "{{ route('login')}}" style="display: flex; justify-content: left;">Uloguj se</a>
      </li>
      <li class="nav-item" >
          <a class="nav-link" href = "{{ route('registracija')}}" style="display: flex; justify-content: left;">Registracija</a>
      </li>
    </ul>
    @endguest

    @auth
    @if(auth()->user()->vrsta == 1)
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href = "{{ route('pretragaSetnji')}}">Pretaži šetnje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href = "{{ route('pretragaPartnera')}}"> Pretaži partnera</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href = "{{ route('mojeSetnjeVlasnik')}}"> Moje šetnje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href = "{{ route('zahteviZaParenje')}}">Moji zahtevi za parenje</a>
        </li>
    </ul>
    @elseif (auth()->user()->vrsta == 2)
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href = "{{route('dodajSetnju')}}">Postavi šetnju</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href = "{{route('mojeSetnjeSetac')}}">Moje šetnje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href = "{{route('zahteviZaSetnju')}}">Zahtevi za moje šetnje</a>
        </li>
    </ul>
    @else  
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " href = "{{ route('admin_prikaziZahteve')}}">Novi zahtevi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_prikaziKorisnike')}}" lang="sr">Lista korisnika</a>
        </li>
    </ul>
    @endif
    <ul class="navbar-nav">
        <li class="nav-item" >
            <a class="nav-link" href = "{{ route('profil')}}" style="display: flex; justify-content: left;"> {{auth()->user()->ime}} {{auth()->user()->prezime}}</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" href = "{{ route('logout')}}" style="display: flex; justify-content: left;">Odjavi se</a>
        </li>
    </ul> 
    @endauth

</nav>

@section('footer')
<footer>
    <p>Copyright 2022, Ana Radovanović, Jovana Jaćimović i Nastasija Avramović, Odsek za softversko inženjerstvo Elektrotehničkog fakulteta Univerziteta u Beogradu</p>
</footer>
@endsection