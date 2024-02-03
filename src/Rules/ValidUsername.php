<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUsername implements ValidationRule
{
    /**
     * It checks that the length of the username must be between 3 and 15 characters without spaces.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^[a-z0-9_-]{3,15}$/', $value)) {

            $fail('validate.username')->translate();
        }
    }
}
