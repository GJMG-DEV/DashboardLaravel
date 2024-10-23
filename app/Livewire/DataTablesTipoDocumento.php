<?php

namespace App\Livewire;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\TipoDocumento;

use Livewire\WithPagination;
class DataTablesTipoDocumento extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';


    protected $listeners = ['deleteTipoDocumento' => 'delete'];
    public function mount()
    {
        $this->search = ''; // Inicializa el valor de búsqueda
    }
    public function edit($id)
    {
        $this->dispatch('editTipoDocumento', id: $id);
    }
    public function delete($id)
    {
        TipoDocumento::find($id)->delete();
        session()->flash('status', 'Tipo de documento eliminado exitosamente.');

    }
     // Escuchar cambios en el campo de búsqueda y resetear la página
     public function updatedSearch()
     {
         $this->resetPage(); // Resetea a la primera página cuando se cambia la búsqueda
         // Asegúrate de empezar en la primera página
     }
    public function render()
    {
        $tipoDocumento = TipoDocumento::where('nombre', 'like', '%' . $this->search . '%')
        ->orWhere('abreviatura', 'like', '%' . $this->search . '%')
        ->paginate(4); // Número de registros por página

        return view('livewire.data-tables-tipo-documento', [
            'tipoDocumento' => $tipoDocumento,
        ]);
    }
}
