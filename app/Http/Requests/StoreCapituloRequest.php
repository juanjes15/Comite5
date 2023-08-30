<?php

namespace App\Http\Requests;

use App\Models\Capitulo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCapituloRequest extends FormRequest
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
            'cap_numero' => ['required', 'string', 'max:10', Rule::unique(Capitulo::class)],
            'cap_descripcion' => ['required', 'string', 'max:255']
        ];
    }
}