<?php

namespace Milwad\LaravelValidate\Utils;

use Milwad\LaravelValidate\Utils\CountryPhoneValidator\CountryPhoneValidator;

class CountryPhoneCallback
{
    /**
     * Country Validate classes.
     *
     * @var array
     */
    protected array $validators = [];

    /**
     * Validate  phone number.
     */
    protected function validateGR(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateES(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateFR(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate India phone number.
     */
    protected function validateIN(): false|int
    {
        return preg_match('/^(?:(?:\+|0{0,2})91(\s|-)?)?[6789]\d{9}$/', $this->value);
    }

    /**
     * Validate Indonesia phone number.
     */
    protected function validateID(): false|int
    {
        return preg_match('/^(?:\+62|0)(?:\d{2,3}\s?){1,2}\d{4,8}$/', $this->value);
    }

    /**
     * Validate Italy phone number.
     */
    protected function validateIT(): false|int
    {
        return preg_match('/^\+39\d{8,10}$/', $this->value);
    }

    /**
     * Validate Japanese phone number.
     */
    protected function validateJA(): false|int
    {
        return preg_match('/(\d{2,3})-?(\d{3,4})-?(\d{4})/', $this->value);
    }

    /**
     * Validate Korean phone number.
     */
    protected function validateKO(): false|int
    {
        return preg_match('/^(?:\+82|0)(?:10|1[1-9])-?\d{3,4}-?\d{4}$/', $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateRU(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateSE(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateTR(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Validate  phone number.
     */
    protected function validateZH(): false|int
    {
        return preg_match(, $this->value);
    }

    /**
     * Add new country validator
     */
    public function addValidator(string $code, CountryPhoneValidator $validator): void
    {
        $this->validators[$code] = $validator;
    }

    /**
     * Call country validate class.
     */
    public function callPhoneValidator(string $code, $value)
    {
        if (isset($this->validators[$code])) {
            return $this->validators[$code]->validate($value);
        } else {
            throw new \BadMethodCallException("Validator method for '$code' does not exist.");
        }
    }
}
