<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class ZHLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate China landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+86|0086)[\s\-]?0?[1-9]\d{1,2}\d{6,8}|0[1-9]\d{1,2}\d{6,8})$/', $value);
    }
}
