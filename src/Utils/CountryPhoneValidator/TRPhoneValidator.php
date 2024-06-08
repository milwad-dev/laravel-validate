<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class TRPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Turkey phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+90|0)(?:\s?[1-9]\d{2}\s?\d{3}\s?\d{2}\s?\d{2}|[1-9]\d{2}-?\d{3}-?\d{2}-?\d{2})$/', $value);
    }
}
