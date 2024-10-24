<div class="container-fluid">
    <button class="btn btn-primary" wire:click="create()">
        + Crear Unidad
    </button>




 <!-- Modal modal fade show d-block-->
 @if($modal)
 <div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">{{ $nombre ? 'Editar Unidad' : 'Crear Unidad' }}</h5>
                 <button wire:click="closeModal()" type="button" class="btn-close"></button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="mb-3">
                         <label for="nombre" class="form-label">Nombre de la Unidad o Gerencia</label>
                         <input type="text" wire:model="nombre" class="form-control" id="nombre">
                         @error('nombre') <span class="text-danger">{{ $message }}*</span> @enderror
                     </div>
                     <div class="mb-3">
                         <label for="abreviatura" class="form-label">Abreviatura</label>
                         <input type="text" wire:model="abreviatura" class="form-control" id="abreviatura">
                         @error('abreviatura') <span class="text-danger">{{ $message }}*</span> @enderror
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button wire:click="closeModal()" type="button" class="btn btn-secondary">Cerrar</button>
                 <button wire:click="save()" type="button" class="btn btn-primary">Guardar</button>
             </div>
         </div>
     </div>
 </div>
@endif

</div>
