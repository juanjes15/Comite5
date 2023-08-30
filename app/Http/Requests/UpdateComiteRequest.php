<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComiteRequest extends FormRequest
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
            'com_estado' => ['required', 'string', 'max:255'],
            'com_fecha' => ['required', 'date'],
            'com_lugar' => ['required', 'string', 'max:255'],
            'com_recomendacion' => ['required', 'string', 'max:255'],
            'com_acta' => ['required', 'string', 'max:255'],
            'solicitud_id' => ['required', 'exists:solicituds,id']
        ];
    }
}