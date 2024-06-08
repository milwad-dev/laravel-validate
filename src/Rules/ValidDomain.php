<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDomain implements Rule
{
    /**
     * Check domain name is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.domain');
    }
}
