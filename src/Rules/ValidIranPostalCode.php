<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIranPostalCode implements Rule
{
    /**
     * Check postal code is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.postal-code');
    }
}
