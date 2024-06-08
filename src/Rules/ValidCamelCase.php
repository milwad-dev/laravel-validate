<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCamelCase implements Rule
{
    /**
     * Check value is camel case.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:\p{Lu}?\p{Ll}+)(?:\p{Lu}\p{Ll}+)*$/u', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.camel-case');
    }
}
