<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'ins_identificacion',
        'ins_nombres',
        'ins_apellidos',
        'ins_email',
        'ins_telefono',
    ];

    //Obtener todas las fichas del Instructor
    public function fichas(): HasMany
    {
        return $this->hasMany(Ficha::class);
    }

    //Las solicitudes a las que pertenece el Instructor
    public function solicituds(): BelongsToMany
    {
        return $this->belongsToMany(Solicitud::class)->as('InstructorSolicitud')->withPivot('is_descargo');
    }

    //Obtener el usuario asociado al Instructor
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    //Obtener todos los planes de mejoramiento del Instructor
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}