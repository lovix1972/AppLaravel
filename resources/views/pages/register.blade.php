<!doctype html>
<html lang="en">

@include('partials.head', ['pageTitle'=>'Registrazione Utenti', 'metaTitle'=>'Registrazione'])
@include('partials.navbar')
<body style="background-color: #a3a3a3 ">

<div class="card mt-3 d-flex mx-auto px-3 py-3 w-50 " style="position:relative; top: 3rem ; box-shadow: 10px 10px rgba(0, 0, 0, 0.19)">
    <div class="mb-0 font-sans font-bold  pb-3 ">
        <p>Registrazione</p>
    </div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session ('success')}}
    </div>
    @endif

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registerUser')}}" method="POST">
        @csrf
        <div class="mb-3 ">
            <label for="name" class ="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class ="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class ="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
        </div>
        <div class="mb-3">
            <label for="password-confirmation" class ="form-label">Conferma Password</label>
            <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" value="{{ old('password-confirmation') }}" required>
        </div>
        <div class="mb-3">
            <label for="reparto">Reparto</label>
            <select class="form-select form-control" id="reparto" name ="reparto"  required>
                <option></option>
                @foreach($reparti as $r)
                    <option>{{$r->idreparto}} - {{$r->reparto}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class ="btn btn-primary">Registrati</button>
        <a href="/home" class="btn"> Chiudi</a>
    </form>

</div>
</body>
</html>
