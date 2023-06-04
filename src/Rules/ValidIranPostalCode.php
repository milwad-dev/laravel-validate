<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidIranPostalCode implements ValidationRule
{

    /**
     * Check postal code is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}$/', $value)) {
            $fail('validate.postal-code')->translate();
        }
    }
}
