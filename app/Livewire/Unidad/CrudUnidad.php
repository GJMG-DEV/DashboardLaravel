<?php

namespace App\Livewire\Unidad;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Unidad;
class CrudUnidad extends Component
{
    public $modal=false;


    #[Validate('required')]
    public $nombre;

    #[Validate('required')]
    public $abreviatura;

    public $unidadId;

    protected $listeners = ['editUnidad' => 'edit'];



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
    public function save()
    {
        $this->validate();
        if ($this->unidadId) {
            //dd($this->unidadId);
            $unidad = Unidad::find($this->unidadId);
            $unidad->update([
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]);
        } else {
            Unidad::create([
                'nombre' => $this->nombre,
                'abreviatura' => $this->abreviatura,
            ]);
        }
        $this->resetFields();
        session()->flash('status', 'Unidad registrado de manera correcta');
        return $this->redirect('/unidad');
    }


    public function edit($id)

    {
        // Cargar los datos del documento a editar
        $unidad = Unidad::find($id);
        $this->unidadId = $unidad->id;
        $this->nombre = $unidad->nombre;
        $this->abreviatura = $unidad->abreviatura;

        // Abrir el modal
        $this->openModal();
    }
    public function render()
    {
        return view('livewire.unidad.crud-unidad');
    }
}
