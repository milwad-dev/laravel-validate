<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidKebabCase implements Rule
{
    /**
     * Check value is kebab case.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:\p{Ll}+\-)*\p{Ll}+$/u', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.kebab-case');
    }
}
