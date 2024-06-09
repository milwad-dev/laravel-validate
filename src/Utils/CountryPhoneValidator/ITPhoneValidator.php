<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class ITPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Italy phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^\+39\d{8,10}$/', $value);
    }
}
