<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class ITLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Italy landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+39|0039)[\s\-]?0\d{5,10}|0\d{5,10})$/', $value);
    }
}
