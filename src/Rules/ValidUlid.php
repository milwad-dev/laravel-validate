<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUlid implements ValidationRule
{
    /**
     * Check ulid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/[0-7][0-9A-HJKMNP-TV-Z]{25}/', $value)) {

            $fail('validate.ulid')->translate();
        }
    }
}
