<div class="container-fluid">
    <di class="container">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <input type="text" class="form-control" placeholder="Buscar número de documento..." wire:model="searchText" style="width: 400px">
                    <button class="btn btn-success ml-3" wire:click="buscarDerivaciones">Buscar</button>
                </div>

                <div class="mt-4">
                    @if ($searchText!='')
                        @if ($derivaciones && $derivaciones->isNotEmpty())
                            <p> <strong>Asunto:</strong> {{$asunto}}</p>

                            <h5 class="text-danger"> <strong>Unidades donde se ha derivado el documento:</strong></h5>
                            <ul class="list-group">
                                @foreach ($derivaciones as $derivacion)
                                    <li class="list-group-item mb-2">
                                        Unidad: {{ $derivacion->unidad->nombre }} - Abreviatura: {{ $derivacion->unidad->abreviatura }}
                                        <br>
                                        Fecha de Derivación: {{ $derivacion->fecha_derivacion }}


                                    </li>

                                @endforeach
                            </ul>
                        @else
                            <p class="mt-3">No se encontraron derivaciones para el número de documento ingresado.</p>
                        @endif
                    @else

                    @endif

                </div>
            </div>
        </div>
    </di>

</div>












