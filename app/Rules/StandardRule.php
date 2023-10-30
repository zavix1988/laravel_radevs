<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class StandardRule implements ValidationRule
{


    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $estimation = request('estimation');
        $standard = 0;

        if($estimation <= 60) {
            $standard = 100;
        } else if($estimation <= 80) {
            $standard = 200;
        } else if ($estimation <= 99) {
            $standard = 300;
        } else {
            $standard = 500;
        }

        if ($value !== $standard) {
            $fail('The :attribute is not valid.');
        }
    }
}
