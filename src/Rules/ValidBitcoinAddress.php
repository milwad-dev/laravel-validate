<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidBitcoinAddress implements Rule
{
    /**
     * Check bitcoin address.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(bc1|[13])[a-zA-HJ-NP-Z0-9]{25,39}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.bitcoin-address');
    }
}
