<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class NLPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Netherlands mobile phone numbers (06 followed by 8 digits).
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+31|0031)[\s\-]?|0)6[\s\-]?\d{8}$/', $value);
    }
}
