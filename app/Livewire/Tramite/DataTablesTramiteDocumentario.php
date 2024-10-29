<?php

namespace App\Livewire\Tramite;

use Livewire\Component;

use App\Models\TramiteDocumentario;
use App\Models\Unidad;
use Livewire\WithPagination;
use App\Models\HistorialTramite;
class DataTablesTramiteDocumentario extends Component
{
    use WithPagination;
    public  $search='';
    public $pagina=10;
    public $unidadSelect;
    public function mount(){

        $this->unidadSelect=Unidad::all();
    }
    public function edit($id)
    {
        $this->dispatch('editTramite', id: $id);
    }
    public function derivarDocumento($tramiteId, $unidadId)
    {
        // Verificar que el trámite y la unidad existen
        $tramite = TramiteDocumentario::find($tramiteId);
        $unidad = Unidad::find($unidadId);

        if ($tramite && $unidad) {
            // Guardar el registro en la tabla historial_tramite
            HistorialTramite::create([
                'tramite_documentario_id' => $tramite->id,
                'unidad_id' => $unidad->id,
                'fecha_derivacion' => now(),
            ]);

            $tramite->update([
               'estado'=>2
            ]);

            session()->flash('message', 'Trámite derivado exitosamente.');
        } else {
            session()->flash('error', 'No se encontró el trámite o la unidad.');
        }
    }
    public function render()
    {
        $tramiteDocumentario = TramiteDocumentario::with('tipoDocumento') // Eager loading
            ->where('numeroDocumento', 'like', '%' . $this->search . '%')
            ->where('estado', 1)
            ->paginate($this->pagina);
            return view('livewire.tramite.data-tables-tramite-documentario', compact('tramiteDocumentario'));
    }

}
