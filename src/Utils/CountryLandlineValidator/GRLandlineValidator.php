<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class GRLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Greece landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+30|0030)\s?[2]\d{9}|0[2]\d{9})$/', $value);
    }
}
