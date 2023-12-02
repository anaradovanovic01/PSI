@extends('template_defined')

@section('content')
<form action="{{route('login_submit')}}" method="POST">
    @csrf
    <div class="container"> 
        <div class="row text-center" style="padding-top: 50px; justify-content: space-around;">
            <table class="table table-dark table-striped " id="tabela" style="width: 350px; ">
                <tr>
                    <th>Email:</th>
                    <td>
                        <input type="email" name="email" value={{old('email')}} >
                    </td>
                </tr>
                @error('email')
                    <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                        {{$message}}
                    </td></tr>
                @enderror
                @if (session('status'))
                    <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                        {{session('status')}}
                    </td></tr>
                @endif
                <tr >
                    <th>Password:</th>
                    <td>
                        <input type="password" name="pass" >
                    </td>
                </tr>
                @error('pass')
                <tr><td style="color: rgb(227, 108, 108);text-align:center" colspan="2">
                    {{$message}}
                </td></tr>
            @enderror
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="submit" value="Uloguj se" class="btn"  style="background-color: rgb(251, 197, 153); width: 100px;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        Nemate nalog? <a href = "{{ route('registracija')}}" style="color:rgb(251, 197, 153)"> Registrujte se</a>
                    </td>
                </tr>
            </table>    
        </div>
    </div>
</form>
@endsection
