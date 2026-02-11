<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class JALandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Japan landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+81|0081)[\s\-]?0?[1-9]\d{1,3}\d{4,6}|0[1-9]\d{1,3}\d{4,6})$/', $value);
    }
}
