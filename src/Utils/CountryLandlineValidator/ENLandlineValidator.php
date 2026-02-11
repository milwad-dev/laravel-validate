<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class ENLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate England landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+44|0044)\s?(?:1\d{9}|2\d{9})|0(?:1\d{9}|2\d{9}))$/', $value);
    }
}
