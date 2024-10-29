<?php

namespace App\Livewire\Seguimiento;

use Livewire\Component;

class Tramite extends Component
{
    public $search='';
    public function render()
    {
        return view('livewire.seguimiento.tramite');
    }
}
