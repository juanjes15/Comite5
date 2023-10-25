<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Solicitud extends Model
{
    protected $fillable = [
        'sol_lugar',
        'sol_motivo',
        'sol_descripcion',
        'sol_estado',
    ];

    //Obtener el instructor dueño de la Solicitud
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    //Obtener el comité asociado a la Solicitud
    public function comite(): HasOne
    {
        return $this->hasOne(Comite::class);
    }

    //Obtener todas las pruebas para la Solicitud
    public function pruebas(): HasMany
    {
        return $this->hasMany(Prueba::class);
    }

    //Los aprendices que pertenecen a la Solicitud
    public function aprendizs(): BelongsToMany
    {
        return $this->belongsToMany(Aprendiz::class)->as('AprendizSolicitud');
    }

    //Los instructores que pertenecen a la Solicitud
    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class)->as('InstructorSolicitud');
    }

    //Los numerales que pertenecen a la Solicitud
    public function numerals(): BelongsToMany
    {
        return $this->belongsToMany(Numeral::class, 'norma_infringida')->as('NormaInfringida');
    }
}