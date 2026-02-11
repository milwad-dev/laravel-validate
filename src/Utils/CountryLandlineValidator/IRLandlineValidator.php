<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class IRLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Iran landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:98|\+98|0098|0)?[1-8]{1}\d{9}$/', $value);
    }
}
