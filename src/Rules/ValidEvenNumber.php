<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidEvenNumber implements Rule
{
    /**
     * Check number is even.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^\d*[02468]$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.even-number');
    }
}
