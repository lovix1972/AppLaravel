
<!doctype html>
<html lang="en">
@include('partials.head', ['title'=>'Lista Utenti', 'metaTitle'=>'Lista Utenti'])
<body>
@include('partials.navbar')
@if($users->isempty())
    <p> Non ci sono utenti registrati!</p>
@else

    <div class ="mt-5 border-collapse " >
    <h1>Lista Utenti</h1>

    <table class="table tab-content">


    <th>ID Utente</th>
    <th>Nome</th>
    <th>email</th>
    <th>password</th>
    <th>data creazione</th>
    <th>data update</th>
       <th><button class="btn btn-secondary" >Inserisci Utente</button></th>


    @foreach($users as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->password}} </td>
                <td>{{$user->created_at}} </td>
                <td>{{$user->updated_at}}</td>
                <td><button class="btn btn-sm btn-outline-info" >Modifica</button></td>
                <td><button class="btn btn-sm btn-danger" >Cancella</button></td>
            </tr>
        @endforeach

    </table>
</div>
@endif
</body>
</html>
