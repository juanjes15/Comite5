<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Programa;

class UpdateProgramaRequest extends FormRequest
{
    //Determinar si el usuario está autorizado a realizar esta solicitud
    public function authorize(): bool
    {
        return true;
    }

    //Obtener las reglas de validación que se aplican a la solicitud
    public function rules(): array
    {
        $programaId = $this->route('programa');
        return [
            'pro_codigo' => ['required', 'digits_between:5,10', Rule::unique(Programa::class)->ignore($programaId)],
            'pro_nombre' => ['required', 'string', 'max:255'],
            'pro_nivelFormacion' => ['required', 'string', 'max:255']
        ];
    }
}