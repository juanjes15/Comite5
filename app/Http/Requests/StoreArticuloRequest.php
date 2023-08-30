<?php

namespace App\Http\Requests;

use App\Models\Articulo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticuloRequest extends FormRequest
{
    //Determinar si el usuario está autorizado a realizar esta solicitud
    public function authorize(): bool
    {
        return true;
    }

    //Obtener las reglas de validación que se aplican a la solicitud
    public function rules(): array
    {
        return [
            'art_numero' => ['required', 'digits_between:1,3', Rule::unique(Articulo::class)],
            'art_descripcion' => ['required', 'string', 'max:255'],
            'capitulo_id' => ['required', 'exists:capitulos,id']
        ];
    }
}