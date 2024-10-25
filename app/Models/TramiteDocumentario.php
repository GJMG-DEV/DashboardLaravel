<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoDocumento;
class TramiteDocumentario extends Model
{
    use HasFactory;
    protected $guarded=['id','createt_at','updatet_at'];
    protected $table='tramite_documentario';
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
}
