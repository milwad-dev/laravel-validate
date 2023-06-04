<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCapitalCharWithNumber implements ValidationRule
{
    /**
     * Check all words are capital & with hyphen & number.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/[A-Z]{2,}-\d+/', $value)) {
            $fail('validate.capital-char-with-number')->translate();
        }
    }
}
