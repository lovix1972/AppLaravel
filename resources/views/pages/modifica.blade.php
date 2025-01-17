<x-layouts.list-layouts>


    <div>
        <div class ="mt-0 d-flex py-0" >

            <table class="table table-light table-bordered">
                <tr>
                    <th>
                        @if($register->isempty())
                            <h4 class="d-flex font-bold mx-auto"> Non ci sono PDS registrati! <a href ="/inspds"><br><button class="btn btn-primary>"> Registra PDS  </button></a></h4></th>
                </tr>
                @else
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
                            <td class="importi" style="text-align: right">{{$reg->importo}} </td>
                            <td class="importi" style="text-align: right">{{$reg->previstoimpegno}} </td>
                            <td class="importi" style="text-align: right">{{$reg->impegnato}} </td>
                            <td class="importi" style="text-align: right">{{$reg->contabilizzato}} </td>

                            <td><a href="{{ route('reglist.show', $register) }}"> <button type="button" class="btn btn-primary btn-sm" id="modal" data-bs-toggle="modal" data-bs-target="Modal">
                                        Modifica
                                    </button></a>
                                <form>
                                    <input type="hidden" name="_token" id="_token"  value="{{csrf_token()}}"><td>
                                        <a href="/inspds/{{$reg->id}}"><button class ="btn btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                                    </td>
                                </form></tr>

@empty
@endforelse