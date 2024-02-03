<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidEvenNumber implements ValidationRule
{
    /**
     * Check number is even.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^\d*[02468]$/', $value)) {

            $fail('validate.even-number')->translate();
        }
    }
}
