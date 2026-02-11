<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class DELandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Germany landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+49|0049)[\s\-]?[2-9]\d{1,4}[\s\-]?\d{3,8}|0[2-9]\d{1,4}[\s\-]?\d{3,8})$/', $value);
    }
}
