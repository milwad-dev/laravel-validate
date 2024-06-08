<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class IRPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Iran phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(\+98|0)?9\d{9}$/', $value);
    }
}
