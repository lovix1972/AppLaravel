<x-layouts.list-layouts>

    <div>
        <form>


        <input type="hidden" name="_token" id="_token"  value="{{csrf_token()}}">

        <main>
            <div class ="mt-5" >

                <table class="table table-light table-bordered">
                    <tr>
                        <thead class="thead-light">
                        <th>ID PDS</th>
                        <th>numPDS</th>
                        <th>Data PDS</th>
                        <th>Oggetto</th>
                        <th>Capitolo</th>
                        <th>Art</th>
                        <th>Prog</th>
                        <th>IDV</th>
                        <th>Decreto</th>
                        <th>Importo</th>
                        <th>Previsto Impegno</th>
                        <th>Impegnato</th>
                        <th>Contabilizzato</th>
                        <th><a href="/inspds"><button class="btn btn-secondary" >Inserisci PDS</button></a></th>
                    </tr>
                    @forelse($register as $reg)
                        <tr>
                            <td>{{$reg->id}} </td>
                            <td>{{$reg->numpds}} </td>
                            <td>{{$reg->datapds}} </td>
                            <td>{{$reg->oggetto}} </td>
                            <td>{{$reg->capitolo}} </td>
                            <td>{{$reg->art}} </td>
                            <td>{{$reg->prog}} </td>
                            <td>{{$reg->idv}} </td>
                            <td>{{$reg->decreto}} </td>
                            <td>{{$reg->importo}} </td>
                            <td>{{$reg->previstoimpegno}} </td>
                            <td>{{$reg->impegnato}} </td>
                            <td>{{$reg->contabilizzato}} </td>


                            <td><a href="/reglist/{{$reg['id']}}"><button class="btn btn-primary" >Modifica</button></a><td>
                                    <a href="/inspds/{{$reg['id']}}"><button class ="btn btn-danger" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                            </td>

                        </tr>

                @empty
                @endforelse
            </div>
        </main>

        </form>
    </div>

</x-layouts.list-layouts>


