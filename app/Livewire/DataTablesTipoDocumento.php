<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoDocumento;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class DataTablesTipoDocumento extends Component
{
    use WithPagination,WithoutUrlPagination;

    public function edit($id)
    {
        $this->dispatch('editTipoDocumento', id: $id);
    }

    public function render()
    {
        return view('livewire.data-tables-tipo-documento', [
            'tipoDocumento' => TipoDocumento::paginate(2), // Cambia 10 por el número de registros por página que desees
        ]);
    }
}
