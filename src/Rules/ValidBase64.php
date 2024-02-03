<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBase64 implements ValidationRule
{
    /**
     * Check base64.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (base64_encode(base64_decode($value, true)) !== $value) {

            $fail('validate.base64')->translate();
        }
    }
}
