<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidSlashEndOfString implements ValidationRule
{
    /**
     * Check write slash at the end of string.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/\/+$/', $value)) {

            $fail('validate.slash-end-of-string')->translate();
        }
    }
}
