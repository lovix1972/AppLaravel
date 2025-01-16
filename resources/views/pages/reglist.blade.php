<x-layouts.list-layouts>
    <div>
            <div class ="mt-5 d-flex py-4" >

                <table class="table table-light table-bordered ">
                   @if($register->isempty())
                        <tr><th>   <p class="text-nowrap text-md-center"> Non ci sono PDS registrati! </p></th>
                  </tr>@else
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


                        <th><a href="/inspds"><button class="btn btn-secondary btn-sm" >Acquisisci</button></a></th>

                    </tr>


                    @forelse($register as $reg)
                        <tr class="text-nowrap font-serif" style="font-size: 11px">
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


                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEdit" data-whatever="Edit">
                                    Modifica</button></a>
                                <form>
                                    <input type="hidden" name="_token" id="_token"  value="{{csrf_token()}}">
                            <td>
                                <a href="/inspds/{{$reg->id}}"><button class ="btn btn-danger btn-sm" id="btn-danger" title="delete" data-toggle="tooltip">Cancella</button></a>
                            </td>
                                </form>
                        </tr>
<!--Modale>-->
                            <!-- Large modal -->

                            <div class="modal fade"  id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" ">
                                    <div class="modal-content py-3 px-3 m-0">

                                        <div class="mb-2" >
                                            <label for="reparto">Reparto</label>
                                            <select class="form-select form-control" id="reparto" name ="reparto"  required>
                                                <option></option>

                                            </select>
                                        </div>
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

                                        <div class="mb-2">
                                            <label for="capitolo" class ="form-label">Capitolo</label>
                                            <input type="number" class="form-control" id="capitolo" name="capitolo" value="{{ old('capitolo') }}" required>
                                        </div>
                                        <div class="mb-sm-2 size-1/2">
                                            <label for="art" class ="form-label">Art</label>
                                            <input type="number" class="form-control" id="art" name="art" value="{{ old('art') }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="prog" class ="form-label">Prog</label>
                                            <input type="number" class="form-control" id="prog" name="prog" value="{{ old('prog') }}" required>
                                        </div>

                                        <div class="container col-auto d-flex align-content-between">
                                            <div class="mb-2">
                                                <label for="importo" class ="form-label">Importo</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="importo" name="importo" value="{{ old('importo') }}" min="0" step="0.01" required placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="previstoimpegno" name="previstoimpegno" value="{{ old('previstoimpegno') }}" min="0" step="0.01" required placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="impegnato" class ="form-label">Impegnato</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="impegnato" name="impegnato" value="{{ old('impegnato') }}" min="0" step="0.01"  placeholder="0,00">
                                            </div>
                                            <div class="mb-2">
                                                <label for="contabilizzato" class ="form-label">Contabilizzato</label>
                                                <input type="number" class="form-control-sm text-sm-right" id="contabilizzato" name="contabilizzato" value="{{ old('contabilizzato') }}" min="0" step="0.01"  placeholder="0,00">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="note" class ="form-label">Note</label>
                                            <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}"  placeholder="Note">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <!--End Modal-->
                @empty
                @endforelse
                @endif
            </div>



    </div>



    <script>
        $(document).ready(function () {
            $('btn-danger').on('click',  function (evt) {

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

                            //td.parentNode.removeChild(td);
                            alert('Record ' + resp.responseText + ' deleted ')
                        } else {
                            console.error(resp.responseText);

                        }
                        //location.reload();
                    }
                });
            });
        });

    </script>
    <script>

    $('#ModalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    console.log(event)
        var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    })
    </script>

</x-layouts.list-layouts>


