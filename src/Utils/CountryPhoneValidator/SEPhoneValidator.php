<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class SEPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Sweden phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+46|0) ?(?:[1-9]\d{1,2}-?\d{2}(?:\s?\d{2}){2}|7\d{2}-?\d{2}(?:\s?\d{2}){2})$/', $value);
    }
}
