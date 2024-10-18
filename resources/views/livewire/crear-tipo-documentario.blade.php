@extends('./layouts/maestra')
@section('content')
<div>
    <div class="container-fluid">
        <h1>Tipo de Documento</h1>
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" wire:click="openModal">
            + Crear Tipo Documento
        </button>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $isEditing ? 'Editar' : 'Crear' }} Tipo de Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Tipo Documento</label>
                                <input type="text" id="nombre" class="form-control" wire:model="nombre">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="abreviatura">Abreviatura</label>
                                <input type="text" id="abreviatura" class="form-control" wire:model="abreviatura">
                                @error('abreviatura') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Guardar' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabla de documentos -->
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipo Documento</th>
                        <th>Abreviatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipoDocumentos as $doc)
                        <tr>
                            <td>{{ $doc->nombre }}</td>
                            <td>{{ $doc->abreviatura }}</td>
                            <td>
                                <button wire:click="edit({{ $doc->id }})" class="btn btn-info btn-sm">Editar</button>
                                <button wire:click="delete({{ $doc->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')
