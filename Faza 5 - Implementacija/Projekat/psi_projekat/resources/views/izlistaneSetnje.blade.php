@extends('template_defined')

@section('content')

<div class="align-items-center center-div">
    <form action="{{route('pretragaSetnji')}}" method="GET">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Od</label>
            <input type="text" class="form-control" name="vremeOd" placeholder="hh:mm" value="<?php if(!empty($request->vremeDo)) echo $request->vremeOd; ?>">
          </div>
          <div class="form-group col-md-6">
            <label>Do</label>
            <input type="text" class="form-control" name = "vremeDo" placeholder="hh:mm" value="<?php if(!empty($request->vremeDo)) echo $request->vremeDo; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Datum</label>
            <br>
            <input type="date" id="datum" name="datum" value="<?php if(!empty($request->datum)) echo $request->datum; ?>">
          </div>
          <div class="form-group col-md-6">
            <label>Deo grada</label>
            <select class="form-control" name="deoGrada">
              <option value="" <?php if($request->deoGrada == "") echo "selected"; ?>>Izaberi...</option>
              @foreach ($sviDeloviGrada as $deo)
                <option <?php if($request->deoGrada == $deo->naziv) echo "selected"; ?>>{{ $deo->naziv }}</option>
              @endforeach
            </select>
          </div>
        </div>
       <div style="text-align: center;">
        <a href="izlistaneSetnje.html">
          <button type="submit" class="btn btn-dark" name="pretragaSetnji">Pretraži</button>
        </a>
      </div>
  </form>
      <div class=" align-items-center" style="margin: 2%;">
        @if($setnje != [])
          @if(count($setnje) != 0)
            @foreach ($setnje as $setnja)
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="/storage/slike/{{$setnja->slika}}" class="img-fluid rounded-start img-in-card" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{$setnja->ime}} {{$setnja->prezime}}</h5>
                    <p class="card-text">
                      Datum: {{$setnja->datum}} <br>
                      Od: {{$setnja->vremeOd}}  <br>
                      Do: {{$setnja->vremeDo}}  <br>
                      Lokacija:{{$setnja->naziv}}<br>
                  </p>
                  </div>
                  <a href="{{route('izabriSvogLjubimcaZaSetnju',$setnja->idSetnja)}}">
                    <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">
                      Zakaži</button>
                  </a>
                  <a href="{{route('profilId', $setnja->idK)}}"><button type="button" class="btn btn-dark" style="margin-left: 2.5%;">
                    Prikaži profil
                  </button></a>
                </div>
              </div>
            </div>
          @endforeach
          @else
          <div class="d-flex justify-content-center">
            <div class="alert alert-light" role="alert">
              <h5>Ne postoje šetnje koje zadovoljavaju unete parametre</h5>
            </div>
          </div>
          @endif
        @endif
    </div>
</div>

@endsection
