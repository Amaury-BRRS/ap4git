<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtablissementRequest extends FormRequest
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
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'code_postal' => 'required|numeric|digits:5',
            'email' => 'required|string|lowercase|email|max:255',
            'telephone' => 'required|string|max:14',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le nom de l\'établissement est requis.',
            'adresse.required' => 'L\'adresse de l\'établissement est requise.',
            'ville.required' => 'La ville de l\'établissement est requise.',
            'code_postal.required' => 'Le code postal de l\'établissement est requis.',
            'code_postal.numeric' => 'Le code postal doit être un nombre.',
            'code_postal.digits' => 'Le code postal doit comporter exactement 5 chiffres.',
            'email.required' => 'L\'email de l\'établissement est requis.',
            'email.string' => 'L\'email doit être une chaîne de caractères.',
            'email.lowercase' => 'L\'email doit être en minuscules.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
            'telephone.required' => 'Le numéro de téléphone de l\'établissement est requis.',
            'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser 14 caractères.',
        ];
    }
}
