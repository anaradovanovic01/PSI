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
                    <th class="text-center">Šetač/Vlasnik</th>
                    <th class="text-center">Profil</th>
                    <th class="text-center">Prihvati/Odbi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zahtevi as $zahtev)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$zahtev->ime}}</td>
                    <td>{{$zahtev->prezime}}</td>
                    <td style="text-align: center">
                        @if ($zahtev->vrsta==1)
                            Vlasnik
                        @endif
                        @if ($zahtev->vrsta==2)
                            Šetač
                        @endif
                    </td>
                    <td class="korisnik">
                        <a href="{{route('profilId',[$zahtev->idK])}}">Vidi profil</a>
                    </td>
                    <td style="text-align: center">
                      <a href="{{route('admin_prihvatiZahtev',[$zahtev->idK])}}" class="btn bg-success"style="font-weight:bold">Prihvati</a>
                      <a href="{{route('admin_obrisiZahtev',[$zahtev->idK])}}" class="btn bg-danger" style="font-weight:bold">Odbi</a>
                    </td>
                </tr>
                @endforeach
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