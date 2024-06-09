<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class ZHPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Chinese phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+86)?1[3-9]\d{9}$/', $value);
    }
}
