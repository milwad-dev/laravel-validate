<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidJwt implements Rule
{
    /**
     * Check jwt is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^[a-zA-Z0-9-_]+\.[a-zA-Z0-9-_]+\.[a-zA-Z0-9-_]+$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.jwt');
    }
}
