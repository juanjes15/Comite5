<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Aprendiz;

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
        $aprendizId = $this->route('aprendiz');
        return [
            'apr_identificacion' => ['required', 'digits_between:5,10', Rule::unique(Aprendiz::class, 'apr_identificacion')->ignore($aprendizId)],
            'apr_nombres' => ['required', 'string', 'max:255'],
            'apr_apellidos' => ['required', 'string', 'max:255'],
            'apr_email' => ['required', 'email', 'max:255', Rule::unique(Aprendiz::class, 'apr_email')->ignore($aprendizId)],
            'apr_telefono' => ['required', 'digits_between:5,10'],
            'apr_direccion' => ['required', 'string', 'max:255'],
            'apr_fechaNacimiento' => ['required', 'date', 'before:today'],
            'apr_numComites' => ['required', 'numeric', 'between:0,3'],
            'ficha_id' => ['required', 'exists:fichas,id']
        ];
    }
}