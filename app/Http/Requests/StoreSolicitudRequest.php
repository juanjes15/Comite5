<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitudRequest extends FormRequest
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
            'sol_lugar' => ['required', 'string', 'max:255'],
            'sol_motivo' => ['required', 'string', 'max:255'],
            'sol_descripcion' => ['required', 'string', 'max:255'],
            'sol_estado' => ['required', 'string', 'max:255'],
        ];
    }
}