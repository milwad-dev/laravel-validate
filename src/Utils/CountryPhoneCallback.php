<?php

namespace Milwad\LaravelValidate\Utils;

class CountryPhoneCallback
{
    /**
     * Create a new phone validator instance.
     *
     * @param  mixed  $value The phone number to validate.
     * @param  string  $code The country codes to validate against. String can be separated by comma
     * @param  string|null  $attribute
     */
    public function __construct(protected $value, protected string $code, $attribute = null)
    {
    }

    protected function validateTG()
    {
        return preg_match('/^(?:\+228|00228|228)?\d{8}$/', $this->value);
    }

    protected function validateNE()
    {
        return preg_match('/^(?:\+227|00227|227)?\d{8}$/', $this->value);
    }

    protected function validateGW()
    {
        return preg_match('/^(?:\+245|00245|245)?\d{7,8}$/', $this->value);
    }

    protected function validateTD()
    {
        return preg_match('/^(?:\+235|00235|235)?\d{8}$/', $this->value);
    }

    protected function validateCM()
    {
        return preg_match('/^(?:\+237|00237|237)?\d{8}$/', $this->value);
    }

    protected function validateBF()
    {
        return preg_match('/^(?:\+226|00226|226)?\d{8}$/', $this->value);
    }

    protected function validateAO(): bool
    {
        return preg_match('/^(?:\+244|00244|244)?[9,2][1-9]\d{7}$/', $this->value);
    }

    protected function validateBJ(): bool
    {
        return preg_match('/^(?:\+229|00229|229)?\d{8}$/', $this->value);
    }

    /**
     * Call the phone validator method for each country code and return the results.
     *
     * @return array An array of validation results, where each key is a country code and the value is either `true` or `false`.
     *
     * @throws \BadMethodCallException if the validator method for a country code does not exist.
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
