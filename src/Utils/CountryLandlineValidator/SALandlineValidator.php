<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class SALandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Saudi Arabia landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+966|00966)[\s\-]?1\d{7}|01\d{7})$/', $value);
    }
}
