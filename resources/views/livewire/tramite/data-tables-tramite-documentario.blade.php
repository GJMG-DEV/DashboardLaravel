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
                        <table id="tableUnidad" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha Infreso</th>
                                    <th>Tipo de Expediente</th>
                                    <th>Numero de Documentos</th>
                                    <th>Nombre del Remitente</th>
                                    <th>Folios</th>
                                    <th>Asunto</th>
                                    <th>Acciones</th>
                                    <th>Derivar</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Fecha Infreso</th>
                                    <th>Tipo de Expediente</th>
                                    <th>Numero de Documentos</th>
                                    <th>Nombre del Remitente</th>
                                    <th>Folios</th>
                                    <th>Asunto</th>
                                    <th>Acciones</th>
                                    <th>Derivar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tramiteDocumentario as $value)

                                    <tr wire:key="tramiteDocumentario-{{ $value->id }}">
                                        <th>{{$value->fechaIngreso}}</th>
                                        <th>{{$value->tipoDocumento->nombre}}</th>
                                        <th>{{$value->numeroDocumento}}</th>
                                        <th>{{$value->nombreRemitente}}</th>
                                        <th>{{$value->folios}}</th>
                                        <th>{{$value->asunto}}</th>
                                        <th>
                                            <button class="btn btn-success" wire:click="edit({{ $value->id }})">Editar</button>

                                        </th>
                                        <th>
                                            <select class="form-select form-control-lg" wire:change="derivarDocumento({{ $value->id }}, $event.target.value)">
                                                <option selected>Selecciona...</option>
                                                @foreach ($unidadSelect as $unidad)
                                                    <option value="{{ $unidad->id }}">{{ $unidad->abreviatura }}</option>
                                                @endforeach
                                            </select>
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
        {{ $tramiteDocumentario->links('') }} <!-- Usar paginación de Bootstrap -->

    </div>

</div>

