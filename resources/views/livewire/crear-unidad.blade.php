@extends('./layouts/maestra')
@section('content')
    <div class="container-fluid">
        <h1>Unidad</h1>
        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Crear Unidad
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Unidad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">Nombre de la Gerencia o Unidad</label>
                                <input type="text" name="" class="form-control"
                                    placeholder="Gerencia de Desarrollo Social" aria-label="GDS"
                                    aria-describedby="basic-addon1" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Abreviatura </label>
                                <input type="text" name="" class="form-control" placeholder="GDS" aria-label="GDS"
                                    aria-describedby="basic-addon1" id="">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Unidad o Gerencia</th>
                                        <th>Abreviatura</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tipo Documento</th>
                                        <th>Abreviatura</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>

                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
