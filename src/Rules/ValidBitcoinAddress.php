<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidBitcoinAddress implements ValidationRule
{
    /**
     * Check bitcoin address.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^(?:bc1|[13])[a-zA-HJ-NP-Z0-9]{25,39}$/', $value)) {

            $fail('validate.bitcoin-address')->translate();
        }
    }
}
