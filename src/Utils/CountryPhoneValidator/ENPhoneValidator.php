<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class ENPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate English phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+44|0)7\d{9}$/', $value);
    }
}
