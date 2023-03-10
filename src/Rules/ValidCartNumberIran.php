<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCartNumberIran implements Rule
{
    /**
     * Check cart number is valid.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
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
     *
     * @return string
     */
    public function message()
    {
        return __('validate.cart-number-iran');
    }
}
