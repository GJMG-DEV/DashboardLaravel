<?php

namespace App\Livewire;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\TipoDocumento;
use Livewire\WithPagination;
use Livewire\Attributes\Reactive;
use Livewire\WithoutUrlPagination;
class DataTablesTipoDocumento extends Component
{
    use WithPagination,WithoutUrlPagination;
    //#[Url(history: true)] // Mantiene la búsqueda sincronizada con la URL
    public $search = '';
    public $pagina = 10; // Establecer el número de elementos por página

    protected $listeners = ['deleteTipoDocumento' => 'delete'];


    public function edit($id)
    {
        $this->dispatch('editTipoDocumento', id: $id);
    }
    public function search()
    {
        $this->resetPage();
    }
    public function delete($id)
    {
        TipoDocumento::find($id)->delete();
        session()->flash('status', 'Tipo de documento eliminado exitosamente.');

    }
    public function updatedSearch($value)
    {
        session(['search' => $value]); // Guardar búsqueda en la sesión
        $this->resetPage(); // Resetea la página cuando cambia la búsqueda
    }
    public function render()
    {

        return view('livewire.data-tables-tipo-documento', [
            'tipoDocumento' => TipoDocumento::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->pagina),
        ]);



    }
}
