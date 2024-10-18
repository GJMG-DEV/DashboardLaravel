<div>
    @if (session()->has('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click="openModal">
        + Crear Tipo Documento
    </button>

    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Tipo Documento</th>
                <th>Abreviatura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoDocumentos as $tipo)
                <tr>
                    <td>{{ $tipo->nombre }}</td>
                    <td>{{ $tipo->abreviatura }}</td>
                    <td>
                        <button wire:click="openModal({{ $tipo->id }})" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                        <button wire:click="delete({{ $tipo->id }})" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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

</div>

