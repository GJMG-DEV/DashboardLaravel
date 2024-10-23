<div class="container-fluid">
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
    <!-- Fin de la paginación -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="mt-3">
                            <h4 class="card-title">Buscar:</h4>
                        </div>
                       <div>
                        <form class="">
                            <div class="form-group">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="..."  wire:model.live="search" />
                                  <span class="input-icon-addon">
                                    <i class="fa fa-search"></i>
                                  </span>
                                </div>
                            </div>
                        </form>
                       </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableTipoDocumento" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo Documento</th>
                                    <th>Abreviatura</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tipo Documento</th>
                                    <th>Abreviatura</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tipoDocumento as $value)
                                    <tr wire:key="documento-{{ $value->id }}">
                                        <th>{{$value->nombre}}</th>
                                        <th>{{$value->abreviatura}}</th>
                                        <th>
                                            <button class="btn btn-success" wire:click="edit({{ $value->id }})">Editar</button> |
                                            <button class="btn btn-danger" onclick="deleteTipoDocumento({{$value->id}})">Eliminar</button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-3">
        {{ $tipoDocumento->links('pagination::bootstrap-4') }} <!-- Usar paginación de Bootstrap -->
    </div>
    <div>
        <span>Página {{ $tipoDocumento->currentPage() }} de {{ $tipoDocumento->lastPage() }}</span>
    </div>
</div>

