@extends('template_defined')

@section('content')

<div class="row text-center" style="padding-top: 50px; justify-content: space-around;">
    <form action="{{route('dodajLjubimca_submit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-dark table-striped " id="tabela" style="width: 350px;">
            <tr>
                <th>Ime:</th>
                <td>
                    <input type="text" name="ime" value={{old('ime')}} >
                </td>
            </tr>
            @error('ime')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
            <tr>
                <th>Godine:</th>
                <td>
                    <input type="text" name="godine" value={{old('godine')}}>
                </td>
            </tr>
            @error('godine')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
            <tr>
                <th>Pol:</th>
                <td>
                    <input type="radio" name="pol" checked value="0" >Muski
                    <input type="radio" name="pol" value="1" > Ženski
                </td>
            </tr>
            <tr>
                <th>Mini biografija:</th>
                <td>
                    <textarea rows = "5" cols = "23" name="opis" ></textarea>
                </td>
            </tr>
            @error('opis')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
            <tr>
                <th>Rasa:</th>
                <td>
                    <select class="form-control" name="rasa">
                        @foreach ($sveRase as $rasa)
                          <option>{{ $rasa->naziv }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2">Želi da nađe partnera?<input type="checkbox" name="parenje" style="width: 30px"></th>
            </tr>
            <tr>
                <th>Slika</th>
                <td>
                    <input type="file" name="slika" accept="image/png/jpg">
                </td>
            </tr>
            @error('slika')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" class="btn" name="dodajSetnju" style="background-color: rgb(251, 197, 153);" >
                        Dodaj
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection