<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    protected $fillable = [
        'cap_numero',
        'cap_descripcion',
    ];

    //Obtener todos los artículos para el Capítulo
    public function articulos(): HasMany
    {
        return $this->hasMany(Articulo::class);
    }
}