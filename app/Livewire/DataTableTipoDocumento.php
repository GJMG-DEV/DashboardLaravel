<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoDocumento;
class DataTableTipoDocumento extends Component
{public $tipoDocumentos;
    public $nombre;
    public $abreviatura;
    public $tipoDocumentoId; // Para el ID del documento a editar
    public $isEditing = false; // Para controlar el modo de edición

    public function mount()
    {
        $this->tipoDocumentos = TipoDocumento::all();
    }

    public function render()
    {
        return view('livewire.data-table-tipo-documento');
    }

    public function openModal($id = null)
    {
        if ($id) {
            $this->isEditing = true;
            $tipoDocumento = TipoDocumento::find($id);
            $this->tipoDocumentoId = $tipoDocumento->id;
            $this->nombre = $tipoDocumento->nombre;
            $this->abreviatura = $tipoDocumento->abreviatura;
        } else {
            $this->resetForm();
        }
    }

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'abreviatura' => 'required',
        ]);

        TipoDocumento::updateOrCreate(
            ['id' => $this->tipoDocumentoId],
            [
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]
        );

        session()->flash('status', $this->isEditing ? 'Actualizado correctamente' : 'Registrado correctamente');
        $this->resetForm();
        $this->tipoDocumentos = TipoDocumento::all(); // Recargar los datos
    }

    public function delete($id)
    {
        TipoDocumento::find($id)->delete();
        session()->flash('status', 'Eliminado correctamente');
        $this->tipoDocumentos = TipoDocumento::all(); // Recargar los datos
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->abreviatura = '';
        $this->tipoDocumentoId = null;
        $this->isEditing = false;
    }
}
