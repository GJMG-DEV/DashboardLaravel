<?php

namespace App\Livewire\Tramite;

use Livewire\Component;
use App\Models\TipoDocumento;
use App\Models\TramiteDocumentario;
use Livewire\Attributes\Validate;
class CrudTramiteDocumentario extends Component
{
    public $modal=false;
    public $tipoDocumentos;

    #[Validate('required')]
    public $fechaIngreso='';
    #[Validate('required')]
    public $idTipoDocumento ='';
    #[Validate('required')]
    public $numeroDocumento='';
    #[Validate('required')]
    public $nombreRemitente='';
    #[Validate('required')]
    public $folios='';
    #[Validate('required')]
    public $asunto ='';

    public $tramiteId;

    protected $listeners = ['editTramite' => 'edit'];
    public function mount(){

        $this->tipoDocumentos=TipoDocumento::all();
    }
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
        $this->fechaIngreso='';
        $this->idTipoDocumento ='';
        $this->numeroDocumento='';
        $this->nombreRemitente='';
        $this->folios='';
        $this->asunto='';
    }
    public function save()
    {
        $this->validate();
        if ($this->tramiteId) {
            //dd($this->unidadId);
            $unidad = TramiteDocumentario::find($this->tramiteId);
            $unidad->update([
                'fechaIngreso'=>$this->fechaIngreso,
                'idTipoDocumento'=>        $this->idTipoDocumento ,
                'numeroDocumento'=>        $this->numeroDocumento,
                'nombreRemitente'=>        $this->nombreRemitente,
                'folios'=>        $this->folios,
                'asunto'=>        $this->asunto,
            ]);
        } else {
            TramiteDocumentario::create([
                'fechaIngreso'=>$this->fechaIngreso,
                'idTipoDocumento'=>        $this->idTipoDocumento ,
                'numeroDocumento'=>        $this->numeroDocumento,
                'nombreRemitente'=>        $this->nombreRemitente,
                'folios'=>        $this->folios,
                'asunto'=>        $this->asunto,
            ]);
        }
        $this->resetFields();
        session()->flash('status', 'Unidad registrado de manera correcta');
        return $this->redirect('/tramite-documentario');
    }


    public function edit($id)

    { //dd($id);
        // Cargar los datos del documento a editar
        $tramite = TramiteDocumentario::find($id);
        $this->fechaIngreso=$tramite->fechaIngreso;
        $this->idTipoDocumento=$tramite->idTipoDocumento;
        $this->numeroDocumento=$tramite->numeroDocumento;
        $this->nombreRemitente=$tramite->nombreRemitente;
        $this->folios=$tramite->folios;
        $this->asunto=$tramite->asunto;
        $this->tramiteId=$id;
        // Abrir el modal
        $this->openModal();
    }
    public function render()
    {
        return view('livewire.tramite.crud-tramite-documentario');
    }
}
