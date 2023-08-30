<?php

namespace App\Http\Requests;

use App\Models\Programa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProgramaRequest extends FormRequest
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
            'pro_codigo' => ['required', 'digits_between:5,10', Rule::unique(Programa::class)],
            'pro_nombre' => ['required', 'string', 'max:255'],
            'pro_nivelFormacion' => ['required', 'string', 'max:255']
        ];
    }
}