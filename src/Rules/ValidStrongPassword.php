<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidStrongPassword implements Rule
{
    /**
     * Check password started by capital letters & contains lowercase letters & contains number.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{6,}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.strong-password');
    }
}
