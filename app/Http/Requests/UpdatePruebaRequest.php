<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePruebaRequest extends FormRequest
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
            'pru_tipo' => ['required', 'string', 'max:255'],
            'pru_descripcion' => ['required', 'string', 'max:255'],
            'pru_fecha' => ['required', 'date', 'before:today'],
            'pru_lugar' => ['required', 'string', 'max:255'],
            'pru_url' => ['required', 'string', 'max:255'],
            'solicitud_id' => ['required', 'exists:solicituds,id']
        ];
    }
}