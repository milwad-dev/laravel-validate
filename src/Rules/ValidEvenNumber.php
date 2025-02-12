<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidEvenNumber implements Rule
{
    /**
     * Check number is even.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $number = strval($value);
        $number = explode('.', $number);

        if (isset($number[1])) {
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
     *
     * @return string
     */
    public function message()
    {
        return __('validate.even-number');
    }
}
