@extends('./layouts/maestra')
@section('content')
 <div class="container-fluid">
    <h1>Tramite Documentario</h1>
    @livewire('tramite.crud-tramite-documentario')
    @livewire('tramite.data-tables-tramite-documentario')
 </div>
@endsection('content')
@section('js')


@endsection
