@extends('template_defined')

@section('content')

<div class="align-items-center center-div"  style="margin: 0 20% 0 20%;">
    <div class=" align-items-center" style="margin: 2%;">
        @foreach ($slede as $setac)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/storage/slike/{{$setac->slika}}" class="img-fluid rounded-start img-in-card">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$setac->imeSetac}} {{$setac->prezimeSetac}}</h5>
                        <p class="card-text">
                            Datum: {{$setac->datum}} <br>
                            Od: {{$setac->vremeOd}} <br>
                            Do: {{$setac->vremeDo}} <br>
                            Lokacija: {{$setac->deoGrada}}<br>
                        </p>
                    </div>
                    <a href="{{ route('odjaviSetnjuVlasnika', $setac->idZahteva) }}">
                        <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">
                            Odjavi</button>
                    </a>
                </div>
            </div>
        </div>  
        @endforeach
        @foreach ($prosle as $setac)
        <div class="card mb-3" id="zatamljeno">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/storage/slike/{{$setac->slika}}" class="img-fluid rounded-start img-in-card" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$setac->imeSetac}} {{$setac->prezimeSetac}}</h5>
                        <p class="card-text">
                            Datum: {{$setac->datum}} <br>
                            Od: {{$setac->vremeOd}} <br>
                            Do: {{$setac->vremeDo}} <br>
                            Lokacija: {{$setac->deoGrada}}<br>
                        </p>
                    </div>
                    <a href="{{ route('dodajOcenu', $setac->idK) }}">
                        <button type="button" class="btn" style="margin-left: 2.5%; background-color: rgb(251, 197, 153);" onclick="">
                            Oceni</button>
                    </a>
                </div>
            </div>
        </div>  
        @endforeach
        @if (count($slede)==0 && count($prosle)==0)
        <div class="d-flex justify-content-center">
            <div class="alert alert-light" role="alert">
              <h5>Još uvek nemate ni jednu šetnju</h5>
            </div>
          </div>
        @endif
    </div>
</div>

@endsection