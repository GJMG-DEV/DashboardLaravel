<div class="container-fluid">

    <!-- Fin de la paginación -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic</h4>
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
                                            <button class="btn btn-danger">Eliminar</button>
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
    {{ $tipoDocumento->links('pagination::bootstrap-4') }} <!-- Usar paginación de Bootstrap -->
</div>
