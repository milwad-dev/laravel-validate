<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidHexColor implements ValidationRule
{
    /**
     * Check hex color is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^#?(?:[a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $value)) {

            $fail('validate.hex-color')->translate();
        }
    }
}
