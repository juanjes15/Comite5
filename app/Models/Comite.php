<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    protected $fillable = [
        'com_estado',
        'com_fecha',
        'com_lugar',
        'com_recomendacion',
        'com_acta',
        'solicitud_id',
    ];

    //Obtener la solicitud a la que pertenece el Comite
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class);
    }

    //Los usuarios que pertenecen al Comite
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->as('ComiteUser');
    }
}