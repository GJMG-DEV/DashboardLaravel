<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $guarded=['id','createt_at','updatet_at'];
    protected $table='unidad';

    public function historialTramites()
    {
        return $this->hasMany(HistorialTramite::class);
    }
}
