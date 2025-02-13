<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidEvenNumber implements Rule
{
    /**
     * Check number is even.
     */
    public function passes($attribute, $value): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        $number = strval($value);
        $number = explode('.', $number);

        if (isset($number[1]) && $number[1] != 0) {
            return false;
        }

        $number = $number[0];

        if (extension_loaded('gmp')) {
            return gmp_cmp(gmp_mod($number, '2'), '0') === 0;
        }

        return $number % 2 === 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.even-number');
    }
}
