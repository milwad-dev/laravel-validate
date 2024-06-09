<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class INPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate India phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+|0{0,2})91(\s|-)?)?[6789]\d{9}$/', $value);
    }
}
