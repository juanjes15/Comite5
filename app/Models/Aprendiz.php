<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    protected $fillable = [
        'apr_identificacion',
        'apr_nombres',
        'apr_apellidos',
        'apr_email',
        'apr_telefono',
        'apr_direccion',
        'apr_fechaNacimiento',
        'apr_numComites',
        'ficha_id',
    ];

    //Obtener la ficha a la que pertenece el Aprendiz
    public function ficha(): BelongsTo
    {
        return $this->belongsTo(Ficha::class);
    }

    //Las solicitudes a las que pertenece el Aprendiz
    public function solicituds(): BelongsToMany
    {
        return $this->belongsToMany(Solicitud::class)->as('AprendizSolicitud')->withPivot('as_descargo');
    }

    //Obtener el usuario asociado al Aprendiz
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    //Los planes a los que pertenece el Aprendiz
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class)->as('AprendizPlan')->withPivot('ap_observacion', 'ap_url');
    }
}