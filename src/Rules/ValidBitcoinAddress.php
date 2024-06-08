<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidBitcoinAddress implements Rule
{
    /**
     * Check bitcoin address is valid.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?:bc1|[13])[a-zA-HJ-NP-Z0-9]{25,39}$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.bitcoin-address');
    }
}
