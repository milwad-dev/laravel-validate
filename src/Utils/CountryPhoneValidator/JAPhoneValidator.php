<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class JAPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Japanese phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/(\d{2,3})-?(\d{3,4})-?(\d{4})/', $value);
    }
}
