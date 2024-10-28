<div class="container-fluid">
    <button class="btn btn-primary" wire:click="create()">
        + Registrar Nuevo Documento
    </button>




 <!-- Modal modal fade show d-block-->
 @if($modal)
 <div class="modal fade show d-block  " style="background-color: rgba(0,0,0,0.5);">
     <div class="modal-dialog modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 {{-- <h5 class="modal-title">{{ $nombre ? 'Editar Unidad' : 'Crear Unidad' }}</h5> --}}
                 <h5>TRAMITE DOCUMENTARIO</h5>
                 <button wire:click="closeModal()" type="button" class="btn-close"></button>
             </div>
             <div class="modal-body">
                 <form>

                        <div class="row">
                            <di class="col-md-4">
                                <label  class="form-label">Ingrese Fecha:</label>
                                <input type="date" class="form-control"  placeholder="date" wire:model='fechaIngreso'>
                                @error('fechaIngreso') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">Tipo de Expediente</label>
                                <select class="form-select form-control-lg" aria-label="Default select example" wire:model='idTipoDocumento'>
                                    <option selected>Selecciona...</option>
                                    @foreach ($tipoDocumentos as $value)
                                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                                    @endforeach
                                  </select>
                                  @error('idTipoDocumento') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">N° de Documento y/o Expediente:</label>
                                <input type="number" class="form-control"  placeholder="1520" wire:model='numeroDocumento'>
                                @error('numeroDocumento') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>

                        </div>
                        <div class="row mt-2">
                            <di class="col-md-8">
                                <label  class="form-label">Nombre del Remitente::</label>
                                <input type="text" class="form-control"  placeholder="" wire:model='nombreRemitente'>
                                @error('nombreRemitente') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">Folios:</label>
                                <input type="number" class="form-control"  placeholder="03" wire:model='folios'>
                                @error('folios') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>
                        </di>
                        <div class="row mt-2">
                            <di class="col-md-12">
                                <label  class="form-label">Asunto::</label>
                                <textarea name="" id="" cols="40" rows="10" class="form-control" wire:model='asunto'></textarea>
                                @error('asunto') <span class="text-danger">{{ $message }}*</span> @enderror
                            </di>
                        </div>



                 </form>
             </div>
             <div class="modal-footer mt-5">
                 <button wire:click="closeModal()" type="button" class="btn btn-secondary">Cerrar</button>
                 <button wire:click="save()" type="button" class="btn btn-primary">Guardar</button>
             </div>
         </div>
     </div>
 </div>
@endif

</div>






























