<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class FRPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate France phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+33|0033|0)(?:[1-9](?:\d{2}){4}|[67]\d{8})$/', $value);
    }
}
