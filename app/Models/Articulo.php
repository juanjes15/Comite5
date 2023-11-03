<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Articulo extends Model
{
    protected $fillable = [
        'art_numero',
        'art_descripcion',
        'capitulo_id',
    ];

    //Obtener todos los numerales del Artículo
    public function numerals(): HasMany
    {
        return $this->hasMany(Numeral::class);
    }

    //Obtener el capítulo al que pertenece el Artículo
    public function capitulo(): BelongsTo
    {
        return $this->belongsTo(Capitulo::class);
    }

    //Las solicitudes a las que pertenece el Artículo
    public function solicituds(): MorphToMany
    {
        return $this->morphToMany(Solicitud::class, 'norma')->as('Norma');
    }
}