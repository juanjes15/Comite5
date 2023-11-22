<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $fillable = [
        'fic_codigo',
        'fic_inicioLectiva',
        'fic_finLectiva',
        'fic_inicioProductiva',
        'fic_finProductiva',
        'fic_modalidad',
        'fic_jornada',
        'programa_id',
        'instructor_id',
        'aprendiz_id',
    ];

    //Obtener el programa al que pertenece la Ficha
    public function programa(): BelongsTo
    {
        return $this->belongsTo(Programa::class);
    }

    //Obtener todos los aprendices de la Ficha
    public function aprendizs(): HasMany
    {
        return $this->hasMany(Aprendiz::class);
    }

    //Obtener el instructor gestor de la Ficha
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}