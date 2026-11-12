<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class NLLandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Netherlands landline numbers (2 or 3 digit area code, 9 digits in total without the leading 0).
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+31|0031)[\s\-]?|0)(?=[1-57]|8[58])(?:\d{2}[\s\-]?\d{7}|\d{3}[\s\-]?\d{6})$/D', $value);
    }
}
