<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class IDPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Indonesia phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+62|0)(?:\d{2,3}\s?){1,2}\d{4,8}$/', $value);
    }
}
