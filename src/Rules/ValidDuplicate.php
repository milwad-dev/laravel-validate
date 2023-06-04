<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDuplicate implements ValidationRule
{
    /**
     * Check duplicate value.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! collect(str_split($value))->duplicates()->isEmpty()) {
            $fail('validate.duplicate')->translate();
        }
    }
}
