<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFichaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fic_codigo' => 'required',
            'fic_inicioLectiva' => 'required',
            'fic_finLectiva' => 'required',
            'fic_inicioProductiva' => 'required',
            'fic_finProductiva' => 'required',
            'fic_modalidad' => 'required',
            'fic_jornada' => 'required',
            'programa_id' => 'required',
            'instructor_id' => 'required'
        ];
    }
}
