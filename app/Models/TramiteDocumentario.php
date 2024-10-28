<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoDocumento;
class TramiteDocumentario extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    protected $table='tramite_documentario';
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'idTipoDocumento');
    }
    public function historialTramite()
{
    return $this->hasMany(HistorialTramite::class, 'tramite_documentario_id');
}
}
