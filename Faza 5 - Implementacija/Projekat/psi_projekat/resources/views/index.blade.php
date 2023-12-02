@extends('template_defined')

@section('content')

<div class=" align-items-center center-div">
    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('slike/prosetajme.png')}}" class="img-fluid rounded-start img-in-card" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Izvedi me</h5>
              <p class="card-text">Živiš brzim tempom života? Teško ti je da uklopiš sve privatne i poslovne obaveze?
                Često se dešava da nemaš vremena da se posvetiš svom ljubimcu? Do rešenja ovih problema možeš doći jednim klikom.
                Veseli PSI nude ti opciju da u bilo koje vreme dana, bilo kom delu grada svom ljubimcu obezbediš šetnju i 
                tako olakšaš dan i sebi i njemu. 
            </p>
            </div>
            <a href="{{ route('pretragaSetnji')}}">
              <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">Zakaži šetnju</button>
            </a>
          </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('slike/setac.png') }}" class="img-fluid rounded-start img-in-card" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Prošetaj sa mnom</h5>
              <p class="card-text">Imaš višak slobodnog vremena? Voliš pse? Želiš da zaradiš džeparac? 
                  Onda je ovo idealan posao za tebe. Veseli PSI nude ti opciju da svoje slobodno vreme iskoristiš na pravi način i 
                  ulepšaš dan psima tako što ćeš ih izvesti u šetnju. 
            </p>
            </div>
            <a href="{{route('dodajSetnju')}}">
              <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">Objavi šetnju</button>
            </a>
          </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('slike/par.jpg')}}" class="img-fluid rounded-start img-in-card" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Neki novi štenci</h5>
              <p class="card-text"> Tvom ljubimcu je vreme da se ostvari u ulozi roditelja? Imaš problem sa pornalaskom partnera?
                  Veseli PSI ti nude opciju da lako i brzo pronađeš partnera za parenje za svog psa i time učestvuješ u stvaranju 
                  nove porodice.
              </p>
            </div>
            <a href="{{route('pretragaPartnera')}}">
              <button type="button" class="btn btn-dark" style="margin-left: 2.5%;">Pronađi partnera</button>
            </a>
          </div>
        </div>
      </div>
</div>


@endsection