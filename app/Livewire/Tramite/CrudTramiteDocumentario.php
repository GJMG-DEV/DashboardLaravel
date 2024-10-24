<?php

namespace App\Livewire\Tramite;

use Livewire\Component;

class CrudTramiteDocumentario extends Component
{
    public $modal=false;
    public function openModal(){
        $this->modal=true;
    }
    public function closeModal(){
        $this->modal=false;
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
    public function render()
    {
        return view('livewire.tramite.crud-tramite-documentario');
    }
}
