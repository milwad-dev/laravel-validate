<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class SALandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Saudi Arabia landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^((?:[+?0?0?966]+)(?:\s?\d{2})(?:\s?\d{7}))$/', $value);
    }
}
