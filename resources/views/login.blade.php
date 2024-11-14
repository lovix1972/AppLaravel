<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'Login', 'metaTitle'=>'Login'])
<body>

<div class ="mt-1" >

<form action="{{ route('loginUser') }}" method="post">
@csrf

<section class="vh-100 gradient-custom">
    <div class="container py-4 h80">

        <div class="row d-flex justify-content-center align-items-center h-80">
            <div class="col-12 col-md-8 col-lg-6 col-md-4">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">

                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Inserire credenziali di accesso login e password!</p>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email')}}" >
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="password" id="password" class="form-control form-control-lg"  name ="password"   >
                                <label class="form-label" for="password" >Password</label>
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

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg">facebook</i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2">X</i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i>google</a>
                            </div>

                        </div>

                        <div>

                            <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
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
