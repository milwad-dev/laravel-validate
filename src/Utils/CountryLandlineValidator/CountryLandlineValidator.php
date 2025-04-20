<?php

namespace Milwad\LaravelValidate\Utils\CountryLandlineValidator;

interface CountryLandlineValidator
{
    public function validate($value): bool;
}
