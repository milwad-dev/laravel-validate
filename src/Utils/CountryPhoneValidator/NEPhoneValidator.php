<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class NEPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Niger phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(\+227|00227|227)?\d{8}$/D', $value);
    }
}
