<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteDocumentario;
class TipoDocumento extends Model
{
    use HasFactory;
    protected $guarded=['id','createt_at','updatet_at'];
    protected $table='tipo_documento';

    public function tramites()
    {
        return $this->hasMany(TramiteDocumentario::class, 'tipo_documento_id');
    }

}
