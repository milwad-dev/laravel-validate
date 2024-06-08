<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidSlashEndOfString implements Rule
{
    /**
     * Check write slash at the end of string.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/\/+$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.slash-end-of-string');
    }
}
