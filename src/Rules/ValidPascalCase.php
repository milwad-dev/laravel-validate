<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPascalCase implements Rule
{
    /**
     * Check pascal-case is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^[A-Z][a-z]+(?:[A-Z][a-z]+)*$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.pascal-case');
    }
}
