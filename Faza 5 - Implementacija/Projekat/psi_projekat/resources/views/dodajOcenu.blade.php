@extends('template_defined')

@section('content')
<form action="{{route('pogledajOcenu')}}" method="POST">
    @csrf
    <div class="container"> 
        <div class="row text-center" style="padding-top: 50px; justify-content: space-around;">
            <table class="table table-dark table-striped " id="tabela"  style="width: 400px; ">
                <tr>
                    <th colspan="2">
                        <h5 class="text-center">Ocenite korisnika {{$korisnik->ime}} {{$korisnik->prezime}}</h5>
                    </th>
                </tr>
                <tr>
                    <th>Ocena:</th>
                    <td>
                        <select style="width: 250px" name="ocena">
                            <option selected value="">Izaberite ocenu</option>
                            <option {{ old('ocena') == 5 ? "selected" : "" }} value="5">5</option>
                            <option {{ old('ocena') == 4 ? "selected" : "" }} value="4">4</option>
                            <option {{ old('ocena') == 3 ? "selected" : "" }} value="3">3</option>
                            <option {{ old('ocena') == 2 ? "selected" : "" }} value="2">2</option>
                            <option {{ old('ocena') == 1 ? "selected" : "" }} value="1">1</option>
                        </select>
                        <input type="hidden" name="idKome" value="{{$korisnik->idK}}">
                    </td>
                </tr>
                <tr>
                    <th>Opis:</th>
                    <td>
                        <textarea name="opis" rows = "5" cols = "50"  @if(old('opis') != "") value={{old('opis')}} @endif placeholder="Opisite korisnika {{$korisnik->ime}}"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="submit" value="Oceni" class="btn"  style="background-color: rgb(251, 197, 153); width: 100px;">
                    </td>
                </tr>
            </table>    
        </div>
    </div>
</form>

@endsection