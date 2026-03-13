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
}
