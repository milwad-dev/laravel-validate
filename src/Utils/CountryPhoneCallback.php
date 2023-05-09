<?php

namespace Milwad\LaravelValidate\Utils;

class CountryPhoneCallback
{
    /**
     * Create a new phone validator instance.
     *
     * @param mixed $value The phone number to validate.
     * @param string $code The country codes to validate against. String can be separated by comma
     * @param string|null $attribute
     */
    public function __construct(protected $value, protected string $code, $attribute = null)
    {
    }



    protected function validateBJ(): bool
    {
        return preg_match('/^(\+229|00229|229)?\d{8}$/', $this->value);
    }

    /**
     * Call the phone validator method for each country code and return the results.
     *
     * @throws \BadMethodCallException if the validator method for a country code does not exist.
     *
     * @return array An array of validation results, where each key is a country code and the value is either `true` or `false`.
     */
    public function callPhoneValidator(): array
    {
        $results = [];

        $codes = explode(',', $this->code);

        $codes = array_map('strtoupper', $codes);

        foreach ($codes as $code) {
            $methodName = 'validate' . $code;

            if (method_exists($this, $methodName)) {
                $results[$code] = $this->{$methodName}();
            } else {
                throw new \BadMethodCallException("Validator method '{$methodName}' does not exist.");
            }
        }

        return $results;
    }
}
