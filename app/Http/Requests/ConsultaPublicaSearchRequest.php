<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaPublicaSearchRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'proprietario' => ['sometimes', 'string'],
            'criador' => ['sometimes', 'string'],
            'serie' => ['sometimes'],
            'rgn' => ['sometimes'],
            'rgd' => ['sometimes'],
            'mae_serie' => ['sometimes', 'string'],
            'pai_serie' => ['sometimes', 'string'],
            'mae_rgd' => ['sometimes', 'string'],
            'pai_rgd' => ['sometimes', 'string'],
            'mae_rgn' => ['sometimes', 'string'],
            'pai_rgn' => ['sometimes', 'string'],
            'raca' => ['sometimes'],
            'categoria' => ['sometimes'],
            'variedade' => ['sometimes'],
            'central' => ['sometimes'],
            'rep_prog' => ['sometimes'],
            'situacao' => ['sometimes', 'in:Inativo,Ativo'],
            'dt_nasc' => ['sometimes', 'date'],
            'dt_nasc_final' => ['sometimes', 'date'],
            'per_page' => ['sometimes'],
        ];
    }
}
