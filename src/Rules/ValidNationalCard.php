<?php

namespace Milwad\LaravelValidate\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidNationalCard implements ValidationRule
{
    /**
     * Check national card is valid.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isNationalCardValid($value)) {

            $fail('validate.national-card')->translate();
        }
    }

    /**
     * Check if national card is valid
     *
     * @param mixed $value
     * @return bool
     */
    private function isNationalCardValid(mixed $value): bool
    {
        if (! preg_match('/^\d{10}$/', $value)) {
            return false;
        }

        for ($i = 0; $i < 10; $i++) {
            if (preg_match('/^'.$i.'{10}$/', $value)) {
                return false;
            }
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
}
