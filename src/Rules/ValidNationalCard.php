<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidNationalCard implements Rule
{
    /**
     * Check national card is valid.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! preg_match('/^\d{10}$/', $value)) {
            return false;
        }

        if (preg_match('/^(.)\1*$/u', $value)) {
            return false;
        }

        for ($i = 0, $sum = 0; $i < 9; $i++) {
            $sum += ((10 - $i) * intval(substr($value, $i, 1)));
            $ret = $sum % 11;
            $parity = intval(substr($value, 9, 1));
            if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.national-card');
    }
}
