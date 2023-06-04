<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPascalCase implements ValidationRule
{
    /**
     * Check pascal-case.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^[A-Z][a-z]+(?:[A-Z][a-z]+)*$/', $value)) {
            $fail('validate.pascal-case')->translate();
        }
    }
}
