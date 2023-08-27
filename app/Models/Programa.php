<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programa extends Model
{
    protected $fillable = [
        'pro_codigo',
        'pro_nombre',
        'pro_nivelFormacion',
    ];

    //Obtener todas las fichas para el Programa
    public function fichas(): HasMany
    {
        return $this->hasMany(Ficha::class);
    }
}