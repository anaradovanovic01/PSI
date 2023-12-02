@extends('template_defined')

@section('content')

<div class="row text-center" style="padding-top: 50px; justify-content: space-around;">
    <form action="{{route('dodajSetnju')}}" method="GET">
    <table class="table table-dark table-striped " id="tabela" style="width: 350px;">
        <tr>
            <th>
                Datum:
            </th>
            <td>
                <input type="date" id="datum" name="datum" value="<?php if(!empty($request->datum)) echo $request->datum; ?>">
            </td>
        </tr>
        <tr>
            <th>
                Od:
            </th>
            <td>
                <input type="text" name="vremeOd" placeholder="hh:mm" value="<?php if(!empty($request->vremeOd)) echo $request->vremeOd; ?>">
            </td>
        </tr>
        <tr>
            <th>
                Do:
            </th>
            <td>
                <input type="text" name="vremeDo" placeholder="hh:mm" value="<?php if(!empty($request->vremeDo)) echo $request->vremeDo; ?>">
            </td>
        </tr>
        <tr>
            <th>
                Cena:
            </th>
            <td>
                <input type="text" name="cena" placeholder="Cena" value="<?php if(!empty($request->cena)) echo $request->cena; ?>">
            </td>
        </tr>
        <tr>
            <th>
                Deo grada:
            </th>
            <td>
                <select name="deoGrada" class="form-control">
                    <option value="" <?php if($request->deoGrada == "") echo "selected"; ?>>Izaberi...</option>
                    @foreach ($sviDeloviGrada as $deo)
                        <option <?php if($request->deoGrada == $deo->naziv) echo "selected"; ?>>{{ $deo->naziv }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn" name="dodajSetnju" style="background-color: rgb(251, 197, 153);" onclick="alert('Šetnja je uspesno zakazana')">
                    <!--swal({icon: 'success', allowOutsideClick: false, text: 'Šetnja je uspesno zakazana'});-->
                    Zakazi
                </button>
            </td>
        </tr>
    </table>
    </form>
</div>         
@endsection
