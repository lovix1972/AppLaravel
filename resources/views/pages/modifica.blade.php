
<x-layouts.list-layouts>


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

                       @if(is_object($register))


                    @forelse ($register as $reg)
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
                            <td>{{$reg->contabilizzato}}</td>
                            <td><button class="btn btn-primary">Edit</button></td> </tr>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm" href="{{ route('reglist') }}" >Indietro</a></td>



                            @empty
                            @endforelse

                        @endif


</x-layouts.list-layouts>





