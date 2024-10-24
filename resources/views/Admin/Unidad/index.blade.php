@extends('./layouts/maestra')
@section('content')
 <div class="container-fluid">
    <h1>UNIDAD</h1>
    @livewire('unidad.crud-unidad')
    @livewire('unidad.data-tables-unidad')
    {{-- @livewire('crud-tipo-documento')
    @livewire('data-tables-tipo-documento') --}}
 </div>
@endsection('content')
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.deleteUnidad = function(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                   Livewire.dispatch('deleteUnidad', { id: id }); // Cambiar aquí
                    Swal.fire('¡Eliminado!', 'El tipo de documento ha sido eliminado.', 'success');
                }
            });
        }
    });
</script>

@endsection
