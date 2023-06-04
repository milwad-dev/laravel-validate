<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDuplicateCharacter implements ValidationRule
{
    /**
     * Check duplicate characters, splitted by comma.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = explode(',', $value);

        if (! collect($value)->duplicates()->isEmpty()) {
            $fail('validate.duplicate_character')->translate();
        }
    }
}
