<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'Login', 'metaTitle'=>'Login'])
<body>

<div class ="mt-5" >
<form  ">
@csrf

<section class="vh-100 gradient-custom">
    <div class="container py-4 h-60">
        <div class="row d-flex justify-content-center align-items-center h-40">
            <div class="col-12 col-md-8 col-lg-6 col-md-4">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-md-5 mt-md-3 pb-4">

                            <p class="text-white-50 mb-5">Registrazione Reparti </p>
                             <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="number" id="idreparto" class="form-control form-control-lg text-center"  name ="idreparto"   >
                                <label class="form-label" for="password" >Codice Reparto</label>
                             </div>
                             <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="text" id="nome_reparto" class="form-control form-control-lg" name="nome_reparto" value="{{ old('nome_reparto')}}" >
                                <label class="form-label" for="nome_reparto">Denominazione</label>
                             </div>
                             <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="text" id="regione" class="form-control form-control-lg" name="regione" value="{{ old('regione')}}" >
                                <label class="form-label" for="regione">Regione</label>
                             </div>
                             <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input type="text" id="citta" class="form-control form-control-lg" name="citta" value="{{ old('citta')}}" >
                                <label class="form-label" for="regione">Città</label>
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

                             <button class="btn btn-primary" type="submit">Salva</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Chiudi</button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

</form>
</div>

</body>
</html>
