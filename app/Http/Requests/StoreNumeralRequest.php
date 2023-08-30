<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNumeralRequest extends FormRequest
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
            'num_descripcion' => ['required', 'string'],
            'num_categoria' => ['required', 'string', 'max:255'],
            'num_tipoFalta' => ['required', 'string', 'max:255'],
            'articulo_id' => ['required', 'exists:articulos,id']
        ];
    }
}