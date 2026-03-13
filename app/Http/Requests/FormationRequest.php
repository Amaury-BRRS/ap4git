<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
            'libelle' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé de la formation est requis.',
            'libelle.string' => 'Le libellé doit être une chaîne de caractères.',
            'libelle.max' => 'Le libellé ne doit pas dépasser 255 caractères.',
        ];
    }
}
