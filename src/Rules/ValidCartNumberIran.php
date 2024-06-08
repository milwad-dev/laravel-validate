<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCartNumberIran implements Rule
{
    /**
     * Check cart number is valid.
     */
    public function passes($attribute, $value): bool
    {
        $cardToArr = str_split($value);
        $cardTotal = 0;
        for ($i = 0; $i < 16; $i++) {
            $c = (int) $cardToArr[$i];
            if ($i % 2 === 0) {
                $cardTotal += (($c * 2 > 9) ? ($c * 2) - 9 : ($c * 2));
            } else {
                $cardTotal += $c;
            }
        }

        return $cardTotal % 10 === 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validate.cart-number-iran');
    }
}
