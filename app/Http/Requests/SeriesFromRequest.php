<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SeriesFromRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:100']
        ];
    }

        public function messages(): array
        {
            return [
                'name.required' => 'O campo nome é obrigatório.',
                'name.min' => 'O campo nome deve conter no mínimo :min caracteres.',
                'name.max' => 'O campo nome deve conter no máximo :max caracteres.'
            ];
        }       
}
