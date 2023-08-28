<?php

namespace App\Http\Requests;

use App\Models\Aprendiz;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAprendizRequest extends FormRequest
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
            'apr_identificacion' => ['required', 'numeric', 'min:5', 'max:10', Rule::unique(Aprendiz::class, 'apr_identificacion')],
            'apr_nombres' => ['required', 'string', 'max:255'],
            'apr_apellidos' => ['required', 'string', 'max:255'],
            'apr_email' => ['required', 'email', 'max:255', Rule::unique(Aprendiz::class, 'apr_email')],
            'apr_telefono' => ['required', 'numeric', 'min:7', 'max:20'],
            'apr_direccion' => ['required', 'string', 'max:255'],
            'apr_fechaNacimiento' => ['required', 'date', 'before:today'],
            'ficha_id' => ['required', 'exists:fichas,id']
        ];
    }
}