<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Capitulo;

class UpdateCapituloRequest extends FormRequest
{
    //Determinar si el usuario está autorizado a realizar esta solicitud
    public function authorize(): bool
    {
        return true;
    }

    //Obtener las reglas de validación que se aplican a la solicitud
    public function rules(): array
    {
        $capituloId = $this->route('capitulo');
        return [
            'cap_numero' => ['required', 'string', 'max:10', Rule::unique(Capitulo::class)->ignore($capituloId)],
            'cap_descripcion' => ['required', 'string', 'max:255']
        ];
    }
}