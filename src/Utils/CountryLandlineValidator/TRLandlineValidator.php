<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

use Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class TRLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Turkey landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+90|0090)[\s\-]?2\d{9}|0?2\d{9})$/', $value);
    }
}
