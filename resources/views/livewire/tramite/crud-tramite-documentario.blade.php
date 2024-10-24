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
                 <button wire:click="closeModal()" type="button" class="btn-close"></button>
             </div>
             <div class="modal-body">
                 <form>

                        <div class="row">
                            <di class="col-md-4">
                                <label  class="form-label">Ingrese Fecha:</label>
                                <input type="date" class="form-control"  placeholder="date">
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">Tipo de Expediente</label>
                                <select class="form-select form-control-lg" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">Numero de Documento:</label>
                                <input type="number" class="form-control"  placeholder="1520">
                            </di>

                        </div>
                        <div class="row mt-2">
                            <di class="col-md-8">
                                <label  class="form-label">Nombre del Remitente::</label>
                                <input type="text" class="form-control"  placeholder="">
                            </di>
                            <di class="col-md-4">
                                <label  class="form-label">Folios:</label>
                                <input type="number" class="form-control"  placeholder="03">
                            </di>
                        </di>
                        <div class="row mt-2">
                            <di class="col-md-12">
                                <label  class="form-label">Asunto::</label>
                                <textarea name="" id="" cols="40" rows="10" class="form-control"></textarea>
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






























