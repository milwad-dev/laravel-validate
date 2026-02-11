<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class ESLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Spain landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+34|0034)?\s?[89]\d{8})$/', $value);
    }
}
