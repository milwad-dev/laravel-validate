<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCreditCard implements Rule
{
    /**
     * Check if the credit card number is valid using the Luhn algorithm.
     */
    public function passes($attribute, $value): bool
    {
        $value = preg_replace('/\D/', '', $value);

        $numLength = strlen($value);
        $sum = 0;
        $reverse = strrev($value);

        for ($i = 0; $i < $numLength; $i++) {
            $currentNum = intval($reverse[$i]);
            if ($i % 2 == 1) {
                $currentNum *= 2;
                if ($currentNum > 9) {
                    $currentNum -= 9;
                }
            }
            $sum += $currentNum;
        }

        return $sum % 10 == 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.credit-card');
    }
}
