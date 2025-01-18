
<x-layouts.list-layouts>

            <table class="table table-light table-bordered">

                    <tr>
                        <thead class="thead-light">
                        <th>ID PDS</th>
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

                       @if(is_object($register))


                    @forelse ($register as $reg)
                        <tr>
                            <td>{{$reg->id}} </td>
                            <td>{{$reg->reparto}}</td>
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

                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                 Edit
                                </button></td> </tr>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm" href="{{ route('reglist') }}" >Indietro</a></td>



                            @empty
                            @endforelse

                        @endif

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg " >
                        <div class="modal-content px-5 m-2">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifica PDS {{$reg->numpds}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="numpds" class ="form-label">Num PDS</label>
                                    <input type="text" class="form-control" id="numpds" name="numpds" value="{{ $reg->numpds }}" >
                                </div>
                                <div class="mb-2">
                                    <label for="numpds" class ="form-label">Num PDS</label>
                                    <input type="text" class="form-control" id="numpds" name="reparto" value="{{ $reg->reparto }}" >
                                </div>
                                <div class="mb-2">
                                    <label for="datapds" class ="form-label">Data PDS</label>
                                    <input type="date" class="form-control datepicker @error('datapds') is-valid @enderror" id="datapds" name="datapds" value="{{ $reg->datapds }}" >
                                </div>
                                <div class="mb-2">
                                    <label for="oggetto" class ="form-label">Oggetto</label>
                                    <input type="text" class="form-control" id="oggetto" name="oggetto" value="{{$reg->oggetto  }}" required>
                                </div>
                            </div>

                            <div class="container mt-2 py-2 d-flex justify-start" >
                                <div class="mb-2">
                                    <label for="idcapitolo" class ="form-label">ID Capitolo</label>
                                    <input type="number" class="form-control" id="idcapitolo" name="idcapitolo" value="{{ $reg->idcapitolo  }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="capitolo" class ="form-label">Capitolo</label>
                                    <input type="number" class="form-control" id="capitolo" name="capitolo" value="{{ $reg->capitolo  }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="art" class ="form-label">Art</label>
                                    <input type="number" class="form-control" id="art" name="art" value="{{ $reg->art  }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="prog" class ="form-label">Prog</label>
                                    <input type="number" class="form-control" id="prog" name="prog" value="{{ $reg->prog   }}" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="idv" class ="form-label">IDV</label>
                                <input type="number" class="form-control" id="idv" name="idv" value="{{ $reg->idv  }}" required>
                            </div>
                            <div class="mb-2">
                                <label for="decreto" class ="form-label">Decreto</label>
                                <input type="text" class="form-control" id="decreto" name="decreto" value="{{ $reg->decreto  }}" required>
                            </div>
                            <div class="container col-auto d-flex justify-start">
                                <div class="mb-2">
                                    <label for="importo" class ="form-label">Importo</label>
                                    <input type="number" class="form-control text-sm-right" id="importo" name="importo" value="{{$reg->importo   }}" min="0" step="0.01" required placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="previstoimpegno" class ="form-label">Previsto Impegno</label>
                                    <input type="number" class="form-control text-sm-right" id="previstoimpegno" name="previstoimpegno" value="{{ $reg->previstoimpegno  }}" min="0" step="0.01" required placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="impegnato" class ="form-label">Impegnato</label>
                                    <input type="number" class="form-control text-sm-right" id="impegnato" name="impegnato" value="{{ $reg->impegnato  }}" min="0" step="0.01"  placeholder="0,00">
                                </div>
                                <div class="mb-2">
                                    <label for="contabilizzato" class ="form-label">Contabilizzato</label>
                                    <input type="number" class="form-control text-sm-right" id="contabilizzato" name="contabilizzato" value="{{ $reg->contabilizzato  }}" min="0" step="0.01"  placeholder="0,00">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Salva modifiche</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
</x-layouts.list-layouts>





