<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidBase64 implements Rule
{
    /**
     * Check base64.
     */
    public function passes($attribute, $value): bool
    {
        return base64_encode(base64_decode($value, true)) === $value;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.base64');
    }
}
