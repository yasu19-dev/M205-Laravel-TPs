<?php

namespace App\Http\Requests;
use App\Rules\UpperCase;

use Illuminate\Foundation\Http\FormRequest;

class StagiaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
{
    return true; // Important : changer false en true
}

public function rules()
{
    return [
        'nom' => ['required', 'unique:stagiaires', new UpperCase()],
        'prenom' => 'required',
        'age' => 'required|numeric|between:17,30',
    ];
}

public function messages() {
    // Ajouter les messages personnalisés
    return [
        'nom.required' => 'Veuillez Entrez Le :attribute',
        'age.required' => "Veuillez Entrez l':attribute"
    ];
}
}
