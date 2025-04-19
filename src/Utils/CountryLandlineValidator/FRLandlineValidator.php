<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class FRLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate France landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+33|0033)\s?[1-5]\d{8}|0[1-5]\d{8})$/', $value);
    }
}
