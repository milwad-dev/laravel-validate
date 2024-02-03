<?php

namespace Milwad\LaravelValidate\Traits;

trait IbanTrait
{
    /**
     * Set value of $countries property.
     *
     * @param array|null $countries
     * @return void
     */
    private function setCountries(?array $countries): void
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
     * @param string $iban
     * @return bool
     */
    private function isIbanValid(string $iban): bool
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
     * @param string $iban
     * @return bool
     */
    private function checkIbanFormat(string $iban): bool
    {
        if (empty($iban)) {
            return false;
        }

        $ibanCountryCode = $this->getIbanCountryCode($iban);

        return ! (empty($this->checkIfBcmodIsAvailable())
            || ! $this->twoFirstCharactersValid($ibanCountryCode)
            || ! $this->isCountriesValid($ibanCountryCode)
            || ! $this->isIbanLengthValid($iban, $ibanCountryCode));
    }

    /**
     * Get IBAN country code.
     *
     * @param string $iban
     * @return string
     */
    private function getIbanCountryCode(string $iban): string
    {
        return substr($iban, 0, 2);
    }

    /**
     * Check if bcmod function is available.
     *
     * @return bool
     */
    private function checkIfBcmodIsAvailable(): bool
    {
        return function_exists('bcmod');
    }

    /**
     * Check two first character's validity.
     *
     * @param string $countryCode
     * @return bool
     */
    private function twoFirstCharactersValid(string $countryCode): bool
    {
        return ! empty($countryCode) && ctype_alpha($countryCode);
    }

    /**
     * Check countries of the IBAN.
     *
     * @param string $ibanCountryCode
     * @return bool
     */
    private function isCountriesValid(string $ibanCountryCode): bool
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
     * @param string $country
     * @param string $ibanCountryCode
     * @return bool
     */
    private function isCountryValid(string $country, string $ibanCountryCode): bool
    {
        return ! empty($country)
            && isset($this->ibanLengthByCountry[$country])
            && $ibanCountryCode === $country;
    }

    /**
     * Check country of the IBAN.
     *
     * @param string $iban
     * @param string $ibanCountryCode
     * @return bool
     */
    private function isIbanLengthValid(string $iban, string $ibanCountryCode): bool
    {
        return strlen($iban) === $this->ibanLengthByCountry[$ibanCountryCode];
    }
}
