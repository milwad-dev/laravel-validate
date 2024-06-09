<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

interface CountryPhoneValidator
{
    public function validate($value): bool;
}
