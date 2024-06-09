<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class RUPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Russian phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^(?:\+7|8)(?:\s?\(?\d{3}\)?\s?\d{3}(?:-?\d{2}){2}|\s?\d{2}(?:\s?\d{2}){3})$/', $value);
    }
}
