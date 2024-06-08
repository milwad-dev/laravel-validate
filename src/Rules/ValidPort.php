<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPort implements Rule
{
    /**
     * Check port is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([0-5]{0,5})|([0-9]{1,4}))$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.port');
    }
}
