<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class KOPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Korean phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+82|0)(?:10|1[1-9])-?\d{3,4}-?\d{4}$/', $value);
    }
}
