<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class KOLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate South Korean landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+82|0082)[\s\-]?0?[2-6]\d{1,2}\d{6,8}|0[2-6]\d{1,2}\d{6,8})$/', $value);
    }
}
