<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIban implements Rule
{
    /**
     * Character map
     *
     * @var array|int[]
     */
    private array $characterMap = [
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
        'G' => 16,
        'H' => 17,
        'I' => 18,
        'J' => 19,
        'K' => 20,
        'L' => 21,
        'M' => 22,
        'N' => 23,
        'O' => 24,
        'P' => 25,
        'Q' => 26,
        'R' => 27,
        'S' => 28,
        'T' => 29,
        'U' => 30,
        'V' => 31,
        'W' => 32,
        'X' => 33,
        'Y' => 34,
        'Z' => 35,
    ];

    /**
     * Get country code with length.
     *
     * @var array|int[]
     */
    private array $ibanLengthByCountry = [
        'AD' => 24, // Andorra
        'AE' => 23, // United Arab Emirates
        'AL' => 28, // Albania
        'AO' => 25, // Angola
        'AT' => 20, // Austria
        'AZ' => 28, // Azerbaijan
        'BA' => 20, // Bosnia and Herzegovina
        'BE' => 16, // Belgium
        'BF' => 28, // Burkina Faso
        'BG' => 22, // Bulgaria
        'BH' => 22, // Bahrain
        'BI' => 28, // Burundi
        'BJ' => 28, // Benin
        'BR' => 29, // Brazil
        'BY' => 28, // Belarus
        'CF' => 27, // Central African Republic
        'CG' => 27, // Congo
        'CH' => 21, // Switzerland
        'CI' => 28, // Ivory Coast
        'CM' => 27, // Cameroon
        'CR' => 22, // Costa Rica
        'CV' => 25, // Cape Verde
        'CY' => 28, // Cyprus
        'CZ' => 24, // Czech Republic
        'DE' => 22, // Germany
        'DJ' => 27, // Djibouti
        'DK' => 18, // Denmark
        'DO' => 28, // Dominican Republic
        'DZ' => 26, // Algeria
        'EE' => 20, // Estonia
        'EG' => 29, // Egypt
        'ES' => 24, // Spain
        'FI' => 18, // Finland
        'FO' => 18, // Faroe Islands
        'FR' => 27, // France
        'GA' => 27, // Gabon
        'GB' => 22, // United Kingdom
        'GE' => 22, // Georgia
        'GI' => 23, // Gibraltar
        'GL' => 18, // Greenland
        'GQ' => 27, // Equatorial Guinea
        'GR' => 27, // Greece
        'GT' => 28, // Guatemala
        'GW' => 25, // Guinea-Bissau
        'HN' => 28, // Honduras
        'HR' => 21, // Croatia
        'HU' => 28, // Hungary
        'IE' => 22, // Ireland
        'IL' => 23, // Israel
        'IQ' => 23, // Iraq
        'IR' => 26, // Iran
        'IS' => 26, // Iceland
        'IT' => 27, // Italy
        'JO' => 30, // Jordan
        'KM' => 27, // Comoros
        'KW' => 30, // Kuwait
        'KZ' => 20, // Kazakhstan
        'LB' => 28, // Lebanon
        'LC' => 32, // Saint Lucia
        'LI' => 21, // Liechtenstein
        'LT' => 20, // Lithuania
        'LU' => 20, // Luxembourg
        'LV' => 21, // Latvia
        'LY' => 25, // Libya
        'MA' => 28, // Morocco
        'MC' => 27, // Monaco
        'MD' => 24, // Moldova
        'ME' => 22, // Montenegro
        'MG' => 27, // Madagascar
        'MK' => 19, // North Macedonia
        'ML' => 28, // Mali
        'MN' => 20, // Mongolia
        'MR' => 27, // Mauritania
        'MT' => 31, // Malta
        'MU' => 30, // Mauritius
        'MZ' => 25, // Mozambique
        'NE' => 28, // Niger
        'NI' => 32, // Nicaragua
        'NL' => 18, // Netherlands
        'NO' => 15, // Norway
        'PK' => 24, // Pakistan
        'PL' => 28, // Poland
        'PS' => 29, // Palestine
        'PT' => 25, // Portugal
        'QA' => 29, // Qatar
        'RO' => 24, // Romania
        'RS' => 22, // Serbia
        'RU' => 33, // Russia
        'SA' => 24, // Saudi Arabia
        'SC' => 31, // Seychelles
        'SD' => 18, // Sudan
        'SE' => 24, // Sweden
        'SI' => 19, // Slovenia
        'SK' => 24, // Slovakia
        'SM' => 27, // San Marino
        'SN' => 28, // Senegal
        'SO' => 23, // Somalia
        'ST' => 25, // Sao Tome and Principe
        'SV' => 28, // El Salvador
        'TD' => 27, // Chad
        'TG' => 28, // Togo
        'TL' => 23, // Timor-Leste
        'TN' => 24, // Tunisia
        'TR' => 26, // Turkey
        'UA' => 29, // Ukraine
        'VA' => 22, // Holy See (the)
        'VG' => 24, // Virgin Islands, British
        'XK' => 20, // Kosovo
    ];

    public function __construct(private ?string $country) {}

    /**
     * Check IBAN.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$this->isIbanValid($value)) {
            return false;
        }

        $parsedIban = substr($value, 4) . substr($value, 0, 4);
        $parsedIban = strtr($parsedIban, $this->characterMap);

        return bcmod($parsedIban, '97') === '1';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.iban');
    }

    /**
     * Check iban is valid.
     *
     * @param  string $iban
     * @return bool
     */
    private function isIbanValid(string $iban)
    {
        $countryCode = substr($iban, 0, 2);

        return ! empty($iban)
            || function_exists('bcmod')
            || ctype_alpha(substr($iban, 0, 2))
            || strlen($iban) !== $this->ibanLengthByCountry[$countryCode];
    }
}
