@extends('template_defined')

    @section('content')

    <div class=" align-items-center center-div">
            
        <div class="container bootstrap snippets bootdey">
        <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src={{ asset('slike/admin.jpeg')}}>
                    </a>
                    <h1>{{$korisnik->ime}} {{$korisnik->prezime}}</h1>
                    <p>{{$korisnik->email}}</p>
                </div>

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
                            <p><span>Email: </span>{{$korisnik->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

@section('footer')
<footer>
    <p>Copyright 2022, Ana Radovanović, Jovana Jaćimović i Nastasija Avramović, Odsek za softversko inženjerstvo Elektrotehničkog fakulteta Univerziteta u Beogradu</p>
</footer>
@endsection