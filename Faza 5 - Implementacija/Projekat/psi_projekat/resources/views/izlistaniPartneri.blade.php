<!--Ana Radovanovic 2019/0282-->
@extends('template_defined')

@section('content')

<div class="align-items-center center-div">
    <form action="{{route('pretragaPartnera')}}" method="GET">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Minimalan broj godina</label>
            <input type="text" class="form-control" name="godineOd" placeholder="Od" value="<?php if(!empty($request->godineDo)) echo $request->godineOd; ?>">
          </div>
          <div class="form-group col-md-6">
            <label>Maksimalan broj godina</label>
            <input type="text" class="form-control" name = "godineDo" placeholder="Do" value="<?php if(!empty($request->godineDo)) echo $request->godineDo; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Pol</label>
                <br>
                <input type="radio" name="pol" value="0" <?php if($request->pol == "0") echo "checked"; ?>>Muski
                <input type="radio" name="pol" value="1" <?php if($request->pol == "1") echo "checked"; ?>> Ženski
          </div>
          <div class="form-group col-md-6">
            <label>Rasa</label>
            <select class="form-control" name="rasa">
              <option value="" <?php if($request->rasa == "") echo "selected"; ?>>Izaberi...</option>
              @foreach ($sveRase as $rasa)
                <option <?php if($request->rasa == $rasa->naziv) echo "selected"; ?>>{{ $rasa->naziv }}</option>
              @endforeach
            </select>
          </div>
        </div>
       <div style="text-align: center;">
          <button type="submit" class="btn btn-dark" name="pretragaPartnera">Pretraži</button>
      </div>
  </form>
      <div class=" align-items-center" style="margin: 2%;">
        @if($partneri != [])
          @if(count($partneri) != 0)
            @foreach ($partneri as $partner)
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="/storage/slike/{{$partner->slika}}" class="img-fluid rounded-start img-in-card" alt="...">  
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{$partner->imeLjubimca}}</h5>
                    <p class="card-text">
                      Rasa: {{$partner->rasa}} <br>
                      Pol: <?php if($partner->polLjubimca == 1) echo "Ž"; if($partner->polLjubimca == 0) echo "M" ?><br>
                      Starost: {{$partner->starost}} <br>
                      Vlasnik: {{$partner->imeVlasnika}} <br>
                      Opis: {{$partner->opisLjubimca}}<br>
                  </p>
                  </div>
                  <a href="{{route('izabriSvogLjubimcaZaParenje',$partner->idLjubimac)}}">
                    <button type="button" class="btn btn-dark" style="margin-left: 2.5%;" >
                      Zakaži</button>
                  </a>
                  <a href="{{route('profilId',$partner->idKorisnik)}}"><button type="button" class="btn btn-dark" style="margin-left: 2.5%;">
                    Prikaži profil
                  </button></a>
                </div>
              </div>
            </div>
          @endforeach
          @else
          <div class="d-flex justify-content-center">
            <div class="alert alert-light" role="alert">
              <h5>Ne postoje partneri koji zadovoljavaju unete parametre</h5>
            </div>
          </div>
          @endif
        @endif
    </div>
</div>

@endsection
