<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}