<!doctype html>
<html lang="en'>
@include('partials.head', ['pageTitle'=>'Registrazione PDS', 'metaTitle'=>'Registrazione'])
<body>
<div>
<table class="table table-light table-bordered">

@if($registers->isempty())
    <p> Non ci sono PDS registrati! <a href ="/inspds"><br><button class="btn btn-primary>"> Registra PDS  </button></a></p>
@else
    <tr>

        <thead class="thead-light">
        <th>Num PDS</th>
        <th>OGGETTO</th>

    </tr>
@foreach($registers as $register)
<tr>
  <td>  {{$register->numpds}}  </td>
  <td>  {{$register->oggetto}}  </td>
  </tr>
@endforeach
</table>
@endif
</div>
</body>
<html>

