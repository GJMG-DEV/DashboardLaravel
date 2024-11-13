<?php

namespace App\Livewire\Seguimiento;

use Livewire\Component;
use App\Models\HistorialTramite;
use App\Models\TramiteDocumentario;

class Tramite extends Component
{
    public $searchText; // Número de documento a buscar
    public $derivaciones = []; // Resultado de la búsqueda
    public $asunto='';
    public function buscarDerivaciones()
    {
        if ($this->searchText != '') {
            $tramiteDocumentario = TramiteDocumentario::where('numeroDocumento', 'like', '%' . $this->searchText . '%')->first();

            if ($tramiteDocumentario) {
                $this->asunto = $tramiteDocumentario->asunto; // Guardamos el asunto
                $this->derivaciones = HistorialTramite::with('unidad')
                    ->where('tramite_documentario_id', $tramiteDocumentario->id)
                    ->get();
            } else {
                $this->derivaciones = [];
                $this->asunto = '';
            }
        } else {
            $this->derivaciones = [];
            $this->asunto = '';
        }

    }

    public function render()
    {
        // $tramiteDocumentario = HistorialTramite::with('tipoDocumento', 'areas') // Relacion con 'areas' si existe
        //     ->where('numeroDocumento', 'like', '%' . $this->search . '%')
        //     ->paginate(10); // Ajusta el paginado si es necesario

        return view('livewire.seguimiento.tramite');
        //return view('livewire.seguimiento.tramite');
    }
}
