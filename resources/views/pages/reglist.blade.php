<x-layouts.list-layouts>

    <div>


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
<th>                   <a href="/inspds"><button class="btn btn-secondary btn-sm" >Acquisisci</button></a></th> </tr>
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


                            <td><a href="/reglist/{{$reg->id}}"><button class="btn btn-primary btn-sm" >Modifica</button></a>
                                <form>
                                    <input type="hidden" name="_token" id="_token"  value="{{csrf_token()}}">
                            <td><a href="/inspds/{{$reg->id}}"><button class ="btn btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                            </td>
                                </form>

                        </tr>

                @empty
                @endforelse
            </div>



    </div>
    <script>
        $(document).ready(function () {
            $('td').on('click',  'a','button-danger', function (evt) {

                evt.preventDefault();
                let urlAlbum = $(this).attr('href');
                console.log(this);

                let td = evt.target.parentNode;
console.log(td)
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
                              //location.reload();
                            //td.parentNode.removeChild(td);
                            alert('Record ' + resp.responseText + ' deleted ')
                        } else {
                            console.error(resp.responseText);

                        }

                    }
                });
            });
        });

    </script>
</x-layouts.list-layouts>


