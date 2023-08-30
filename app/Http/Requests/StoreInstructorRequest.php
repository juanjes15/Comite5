<?php

namespace App\Http\Requests;

use App\Models\Instructor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInstructorRequest extends FormRequest
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
            'ins_identificacion' => ['required', 'digits_between:5,10', Rule::unique(Instructor::class, 'ins_identificacion')],
            'ins_nombres' => ['required', 'string', 'max:255'],
            'ins_apellidos' => ['required', 'string', 'max:255'],
            'ins_email' => ['required', 'email', 'max:255', Rule::unique(Instructor::class, 'ins_email')],
            'ins_telefono' => ['required', 'digits_between:5,10'],
        ];
    }
}