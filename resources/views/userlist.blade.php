
<!doctype html>
<html lang="en">
@include('partials.head', ['title'=>'Lista Utenti', 'metaTitle'=>'Lista Utenti'])
<body>
@include('partials.navbar')
@if($users->isempty())
    <p> Non ci sono utenti registrati!</p>
@else

    <div class ="mt-5" >
    <h1>Lista Utenti</h1>

    <table class="table table-responsive">


    <th>ID Utente</th>
    <th>Nome</th>
    <th>email</th>
    <th>password</th>
    <th>data creazione</th>
    <th>data update</th>
        <th><a href="/register"><button class="btn btn-secondary" >Inserisci Utente</button></a></th>


    @foreach($users as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->password}} </td>
                <td>{{$user->created_at}} </td>
                <td>{{$user->updated_at}}</td>
                <td><button class="btn btn-sm btn-outline-info" >Modifica</button></td>
                <td><a href="utenti/{{$user['id']}}"><button class ="btn btn-danger" title="delete" data-toggle="tooltip"></button></a>
            </tr>
        @endforeach

    </table>
</div>
@endif
</body>
</html>
