<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'pla_fechaInicio',
        'pla_fechaFin',
        'pla_descripcion',
        'pla_url',
        'comite_id',
        'instructor_id',
    ];

    //Obtener el comite al que pertenece el Plan de mejoramiento
    public function comite(): BelongsTo
    {
        return $this->belongsTo(Comite::class);
    }

    //Obtener el instructor encargado del Plan de mejoramiento
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}
