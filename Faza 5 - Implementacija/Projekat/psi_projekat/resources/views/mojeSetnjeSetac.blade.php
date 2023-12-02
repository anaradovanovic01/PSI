@extends('template_defined')

@section('content')
<div class="align-items-center center-div" style="margin: 0 15% 0 15%;">
    <div class=" align-items-center" style="margin: 2%;">
        @for($i=0; $i < count($slede) ; $i++)
        <div class="card mb-3  mb-3 mt-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <div class="card-body">
                        <p class="card-text">
                            Datum:{{ $slede[$i]->datum }} <br>
                            Od: {{$slede[$i]->vremeOd }}<br>
                            Do:{{ $slede[$i]->vremeDo }}<br>
                            Lokacija:{{ $slede[$i]->deoGrada }} <br>
                        </p>
                        <a href="{{ route('odjaviSetnju', $slede[$i]->idSetnja ) }}">
                            <button type="button" class="btn btn-dark align-items-center" style="margin-left: 2.5%;">Odjavi</button>
                        </a>
                    </div>
                </div>
                @for($j=0; $j < count($ljubimciSlede[$i]) ; $j++)
                <div class="col-md-3 mb-3 mt-3" >
                    <div class="row justify-content-center mr-2">
                        <img src="/storage/slike/{{$ljubimciSlede[$i][$j]->slika}}" class="img-fluid rounded-start rounded" id="slike-u-moje-setnje" alt="..." style="margin:3%">
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('profilId', $ljubimciSlede[$i][$j]->idVlasnika) }}"><button type="button" class="btn" style="background-color: rgb(251, 197, 153);">Profil</button></a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        @endfor
        @for($i=0; $i < count($prosle) ; $i++)
        <div class="card mb-3  mb-3 mt-3" id="zatamljeno">
            <div class="row g-0">
                <div class="col-md-3">
                    <div class="card-body">
                        <p class="card-text">
                            Datum: {{$prosle[$i]->datum }}<br>
                            Od: {{$prosle[$i]->vremeOd}} <br>
                            Do: {{$prosle[$i]->vremeDo}} <br>
                            Lokacija: {{$prosle[$i]->deoGrada}} <br>
                        </p>
                    </div>
                </div>
                @for($j=0; $j < count($ljubimciProsli[$i]) ; $j++)
                <div class="col-md-3 mb-3 mt-3" >
                    <div class="row justify-content-center mr-2">
                        <img src="/storage/slike/{{$ljubimciProsli[$i][$j]->slika}}" class="img-fluid rounded-start rounded" id="slike-u-moje-setnje" alt="..." style="margin:3%">
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('dodajOcenu', $ljubimciProsli[$i][$j]->idVlasnika) }}"><button type="button" class="btn" style="background-color: rgb(251, 197, 153);">Oceni vlasnika</button></a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        @endfor
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