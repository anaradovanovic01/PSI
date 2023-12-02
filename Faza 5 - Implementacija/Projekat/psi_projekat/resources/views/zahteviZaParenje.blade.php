@extends('template_defined')

@section('content')
<div class="align-items-center center-div" style="margin: 0 20% 0 20%;">
    <div class=" align-items-center" style="margin: 2%;">
      @if(count($zahtevi)!=0)
        @foreach ($zahtevi as $zahtev )
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/storage/slike/{{$zahtev->slika}}" class="img-fluid rounded-start img-in-card pas" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$zahtev->imeOd}}</h5>
                  <p class="card-text">
                      Za: {{$zahtev->imeZa}}<br>
                      Rasa: {{$zahtev->rasa}} <br>
                      Starost: {{$zahtev->starost}} <br>
                      Vlasnik: {{$zahtev->imeKorisnika}} <br>
                  </p>
                </div>
                <a href="{{ route('prihvatiZahtevParenje', $zahtev->id) }}">
                  <button type="button" class="btn btn-dark" style="margin-left: 2.5%;" onclick="prihvatiParenje()">
                    Prihvati</button>
                </a>
                <a href="{{ route('odbiZahtevParenje', $zahtev->id ) }}">
                    <button type="button" class="btn btn-dark" style="margin-left: 2.5%;" onclick="odbiParenje()">
                      Odbi</button>
                </a>
                <a href="{{ route('profilId', $zahtev->idK) }}">
                    <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">Pogledaj profil</button>
                </a>
              </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="d-flex justify-content-center">
          <div class="alert alert-light" role="alert">
            <h5>Nemate zahteve za parenje</h5>
          </div>
        </div>
        @endif
    </div>
</div>   
@endsection