<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSolicitudRequest extends FormRequest
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
            'sol_estado' => ['string', 'max:255'],
        ];
    }
}