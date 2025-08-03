
<x-layouts.list-layouts>

    @include('partials.head', ['pageTitle'=>'Lista Utenti', 'metaTitle'=>'Lista Utenti'])

<body>

    <div class ="mt-5" >
            <table class="table table-light table-bordered">

            @if($users->isempty())
                <p> Non ci sono utenti registrati! <a href ="/register"><br><button class="btn btn-primary>"> Registra Utente  </button></a></p>
            @else
                <tr>


            <thead class="thead-light">
            <th>ID Utente</th>
            <th>Nome</th>
            <th>email</th>
            <th>password</th>
            <th>data creazione</th>
            <th>data update</th>
            <th><a href="/register"><button class="btn btn-secondary" >Inserisci Utente</button></a></th>
            </tr>

    @foreach($users as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->password}} </td>
                <td>{{$user->created_at}} </td>
                <td>{{$user->updated_at}}</td>
                <td><button class="btn btn-primary" >Modifica</button>
                <a href="utenti/{{$user['id']}}"><button class ="btn btn-danger" title="delete" data-toggle="tooltip">Delete</button></a></td>

            </tr>

        @endforeach
            <td>Record: {{$user->count()}}</td>
    </table>

</div>
@endif

</x-layouts.list-layouts>