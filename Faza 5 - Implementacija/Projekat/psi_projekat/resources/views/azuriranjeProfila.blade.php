@extends('template_defined')

@section('content')

<div class="row text-center" style="padding-top: 50px; padding-bottom: 50px; justify-content: space-around;">
    <form action="{{route('azurirajProfil')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <table class="table table-dark table-striped " id="tabela" style="width: 350px;">
            <tr>
                <th>
                    Novo ime:
                </th>
                <td>
                    <input type="text" name="ime" id="ime" placeholder="{{$korisnikOsnovno->ime}}">
                </td>
            </tr>
            <tr>
                <th>
                    Novo prezime:
                </th>
                <td>
                    <input type="text" name="prezime" id="prezime" placeholder="{{$korisnikOsnovno->prezime}}">
                </td>
            </tr>
            <tr>
                <th>
                    Novi kontakt telefon:
                </th>
                <td>
                    <input type="text" name="telefon" id="telefon" placeholder="{{$korisnik->telefon}}">
                </td>
            </tr>
            <tr>
                <th>
                    Novo prebivalište:
                </th>
                <td>
                    <select class="form-control" name="deoGrada">
                        <option> Izaberi..</option>
                        @foreach ($deloviGrada as $deo)
                          <option>{{ $deo->naziv }}</option>
                        @endforeach
                      </select>
                </td>
            </tr>
            <tr>
                <th>
                    Novi email:
                </th>
                <td>
                    <input type="email" name="email" id="email" placeholder="{{$korisnikOsnovno->email}}">
                </td>
            </tr>
            <tr>
                <th>
                    Stara lozinka:
                </th>
                <td>
                    <input type="password" name="stara" id="pass">
                </td>
            </tr>
            <tr>
                <th>
                    Nova lozinka:
                </th>
                <td>
                    <input type="password" name="nova" id="pass">
                </td>
            </tr>
            <tr>
                <th>
                    Potvrda lozinke:
                </th>
                <td>
                    <input type="password" name="potvrda" id="cpass">
                </td>
            </tr>
            <tr>
                <th>
                     Nova mini biografija:
                </th>
                <td>
                    <textarea rows = "5" cols = "23" id = "bio" name="opis" placeholder="{{$korisnik->opis}}"></textarea>
                </td>
            </tr>
            <tr>
                <th>Nova slika</th>
                <td>
                    <input type="file" id="slika" name="slika" accept="image/png, image/jpg" >
                    <script type="text/javascript">
                        function getFilePath(){
                            $('input[type=file]').change(function () {
                            console.log(this.files[0].mozFullPath);
                            });
                        }
                    </script>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="">
                        <button type="submit" class="btn" style="background-color: rgb(251, 197, 153);" name="pretragaSetnji" onclick=" getFilePath()">Promeni</button>
                    </a>
                </td>
            </tr>
        </table>
    </div>  
    </form>       
</div>


@endsection