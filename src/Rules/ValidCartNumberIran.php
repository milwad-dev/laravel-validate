<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCartNumberIran implements ValidationRule
{
    /**
     * Check cart number is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isCartNumberValid($value)) {
            $fail('validate.cart-number-iran')->translate();
        }
    }

    /**
     * Check cart number validity.
     *
     * @param $value
     * @return bool
     */
    private function isCartNumberValid($value): bool
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
}
