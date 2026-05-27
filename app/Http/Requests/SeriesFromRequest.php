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

        public function mensagem(): array
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'name.min' => 'O campo nome deve conter no mínimo :min caracteres.',
        'name.max' => 'O campo nome deve conter no máximo :max caracteres.',

        'seasonsQty.required' => 'Informe o número de temporadas.',
        'seasonsQty.integer' => 'Temporadas deve ser um número.',
        'seasonsQty.min' => 'Deve ter pelo menos 1 temporada.',

        'episodesPerSeason.required' => 'Informe os episódios por temporada.',
        'episodesPerSeason.integer' => 'Episódios deve ser um número.',
        'episodesPerSeason.min' => 'Deve ter pelo menos 1 episódio.',
    ];
}
}
