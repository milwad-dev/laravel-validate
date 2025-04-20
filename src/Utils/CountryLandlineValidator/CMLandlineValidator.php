<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class CMLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Cameroon landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+237|00237)[\s-]?2\d{8}|2\d{8})$/', $value);
    }
}
