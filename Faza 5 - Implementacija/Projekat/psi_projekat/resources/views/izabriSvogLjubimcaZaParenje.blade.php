@extends('template_defined')

@section('content')

<div class="align-items-center center-div">
      <div class=" align-items-center" style="margin: 2%;">
           @if(count($ljubimci) != 0)
            @foreach ($ljubimci as $ljubimac)
            <div class="card mb-3" style="width: 60%">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="/storage/slike/{{$ljubimac->slika}}" class="img-fluid rounded-start img-in-card" alt="...">
                </div>
                <div class="col-md-4">
                  <div class="card-body">
                    <h5 class="card-title">{{$ljubimac->ime}}</h5>
                  </div>
                  <a href="{{route('posaljiZahtevZaParenje', [$ljubimac->idLjubimac, $partner])}}">
                    <button type="button" class="btn btn-dark" style="margin-left: 2.5%;" onclick="alert('Zahtev poslat!')">
                      Odaberi
                    </button>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
          @else
          <div class="d-flex justify-content-center">
            <div class="alert alert-light" role="alert">
              <h5>Nemate ljubimca za koga možete da zakažete parenje</h5>
            </div>
          </div>  
        @endif
    </div>
</div>

@endsection