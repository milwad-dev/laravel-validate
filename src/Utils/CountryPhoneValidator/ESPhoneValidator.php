<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class ESPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Spain phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+34|0034|34)?[6789]\d{8}$/', $value);
    }
}
