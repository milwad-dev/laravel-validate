<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class GRPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Greece phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^\+30[2-9]\d{2}\d{3}\d{4}$/', $value);
    }
}
