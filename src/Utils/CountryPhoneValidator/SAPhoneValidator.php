<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class SAPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate English phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^((\+966)|0)?5\d{8}$/', $value);
    }
}
