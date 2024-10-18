<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoDocumento;

class CrearTipoDocumentario extends Component
{
    public $nombre;
    public $abreviatura;
    public $tipoDocumentoId;
    public $isEditing = false;

    protected $rules = [
        'nombre' => 'required',
        'abreviatura' => 'required',
    ];

    public function openModal()
    {
        $this->emit('openModal');
    }

    public function closeModal()
    {
        $this->emit('closeModal');
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $tipoDocumento = TipoDocumento::findOrFail($this->tipoDocumentoId);
            $tipoDocumento->update([
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]);
        } else {
            TipoDocumento::create([
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]);
        }

        $this->resetFields();
        $this->closeModal();
        session()->flash('message', $this->isEditing ? 'Documento actualizado' : 'Documento creado');
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $tipoDocumento = TipoDocumento::findOrFail($id);
        $this->tipoDocumentoId = $tipoDocumento->id;
        $this->nombre = $tipoDocumento->nombre;
        $this->abreviatura = $tipoDocumento->abreviatura;
        $this->openModal();
    }

    public function delete($id)
    {
        TipoDocumento::findOrFail($id)->delete();
        session()->flash('message', 'Documento eliminado');
    }

    public function resetFields()
    {
        $this->nombre = '';
        $this->abreviatura = '';
        $this->isEditing = false;
        $this->tipoDocumentoId = null;
    }

    public function render()
    {
        return view('livewire.crear-tipo-documentario', [
            'tipoDocumentos' => TipoDocumento::all(),
        ]);
    }
}
