<?php

namespace Milwad\LaravelValidate\Traits;

trait IbanTrait
{
    /**
     * Set value of $countries property.
     *
     * @return void
     */
    private function setCountries(array|null $countries)
    {
        if (empty($countries)) {
            $this->countries = [];

            return;
        }

        if (is_array($countries[0])) {
            $countries = $countries[0];
        }

        foreach ($countries as $country) {
            $this->countries[] = $country;
        }
    }


    /**
     * Check IBAN is valid.
     *
     * @return bool
     */
    private function isIbanValid(string $iban)
    {
        if (! $this->checkIbanFormat($iban)) {
            return false;
        }

        /*
         * Connect Iban title with value (code) ex: 8330001234567NO .
         */
        $parsedIban = substr($iban, 4).substr($iban, 0, 4);

        /*
         * Replace iban value with character map.
         */
        $parsedIban = strtr($parsedIban, $this->characterMap);

        return bcmod($parsedIban, '97') === '1';
    }

    /**
     * Check IBAN format is valid.
     *
     * @return bool
     */
    private function checkIbanFormat(string $iban)
    {
        if (empty($iban)) {
            return false;
        }

        $ibanCountryCode = $this->getIbanCountryCode($iban);

        return !(empty($this->checkIfBcmodIsAvailable())
            || !$this->twoFirstCharactersValid($ibanCountryCode)
            || !$this->isCountriesValid($ibanCountryCode)
            || !$this->isIbanLengthValid($iban, $ibanCountryCode));
    }

    /**
     * Get IBAN country code.
     *
     * @return string
     */
    private function getIbanCountryCode(string $iban)
    {
        return substr($iban, 0, 2);
    }

    /**
     * Check if bcmod function is available.
     *
     * @return bool
     */
    private function checkIfBcmodIsAvailable()
    {
        return function_exists('bcmod');
    }

    /**
     * Check two first character's validity.
     *
     * @return bool
     */
    private function twoFirstCharactersValid(string $countryCode)
    {
        return !empty($countryCode) && ctype_alpha($countryCode);
    }

    /**
     * Check countries of the IBAN.
     *
     * @return bool
     */
    private function isCountriesValid(string $ibanCountryCode)
    {
        if (empty($this->countries)) {
            return true;
        }

        foreach ($this->countries as $country) {
            if ($this->isCountryValid($country, $ibanCountryCode)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check country of the IBAN.
     *
     * @return bool
     */
    private function isCountryValid(string $country, string $ibanCountryCode)
    {
        return ! empty($country)
            && isset($this->ibanLengthByCountry[$country])
            && $ibanCountryCode === $country;
    }

    /**
     * Check country of the IBAN.
     *
     * @return bool
     */
    private function isIbanLengthValid(string $iban, string $ibanCountryCode)
    {
        return strlen($iban) === $this->ibanLengthByCountry[$ibanCountryCode];
    }
}
