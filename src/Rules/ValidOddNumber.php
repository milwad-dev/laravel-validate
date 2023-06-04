<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidOddNumber implements ValidationRule
{
    /**
     * Check number is odd.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^\d*[13579]$/', $value)) {
            $fail('validate.odd-number')->translate();
        }
    }
}
