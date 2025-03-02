<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class CMPhoneValidator implements CountryPhoneValidator
{
    public function validate($value): bool
    {
        return preg_match('/^(?:\+237|00237|237)?[26][256789][0-9]{7}$/', $value);
    }
}
