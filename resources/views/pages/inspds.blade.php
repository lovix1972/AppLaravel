<x-layouts.list-layouts>

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

<div class ="card mt-3 d-flex py-4 px-4 justify-center" >
    <form class="was-validate" action="{{ route('InsertPds')}}" method="POST">
        @csrf


        <div class="mb-2" >

            <label for="idreparto">Id Reparto</label>
            <select class="form-select form-control" id="idreparto" name ="idreparto"  >
                <option></option>
                @foreach($reparti as $reparto)
                    <option value ="{{$reparto->id}}">{{$reparto->id}} - {{$reparto->reparto}}</option>
            </select>


            </div>
        <div class="mb-2">
            <label for="reparto" class ="form-label">Reparto</label>
            <input type="text" class="form-control" id="reparto" name="reparto" value="{{ old('reparto') }}"" >
        </div>
        @endforeach
       <div class="mb-2">
            <label for="numpds" class ="form-label">Num PDS</label>
            <input type="text" class="form-control" id="numpds" name="numpds" value="{{ old('numpds') }}" >
        </div>
       <div class="mb-2">
            <label for="datapds" class ="form-label">Data PDS</label>
            <input type="date" class="form-control datepicker @error('datapds') is-valid @enderror" id="datapds" name="datapds" value="{{ old('datapds') }}" >
        </div>
        <div class="mb-2">
            <label for="oggetto" class ="form-label">Oggetto</label>
            <input type="text" class="form-control" id="oggetto" name="oggetto" value="{{ old('oggetto') }}" required>
        </div>
        <div class="flex-initial inline-flex" >
        <div class="mb-2">
            <label for="idcapitolo" class ="form-label">ID Capitolo</label>
            <select class="form-select form-control" id="idcapitolo" name ="idcapitolo"  >
                <option></option>
                @foreach($capitoli as $capitolo)
                    <option value="{{$capitolo->idcapitolo}}">{{$capitolo->idcapitolo}} - {{$capitolo->capitolo}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="capitolo" class ="form-label">Capitolo</label>
            <input type="number" class="form-control" id="capitolo" name="capitolo" value="{{ old('capitolo') }}" required>
        </div>
        <div class="mb-2">
            <label for="art" class ="form-label">Art</label>
            <input type="number" class="form-control" id="art" name="art" value="{{ old('art') }}" required>
        </div>
        <div class="mb-2">
            <label for="prog" class ="form-label">Prog</label>
            <input type="number" class="form-control" id="prog" name="prog" value="{{ old('prog') }}" required>
        </div>

        <div class="mb-2">
            <label for="idv" class ="form-label">IDV</label>
            <input type="number" class="form-control" id="idv" name="idv" value="{{ old('idv') }}" required>
        </div>
        <div class="mb-2">
            <label for="decreto" class ="form-label">Decreto</label>
            <input type="text" class="form-control" id="decreto" name="decreto" value="{{ old('decreto') }}" required>
        </div>
        </div>
        <div class="container col-auto d-flex justify-start">
        <div class="mb-2">
            <label for="importo" class ="form-label">Importo</label>
            <input type="number" class="form-control text-sm-right" id="importo" name="importo" value="{{ old('importo') }}" min="0" step="0.01" required placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
            <input type="number" class="form-control text-sm-right" id="previstoimpegno" name="previstoimpegno" value="{{ old('previstoimpegno') }}" min="0" step="0.01" required placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="impegnato" class ="form-label">Impegnato</label>
            <input type="number" class="form-control text-sm-right" id="impegnato" name="impegnato" value="{{ old('impegnato') }}" min="0" step="0.01"  placeholder="0,00">
        </div>
        <div class="mb-2">
            <label for="contabilizzato" class ="form-label">Contabilizzato</label>
            <input type="number" class="form-control text-sm-right" id="contabilizzato" name="contabilizzato" value="{{ old('contabilizzato') }}" min="0" step="0.01"  placeholder="0,00">
        </div>


    </div>

        <div class="mb-2">
            <label for="note" class ="form-label">Note</label>
            <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}"  placeholder="Note">
        </div>
        <div class="mb-2">
            <input type="file" class="form-control text-sm" id="doc_file" name="doc_file">
        </div>
        <button type="submit" class ="btn btn-primary">Registra</button>
        <a href="/home" class="btn"> Chiudi</a>
    </form>
</div>

</x-layouts.list-layouts>