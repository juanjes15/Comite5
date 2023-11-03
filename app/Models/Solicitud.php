<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Solicitud extends Model
{
    protected $fillable = [
        'sol_lugar',
        'sol_motivo',
        'sol_descripcion',
        'sol_estado',
    ];

    //Obtener el comité asociado a la Solicitud
    public function comite(): HasOne
    {
        return $this->hasOne(Comite::class);
    }

    //Obtener las pruebas asociadas a la Solicitud
    public function prueba(): HasOne
    {
        return $this->hasOne(Prueba::class);
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
    public function numerals(): MorphToMany
    {
        return $this->morphedByMany(Numeral::class, 'norma')->as('Norma');
    }

    //Los articulos que pertenecen a la Solicitud
    public function articulos(): MorphToMany
    {
        return $this->morphedByMany(Articulo::class, 'norma')->as('Norma');
    }
}