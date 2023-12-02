@extends('template_defined')

@section('content')
<div class="container align-items-center">
    <div class=" d-flex justify-content-center" style="margin-top: 3%;" >
        <table class="table table-striped table-dark" style="width: 70%">
            <thead>
                <tr>
                    <th scope="col">RB</th>
                    <th class="text-center">Ime</th>
                    <th class="text-center">Prezime</th>
                    <th class="text-center">Profil</th>
                    <th class="text-center">Blokiraj</th>
                </tr>
            </thead>
            <tbody>
                @if($zahtevi!=[])
                @foreach($zahtevi as $zahtev)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$zahtev->ime}}</td>
                    <td>{{$zahtev->prezime}}</td>
                    <td class="korisnik">
                        <a href="{{route('profilId',[$zahtev->idK])}}">Vidi profil</a>
                    </td>
                    <td style="text-align: center">
                      <a href="{{route('admin_obrisiKorisnika',[$zahtev->idK])}}" class="btn bg-danger" style="font-weight:bold">Blokiraj</a>
                    </td>
                </tr>
                @endforeach
                @else
                <div class="d-flex justify-content-center">
                    <div class="alert alert-light" role="alert">
                      <h5>Korisnici ne postoje</h5>
                    </div>
                  </div>  
                @endif
            </tbody>
        </table>   
    </div>
</div>
@endsection

@section('footer')
<footer>
    <p>Copyright 2022, Ana Radovanović, Jovana Jaćimović i Nastasija Avramović, Odsek za softversko inženjerstvo Elektrotehničkog fakulteta Univerziteta u Beogradu</p>
</footer>
@endsection