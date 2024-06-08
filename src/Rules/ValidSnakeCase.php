<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidSnakeCase implements Rule
{
    /**
     * Check value is snake case.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:\p{Ll}+_)*\p{Ll}+$/u', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.snake-case');
    }
}
