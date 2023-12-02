<!--Ana Radovanovic 2019/0282-->
@extends('template_defined')

@section('content')

<div class="align-items-center center-div">
    <div class=" align-items-center" style="margin: 2%;">
          @if($ocene->first())
            <h2 class="text-center">Ocene korisnika {{$korisnik->ime}} {{$korisnik->prezime}}</h2>
            <h4 class="text-center">Prosečna ocena: {{number_format((float)$prosecnaOcena, 2, '.', '')}}</h4>
            @for ($i=0; $i<count($ocene); $i++)
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="/storage/slike/{{$slike[$i]}}" class="img-fluid rounded-start img-in-card" style="width:150px; height:150px;" alt="...">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <h5 class="card-title">{{$ocenjuje[$i]->ime}} {{$ocenjuje[$i]->prezime}}</h5>
                    <p class="card-text">
                        @for($j = 0; $j < $ocene[$i]->ocena; $j++) 
                            <span class="fas fa-star zvezda"></span>
                        @endfor
                        @for ($j = 0; $j < 5 - $ocene[$i]->ocena; $j++) 
                            <span class="far fa-star zvezda"></span>
                        @endfor<br>
                        {{$ocene[$i]->opis}}<br>
                  </p>
                  <a href="{{route('profilId', $ocenjuje[$i]->idK)}}"><button type="button" class="btn btn-dark">
                    Prikaži profil
                  </button></a>
                  </div>
                </div>
              </div>
            </div>
          @endfor
        @else
            <h3 class="text-center">Korisnik {{$korisnik->ime}} {{$korisnik->prezime}} nema ocene.</h3>
        @endif
    </div>
</div>

@endsection
