<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCapitalCharWithNumber implements Rule
{
    /**
     * Check all words are capital & with hyphen & number.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/[A-Z]{2,}-\d+/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.capital-char-with-number');
    }
}
