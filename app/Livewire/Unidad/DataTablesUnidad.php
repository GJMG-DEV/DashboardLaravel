<?php

namespace App\Livewire\Unidad;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithPagination;
class DataTablesUnidad extends Component
{
    use WithPagination;
    public  $search='';
    public $pagina=10;

    protected $listeners = ['deleteUnidad' => 'delete'];
    public function edit($id)
    {//dd($id);
        $this->dispatch('editUnidad', id: $id);
    }
    public function delete($id)
    {
        Unidad::find($id)->delete();
        session()->flash('status', 'Tipo de unidad eliminado exitosamente.');

    }
    public function render()
    {
        return view('livewire.unidad.data-tables-unidad', [
            'unidad' => Unidad::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->pagina),
        ]);
        //return view('livewire.unidad.data-tables-unidad');
    }
}
