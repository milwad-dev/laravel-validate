<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCarNumber implements ValidationRule
{
    /**
     * Check car number is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $value)) {
            $fail('validate.car-number')->translate();
        }
    }
}
