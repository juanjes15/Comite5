<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Ficha;

class StoreFichaRequest extends FormRequest
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
            'fic_codigo' => ['required', 'digits_between:5,10', Rule::unique(Ficha::class)],
            'fic_inicioLectiva' => ['required', 'date'],
            'fic_finLectiva' => ['required', 'date', 'after:fic_inicioLectiva'],
            'fic_inicioProductiva' => ['required', 'date','after:fic_finLectiva'],
            'fic_finProductiva' => ['required', 'date', 'after:fic_inicioProductiva'],
            'fic_modalidad' => ['required', 'string', 'max:255'],
            'fic_jornada' => ['required', 'string', 'max:255'],
            'programa_id' => ['required', 'exists:programas,id'],
            'instructor_id' => ['required', 'exists:instructors,id']
        ];
    }
}