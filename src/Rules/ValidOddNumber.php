<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidOddNumber implements Rule
{
    /**
     * Check number is odd.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^\d*[13579]$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.odd-number');
    }
}
