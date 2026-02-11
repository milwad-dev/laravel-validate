<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class IDLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Indonesia landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+62|0062)[\s\-]?21\d{7,8}|(?:\+62|0062)[\s\-]?[2-9]\d{1,3}\d{5,8}|0[2-9]\d{1,3}\d{5,8})$/', $value);
    }
}
