<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComiteRequest extends FormRequest
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
            'com_estado' => 'required',
            'com_fecha' => 'required',
            'com_lugar' => 'required',
            'com_recomendacion' => 'required',
            'com_acta' => 'required',
            'solicitud_id' => 'required'
        ];
    }
}