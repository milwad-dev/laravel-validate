<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class INLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate India landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+91|0091)[\s\-]?0?[1-6]\d{1,4}\d{6,8}|0[1-6]\d{1,4}\d{6,8})$/', $value);
    }
}
