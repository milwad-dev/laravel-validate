<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCreditCard implements ValidationRule
{
    /**
     * Check if the credit card number is valid using the Luhn algorithm.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isCreditCardValid($value)) {

            $fail('validate.credit-card')->translate();
        }
    }

    /**
     * Check if credit card number is valid using th Luhn algorithm
     *
     * @param mixed $value
     * @return bool
     */
    private function isCreditCardValid(mixed $value): bool
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
}
