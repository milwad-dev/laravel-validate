<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCarNumber implements Rule
{
    /**
     * Check car number is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.car-number');
    }
}
