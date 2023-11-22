<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $fillable = [
        'pru_tipo',
        'pru_descripcion',
        'pru_fecha',
        'pru_lugar',
        'pru_url',
        'solicitud_id',
    ];

    //Obtener la solicitud a la que pertenece la Prueba
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class);
    }
}