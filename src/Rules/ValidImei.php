<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidImei implements Rule
{
    /**
     * Check IMEI is valid.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $imei = $value;

        if (strlen($imei) != 15 || ! ctype_digit($imei)) {
            return false;
        }

        $digits = str_split($imei); // Get digits
        $imei_last = array_pop($digits); // Remove last digit, and store it
        $log = [];

        foreach ($digits as $key => $n) {
            if ($key & 1) {
                $double = str_split($n * 2); // Get double digits
                $n = array_sum($double); // Sum double digits
            }

            $log[] = $n; // Append log
        }
        $sum = array_sum($log) * 9; // Sum log & multiply by 9

        return substr($sum, -1) === $imei_last;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.imei');
    }
}
