<x-layouts.list-layouts>
    <div>
        @if(session('success'))
            <div class="alert alert-success mb-0 ">{{ session ('success')}}</div></td>
        @endif
            <div class ="mt-0 d-flex py-0" >

                <table class="table table-hover table-bordered ">

                       @if($register->isempty())

                        <h4 class="d-flex font-bold mx-auto"> Non ci sono PDS registrati! <a href ="/inspds"><br><button class="btn btn-primary>"> Registra PDS  </button></a></h4>
                         @else
                        <thead>
                        <tr>
                        <thead class="thead-light">

                        <th>ID PDS</th>
                        <th>ID Reparto</th>
                        <th>Reparto</th>
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

                        <th colspan="2" ><a href="/inspds"><button class="btn btn-secondary btn-sm " >Acquisisci</button></a></th></tr>
                        </thead>
                        <tbody>


                            @foreach($register as $reg)

                            <tr>
                            <td>{{$reg->id}} </td>
                            <td>{{$reg->idreparto}} </td>
                            <td>{{$reg->reparto}} </td>
                            <td>{{$reg->numpds}} </td>
                            <td>{{$reg->datapds}} </td>
                            <td>{{$reg->oggetto}} </td>
                            <td>{{$reg->capitolo}} </td>
                            <td>{{$reg->art}} </td>
                            <td>{{$reg->prog}} </td>
                            <td>{{$reg->idv}} </td>
                            <td>{{$reg->decreto}} </td>
                            <td class="importi text-right">{{$reg->importo}} </td>
                            <td class="importi text-right">{{$reg->previstoimpegno}} </td>
                            <td class="importi text-right">{{$reg->impegnato}} </td>
                            <td class="importi text-right">{{$reg->contabilizzato}} </td>
                            <td><input type="button" onclick=window.location.href="/modifica/{{$reg->id}}" class="btn-primary btn-sm" value="Modifica" ></td>
                            <form>
                            <input type="hidden" name="_token" id="_token"  value="{{csrf_token()}}">
                                <td> <a href="/inspds/{{$reg->id}}"><button class ="btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>

                            </form>

                            </tr>
                        </tbody>

                @endforeach
                @endif

            </div>


        <td colspan="11">

        <td class="importi text-right">{{ number_format($register->sum('importo'),2,',','.')}}</td>
        <td class="importi text-right">{{ number_format($register->sum('previstoimpegno'),2,',','.')}}</td>
        <td class="importi text-right">{{number_format($register->sum('impegnato'),2,',','.')}}</td>
        <td class="importi text-right">{{number_format($register->sum('contabilizzato'),2,',','.')}}</td>


    </div>



    <script>
        $(document).ready(function () {

            $('td').on('click',  'a','button.btn-danger', function (evt) {

                evt.preventDefault();
                let urlAlbum = $(this).attr('href');
                console.log(this);

                let td = evt.target.parentNode;
                //console.log(td)
                $.ajax(
                    urlAlbum,
                    {

                    method: 'delete',

                    data: {
                        '_token' : $('#_token').val()
                    },

                    complete: function (resp, status) {
                        if (status !== 'error' && Number(resp.responseText) === 1) {
                            $('td').remove();

                            //td.parentNode.removeChild(td);
                            alert('Record ' + resp.responseText + ' deleted ')
                        } else {
                            console.error(resp.responseText);

                        }
                        location.reload();
                    }
                });
            });
        });

    </script>

</x-layouts.list-layouts>


