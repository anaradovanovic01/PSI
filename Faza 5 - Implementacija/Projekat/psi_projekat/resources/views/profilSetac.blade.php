@extends('template_defined')

@section('content')

    <div class=" align-items-center center-div">
        
        <div class="container bootstrap snippets bootdey">
        <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="/storage/slike/{{$setac->slika}}">
                    </a>
                    <h1>{{$korisnik->ime}} {{$korisnik->prezime}}</h1>
                    <p>{{$korisnik->email}}</p>
                </div>
                @if(auth()->user()->email==$korisnik->email)
                <ul>
                    <li><a href="{{ route('prikaziFormuZaAzuriranje')}}"> <i class="fa fa-user"> Ažuriraj profil</i></a></li>
                    <li><a href="{{route('dodajSetnju')}}"> <i class="fa fa-edit"> Postavi šetnju</i></a></li>
                    <li><a href="{{route('mojeSetnjeSetac')}}"> <i class="fa fa-calendar"> Moje šetnje </i></a></li>
                    <li><a href="{{route('zahteviZaSetnju')}}"> <i class="fa fa-calendar"> Zahtevi za moje šetnje</i></a></li>
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
                            <p><span>Ime: </span>{{$korisnik->ime}} </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Prezime: </span> {{$korisnik->prezime}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Deo grada: </span> {{$deoGrada->naziv}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Godine:</span> {{$setac->godine}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Email: </span>{{$korisnik->email}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Mobilni: </span>{{$setac->telefon}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Opis: </span>{{$setac->opis}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Ocena: </span>@if($ocena!=0) {{number_format((float)$ocena, 2, '.', '')}} @else Ne postoje ocene @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>

@endsection