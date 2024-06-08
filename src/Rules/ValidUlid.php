<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidUlid implements Rule
{
    /**
     * Check ulid is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/[0-7][0-9A-HJKMNP-TV-Z]{25}/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.ulid');
    }
}
