<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Articulo;

class UpdateArticuloRequest extends FormRequest
{
    //Determinar si el usuario está autorizado a realizar esta solicitud
    public function authorize(): bool
    {
        return true;
    }

    //Obtener las reglas de validación que se aplican a la solicitud
    public function rules(): array
    {
        $articuloId = $this->route('articulo');
        return [
            'art_numero' => ['required', 'digits_between:1,3', Rule::unique(Articulo::class)->ignore($articuloId)],
            'art_descripcion' => ['required', 'string', 'max:255'],
            'capitulo_id' => ['required', 'exists:capitulos,id']
        ];
    }
}