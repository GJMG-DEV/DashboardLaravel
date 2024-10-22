<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoDocumento;
use Livewire\Attributes\Validate;
class CrudTipoDocumento extends Component
{

    public $modal=false;

    #[Validate('required')]
    public $nombre;

    #[Validate('required')]
    public $abreviatura;

    public $documentoId;

    protected $listeners = ['editTipoDocumento' => 'edit'];


    public function openModal()
    {
        $this->modal = true;

    }

    public function closeModal()
    {
        $this->modal = false;
        $this->resetValidation();

    }

    public function create(){
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
        $this->nombre = '';
        $this->abreviatura = '';
    }
    public function save()
    {
        $this->validate();
        if ($this->documentoId) {
            $documento = TipoDocumento::find($this->documentoId);
            $documento->update([
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
        session()->flash('status', 'Tipo de documento registrado de manera correcta');
        return $this->redirect('/tipo-documento');
    }


    public function edit($id)
    {
        // Cargar los datos del documento a editar
        $documento = TipoDocumento::find($id);
        $this->documentoId = $documento->id;
        $this->nombre = $documento->nombre;
        $this->abreviatura = $documento->abreviatura;

        // Abrir el modal
        $this->openModal();
    }


    public function render()
    {
        return view('livewire.crud-tipo-documento');
    }
}
