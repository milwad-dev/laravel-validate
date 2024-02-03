<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDuplicateCharacter implements ValidationRule
{
    /**
     * Check duplicate characters, separated by comma.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (collect(explode(',', $value))->duplicates()->isNotEmpty()) {

            $fail('validate.duplicate_character')->translate();
        }
    }
}
