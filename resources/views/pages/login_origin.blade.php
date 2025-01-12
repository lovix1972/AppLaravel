<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'Login', 'metaTitle'=>'Login'])
<body>

<div class ="mt-5" >
<form action="{{ route('loginUser') }}" method="post">
@csrf

<section class="vh-100 gradient-custom">
    <div class="container py-4 h-60">

        <div class="row d-flex justify-content-center align-items-center h-40">
            <div class="col-12 col-md-8 col-lg-6 col-md-4">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">

                    <div class="card-body p-4 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Inserire credenziali di accesso </p>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email')}}" >
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="password" id="password" class="form-control form-control-lg"  name ="password"   >
                                <label class="form-label" for="password" >Password</label>
                            </div>
                            <div class="form-outline form-white mb-4">

                                <select class="form-select form-control form-control-lg" aria-label="Default select example" name ="reparto">
                                   <option></option>
                                    @foreach($reparti as $r)
                                        <option>{{$r->idreparto}} - {{$r->reparto}}</option>
                                        @endforeach </select>
                                </select>
                                <label class="form-label" for="reparto">Reparto</label>
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
                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Password dimenticata?</a></p>

                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>



                        </div>

                        <div>

                            <p class="mb-0">Non hai accesso? <a href="/register" class="text-white-50 fw-bold">Registrati</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</section>
</form>
</body>
</html>
