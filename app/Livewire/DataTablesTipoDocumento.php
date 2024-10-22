<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoDocumento;

use Livewire\WithPagination;
class DataTablesTipoDocumento extends Component
{
    use WithPagination;

    public $search = '';


    protected $listeners = ['deleteTipoDocumento' => 'delete'];
    public function edit($id)
    {
        $this->dispatch('editTipoDocumento', id: $id);
    }
    public function delete($id)
    {
        TipoDocumento::find($id)->delete();
        session()->flash('status', 'Tipo de documento eliminado exitosamente.');

    }
    public function render()
    {
         // Filtrar los tipos de documento por el término de búsqueda
         $tipoDocumento = TipoDocumento::where('nombre', 'like', '%' . $this->search . '%')
         ->orWhere('abreviatura', 'like', '%' . $this->search . '%')
         ->paginate(2);

        return view('livewire.data-tables-tipo-documento', [
        'tipoDocumento' => $tipoDocumento,
        ]);
    }
}
