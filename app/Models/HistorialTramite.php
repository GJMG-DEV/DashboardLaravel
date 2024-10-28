<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteDocumentario;

class HistorialTramite extends Model
{
    use HasFactory;
    protected $table = 'historial_tramite';
    protected $guarded = ['created_at','updated_at'];

    public function tramite()
    {
        return $this->belongsTo(TramiteDocumentario::class, 'tramite_documentario_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }
}
