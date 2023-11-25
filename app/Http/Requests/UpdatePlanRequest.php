<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
            'pla_fechaInicio' => ['required', 'date'],
            'pla_fechaFin' => ['required', 'date'],
            'pla_descripcion' => ['required', 'string', 'max:255'],
            'pla_estado' => ['required', 'string'],
            'pla_url' => ['required', 'file'],
            'comite_id' => ['required', 'exists:comites,id'],
            'instructor_id' => ['required', 'exists:instructors,id']
        ];
    }
}
