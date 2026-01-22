<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UpperCase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // On vérifie si la valeur en majuscule est identique à la valeur entrée 
        if (strtoupper($value) !== $value) {
            // Si ce n'est pas le cas, on déclenche l'erreur ici (remplace la méthode message() du cours)
            $fail('Veuillez entrer un nom en majuscule.');
        }
    }
}

