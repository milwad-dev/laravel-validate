<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class NELandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Niger landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+227|00227)[\s\-]?(20|21|25|27)\d{6}|(20|21|25|27)\d{6})$/', $value);
    }
}
