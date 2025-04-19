<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class RULandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Russia landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+7|007|8)[\s\-]?[3-6,8,9]\d{2}\d{6,7})$/', $value);
    }
}
