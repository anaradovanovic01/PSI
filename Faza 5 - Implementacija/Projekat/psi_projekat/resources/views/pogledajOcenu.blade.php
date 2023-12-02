@extends('template_defined')

@section('content')
<div class="align-items-center center-div">
    <div class=" align-items-center" style="margin: 2%;">
        <div class="card mb-3">
            <div class="row g-0">
                    <div class="card-body" align="center">
                        <h5 class="card-title">Dali ste ocenu korisniku {{$ocenjen->ime}} {{$ocenjen->prezime}}</h5>
                        <div class="col-md-6">
                            <p>
                                @for($i = 0; $i < $request->ocena; $i++) 
                                    <span class="fas fa-star fa-3x zvezda"></span>
                                @endfor
                                @for ($i = 0; $i < 5 - $request->ocena; $i++) 
                                    <span class="far fa-star fa-3x zvezda"></span>
                                @endfor
                            </p>
                            <p>
                                <b>Opis:&nbsp;</b>{{$request->opis}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <a href="{{ route('profilId', $ocenjen->idK) }}"><button type="button" class="btn btn-dark">Vidi profil</button></a>
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection