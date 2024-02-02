<?php

namespace Milwad\LaravelValidate\Utils;

class CountryPhoneCallback
{
    /**
     * Create a new phone validator instance.
     *
     * @param  mixed  $value  The phone number to validate.
     * @param  string  $code  The country codes to validate against. String can be separated by comma
     */
    public function __construct(private mixed $value, private string $code, ?string $attribute = null)
    {
    }

    // TODO: Add a feature to add validate method for your own country!

    /**
     * Validate Iran phone number.
     *
     * @return false|int
     */
    protected function validateIR()
    {
        return preg_match('/^(\+98|0)?9\d{9}$/', $this->value);
    }

    /**
     * Validate Iran phone number.
     *
     * @return false|int
     */
    protected function validateEN()
    {
        return preg_match('/^(?:\+44|0)7\d{9}$/', $this->value);
    }

    /**
     * Validate Nigeria phone number.
     *
     * @return false|int
     */
    protected function validateNE()
    {
        return preg_match('/^(\+227|00227|227)?\d{8}$/', $this->value);
    }

    /**
     * Validate Saudi Arabia phone number.
     *
     * @return false|int
     */
    protected function validateSA()
    {
        return preg_match('/^((\+966)|0)?5\d{8}$/', $this->value);
    }

    /**
     * Validate Germany phone number.
     *
     * @return false|int
     */
    protected function validateDE()
    {
        return preg_match('/^((\+49)|(0))(1|15|16|17|19|30|31|32|33|34|40|41|42|43|44|49|151|152|153|155|156|157|159|160|162|163|180|181|182|183|184|185|186|187|188|170|171|172|173|174|175|176|177|178|179)\d{7,8}$/', $this->value);
    }

    /**
     * Validate Greece phone number.
     *
     * @return false|int
     */
    protected function validateGR()
    {
        return preg_match('/^\+30[2-9]\d{2}\d{3}\d{4}$/', $this->value);
    }

    /**
     * Validate Spain phone number.
     *
     * @return false|int
     */
    protected function validateES()
    {
        return preg_match('/^(?:\+34|0034|34)?[6789]\d{8}$/', $this->value);
    }

    /**
     * Validate France phone number.
     *
     * @return false|int
     */
    protected function validateFR()
    {
        return preg_match('/^(?:\+33|0033|0)(?:(?:[1-9](?:\d{2}){4})|(?:[67]\d{8}))$/', $this->value);
    }

    /**
     * Validate India phone number.
     *
     * @return false|int
     */
    protected function validateIN()
    {
        return preg_match('/^(?:(?:\+|0{0,2})91(\s|-)?)?[6789]\d{9}$/', $this->value);
    }

    /**
     * Validate Indonesia phone number.
     *
     * @return false|int
     */
    protected function validateID()
    {
        return preg_match('/^(?:\+62|0)(?:\d{2,3}\s?){1,2}\d{4,8}$/', $this->value);
    }

    /**
     * Validate Italy phone number.
     *
     * @return false|int
     */
    protected function validateIT()
    {
        return preg_match('/^\+39\d{8,10}$/', $this->value);
    }

    /**
     * Validate Japanese phone number.
     *
     * @return false|int
     */
    protected function validateJA()
    {
        return preg_match('/(\d{2,3})-?(\d{3,4})-?(\d{4})/', $this->value);
    }

    /**
     * Validate Korean phone number.
     *
     * @return false|int
     */
    protected function validateKO()
    {
        return preg_match('/^(?:\+82|0)(?:10|1[1-9])-?\d{3,4}-?\d{4}$/', $this->value);
    }

    /**
     * Validate Russian phone number.
     *
     * @return false|int
     */
    protected function validateRU()
    {
        return preg_match('/^(?:\+7|8)(?:\s?\(?\d{3}\)?\s?\d{3}(?:-?\d{2}){2}|\s?\d{2}(?:\s?\d{2}){3})$/', $this->value);
    }

    /**
     * Validate Sweden phone number.
     *
     * @return false|int
     */
    protected function validateSE()
    {
        return preg_match('/^(?:\+46|0) ?(?:[1-9]\d{1,2}-?\d{2}(?:\s?\d{2}){2}|7\d{2}-?\d{2}(?:\s?\d{2}){2})$/', $this->value);
    }

    /**
     * Validate Turkey phone number.
     *
     * @return false|int
     */
    protected function validateTR()
    {
        return preg_match('/^(?:\+90|0)(?:\s?[1-9]\d{2}\s?\d{3}\s?\d{2}\s?\d{2}|[1-9]\d{2}-?\d{3}-?\d{2}-?\d{2})$/', $this->value);
    }

    /**
     * Validate Chinese phone number.
     *
     * @return false|int
     */
    protected function validateZH()
    {
        return preg_match('/^(?:\+86)?1[3-9]\d{9}$/', $this->value);
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
            $methodName = 'validate'.$code;

            if (method_exists($this, $methodName)) {
                $results[$code] = $this->{$methodName}();
            } else {
                throw new \BadMethodCallException("Validator method '{$methodName}' does not exist.");
            }
        }

        return $results;
    }
}
