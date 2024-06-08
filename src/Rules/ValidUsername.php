<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidUsername implements Rule
{
    /**
     * It checks that the length of the username must be between 3 and 15 characters without spaces.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^[a-z0-9_-]{3,15}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.username');
    }
}
