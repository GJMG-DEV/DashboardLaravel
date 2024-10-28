<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteDocumentario;
use App\Models\Unidad;
class TipoDocumento extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    protected $table='tipo_documento';

    public function tramites()
    {
        return $this->hasMany(TramiteDocumentario::class, 'idTipoDocumento');
    }

}
