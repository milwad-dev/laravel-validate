<?php

namespace Milwad\LaravelValidate\Utils;

use RuntimeException;

class CountryLandlineCallback
{
    /**
     * Country Validate classes.
     */
    protected static array $validators = [];

    /**
     * Add new country validator.
     *
     * @throws \Throwable
     */
    public static function addValidator(string $code, string $validator): void
    {
        if (! new $validator instanceof CountryLandlineValidator) {
            throw new RuntimeException('The validator is not instance of CountryLandlineValidator');
        }

        self::$validators[$code] = $validator;
    }

    /**
     * Call country validate class.
     */
    public static function callLandlineValidator(string $code, $value)
    {
        if (isset(self::$validators[$code])) {
            return (new self::$validators[$code])->validate($value);
        } else {
            throw new \BadMethodCallException("Validator method for '$code' does not exist.");
        }
    }
}
