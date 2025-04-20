<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

class SELandlineValidator implements CountryLandlineValidator
{
    /**
     * Validate Sweden landline numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:(?:\+46|0046)[\s\-]?0?[1-9]\d{1,3}\d{5,8}|0[1-9]\d{1,3}\d{5,8})$/', $value);
    }
}
