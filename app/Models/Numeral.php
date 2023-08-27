<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Numeral extends Model
{
    protected $fillable = [
        'num_descripcion',
        'num_categoria',
        'num_tipoFalta',
        'articulo_id',
    ];

    //Obtener el artículo dueño del Numeral
    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class);
    }

    //Las solicitudes a las que pertenece el Numeral
    public function solicituds(): BelongsToMany
    {
        return $this->belongsToMany(Solicitud::class, 'norma_infringida')->as('NormaInfringida');
    }
}