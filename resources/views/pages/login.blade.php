<!doctype html>
<html lang="it" data-bs-theme="auto">
<head>
    @include('partials.head', ['pageTitle'=>'Login', 'metaTitle'=>'Login'])

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Lovicu Pasquale">

    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Favicons -->

    <meta name="theme-color" content="#712cf9">


</head>


<body style="background-color: #a3a3a3 ">

<div class=" card  d-flex mx-auto px-3 py-1 " style="font-size: small; width: 40rem; position: relative; top:1rem; border-radius: 15px; box-shadow: 10px 10px rgba(0, 0, 0, 0.19)">
    <div class=" mx-auto">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png/190px-CoA_mil_ITA_airmobile_bde_Friuli.png" alt="" width="50" height="55">
</div>
        <div class="font-sans py-1" style ="text-align: center">
            <p><h4>BRIGATA AEROMOBILE FRIULI</h4></p>
            <p>Gestione Contabile Amminstrativa</p>
        </div>
    <form action="{{ route('loginUser') }}" method="post">
        @csrf


        <div class="form-floating py-3" >
            <input type="email" class="form-control" id="floatingInput" name="email" value="{{ old('email') }}" placeholder="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating py-3">
            <input type="password" class="form-control" id="Password" name ="password" value="{{ old('password') }}" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating py-3">

            <select class="form-select" id="reparto" name ="reparto" >
                <option ></option>
                @foreach($reparti as $r)
                    <option>{{$r->idreparto}} - {{$r->reparto}}</option>
                @endforeach </select>
            </select>
            <label for="reparto">Reparto</label>
        </div>
        @if($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session ('success')}}
            </div>
        @endif

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-1" type="submit">Entra</button>
        <div>

            <p class="mb-0 text-center">Non hai accesso? <a href="/register" class="text-blue-50 fw-bold">Registrati</a>
            </p>
        </div>
        <p class=" text-center">&copy; 2025</p>
    </form>
</div>
</div>

</body>
</html>
