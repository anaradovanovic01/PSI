@extends('template_defined')

@section('content')
<form action="{{route('registracija_submit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row text-center" style="padding-top: 50px; padding-bottom: 50px; justify-content: space-around;">
        <div >
            <table class="table table-dark table-striped " id="tabela" style="width: 350px;">
                <tr>
                    <th>Ime:</th>
                    <td>
                        <input type="text" name="ime" value={{old('ime')}}>
                    </td>
                </tr>
            @error('ime')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Prezime:</th>
                    <td>
                        <input type="text" name="prezime" value={{old('prezime')}}>
                    </td>
                </tr>
            @error('prezime')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Vlasnik/šetač:</th>
                    <td>
                        <input type="radio" name="v-s" checked value="1">Vlasnik
                        <input type="radio" name="v-s" value="2"> Šetač
                    </td>
                </tr>
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
                        <input type="radio" name="m-z" checked value="0">Muski
                        <input type="radio" name="m-z" value="1"> Ženski
                    </td>
                </tr> 
                <tr>
                    <th>Kontakt telefon:</th>
                    <td>
                        <input type="text" name="telefon" value={{old('telefon')}}>
                    </td>
                </tr>
            @error('telefon')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Deo grada</th>
                    <td>
                        <select class="form-control" name="deograda">
                            @foreach($delovi as $deo)
                                <option value="{{$deo->idDeoGrada}}">
                                    {{$deo->naziv}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <input type="email" name="email" value={{old('email')}}>
                    </td>
                </tr>
            @error('email')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Lozinka: </th>
                    <td>
                        <input type="password" name="lozinka">
                    </td>
                </tr>
            @error('lozinka')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Potvrda lozinke:</th>
                    <td>
                        <input type="password" name="plozinka">
                    </td>
                </tr>
            @error('plozinka')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Mini biografija:</th>
                    <td>
                        <textarea rows = "5" cols = "23" name= "bio" value={{old('email')}}></textarea>
                    </td>
                </tr>
            @error('bio')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <th>Slika</th>
                    <td>
                        <input type="file" name="slika" accept="image/png/jpg" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="submit" value="Registruj se" class="btn"  style="background-color: rgb(251, 197, 153); width: 100px;">
                        </div>
                    </td>
                </tr>
            </table>
        </div>         
    </div>

</form>
@endsection
