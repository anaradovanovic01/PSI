@extends('template_defined')

@section('content')

<div class=" align-items-center center-div">
        
<div class="container bootstrap snippets bootdey">
<div class="row">
    <div class="profile-nav col-md-3">
        <div class="panel">
            <div class="user-heading round">
                <a href="#">
                    <img src="/storage/slike/{{$vlasnik->slika}}">
                </a>
                <h1>{{$korisnik->ime}} {{$korisnik->prezime}}</h1>
                <p>{{$korisnik->email}}</p>
            </div>
            @if(auth()->user()->email==$korisnik->email)
            <ul>
                <li><a href="{{ route('prikaziFormuZaAzuriranje')}}"> <i class="fa fa-user"> Ažuriraj profil</i></a></li>
                <li><a href="{{ route('dodajLjubimca')}}"> <i class="fa fa-edit"> Dodaj ljubimca</i></a></li>
                <li><a href="{{ route('mojeSetnjeVlasnik')}}"> <i class="fa fa-calendar"> Moje šetnje</i></a></li>
                <li><a href="{{route('zahteviZaParenje')}}"> <i class="fa fa-calendar"> Moji zahtevi za parenje</i></a></li>
                <li><a href="{{ route('pretragaSetnji')}}" lang="sr"><i class="fa fa-search"> Pretaži šetnje</i></a></li>
                <li><a href="{{route('pretragaPartnera')}}"><i class="fa fa-search"> Pretraži partnera</i></a></li>
                <li><a href="{{route('pogledajOcene', $korisnik->idK)}}"> <i class="fa fa-user"> Pogledaj moje ocene</i></a></li>
            </ul>
            @else
            <ul>
                <li><a href="{{route('pogledajOcene', $korisnik->idK)}}"> <i class="fa fa-user"> Pogledaj ocene</i></a></li>
            </ul>
            @endif
        </div>
    </div>
    <div class="profile-info col-md-9">
        <div class="panel">
            <div class="panel-body bio-graph-info">
                <h1>Biografija</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Ime: </span> {{$korisnik->ime}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Prezime: </span> {{$korisnik->prezime}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Deo grada: </span>{{$deoGrada->naziv}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Godine:</span>{{$vlasnik->godine}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email: </span>{{$korisnik->email}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Mobilni: </span>{{$vlasnik->telefon}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Opis: </span>{{$vlasnik->opis}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Ocena: </span>@if($ocena!=0) {{number_format((float)$ocena, 2, '.', '')}} @else Ne postoje ocene @endif</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row" style="margin-top: 3%;">
                @foreach ($ljubimci as $ljubimac)
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;">
                                    <img src="/storage/slike/{{$ljubimac->slika}}" width="130px" height="130">
                                </div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="red">{{$ljubimac->ime}}</h4>
                                <p><span>Rasa</span>:{{$ljubimac->naziv}} </p>
                                <p><span>Godine</span>: {{$ljubimac->starost}} </p>
                                @if(auth()->user()->email==$korisnik->email)
                                <p><span><a href="{{ route('ukloniLjubimca', $ljubimac->idLjubimac)}}">
                                    <button type="button" class="btn btn-dark" onclick="ukloniLjubimca()">
                                    Ukloni
                                </button></a></span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection