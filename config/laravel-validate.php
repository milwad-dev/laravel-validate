<?php

use Milwad\LaravelValidate\Utils\CountryLandlineValidator\CMLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\DELandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\ENLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\ESLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\FRLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\GRLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\IDLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\INLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\IRLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\ITLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\JALandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\KOLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\NELandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\RULandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\SALandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\SELandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\TRLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryLandlineValidator\ZHLandlineValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\CMPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\DEPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\ENPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\ESPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\FRPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\GRPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\IDPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\INPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\IRPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\ITPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\JAPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\KOPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\NEPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\RUPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\SAPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\SEPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\TRPhoneValidator;
use Milwad\LaravelValidate\Utils\CountryPhoneValidator\ZHPhoneValidator;

return [
    /*
     * Mapping of country codes to their respective phone number validator classes.
     * Each validator enforces country-specific phone number formatting and validation rules.
     *
     * You can add custom country phone validator.
     */
    'phone-country' => [
        'CM' => CMPhoneValidator::class, // Cameroon
        'DE' => DEPhoneValidator::class, // Germany
        'EN' => ENPhoneValidator::class, // England
        'ES' => ESPhoneValidator::class, // Spain
        'FR' => FRPhoneValidator::class, // France
        'GR' => GRPhoneValidator::class, // Greece
        'ID' => IDPhoneValidator::class, // Indonesia
        'IN' => INPhoneValidator::class, // India
        'IR' => IRPhoneValidator::class, // Iran
        'IT' => ITPhoneValidator::class, // Italy
        'JA' => JAPhoneValidator::class, // Japan
        'KO' => KOPhoneValidator::class, // South Korea
        'NE' => NEPhoneValidator::class, // Netherlands
        'RU' => RUPhoneValidator::class, // Russia
        'SA' => SAPhoneValidator::class, // Saudi Arabia
        'SE' => SEPhoneValidator::class, // Sweden
        'TR' => TRPhoneValidator::class, // Turkey
        'ZH' => ZHPhoneValidator::class, // China
    ],

    /*
     * Mapping of country codes to their respective landline number validator classes.
     * Each validator enforces country-specific landline number formatting and validation rules.
     *
     * You can add custom country landline validator.
     */
    'landline-country' => [
        'CM' => CMLandlineValidator::class, // Cameroon
        'DE' => DELandlineValidator::class, // Germany
        'EN' => ENLandlineValidator::class, // England
        'ES' => ESLandlineValidator::class, // Spain
        'FR' => FRLandlineValidator::class, // France
        'GR' => GRLandlineValidator::class, // Greece
        'ID' => IDLandlineValidator::class, // Indonesia
        'IN' => INLandlineValidator::class, // India
        'IR' => IRLandlineValidator::class, // Iran
        'IT' => ITLandlineValidator::class, // Italy
        'JA' => JALandlineValidator::class, // Japan
        'KO' => KOLandlineValidator::class, // South Korea
        'NE' => NELandlineValidator::class, // Netherlands
        'RU' => RULandlineValidator::class, // Russia
        'SA' => SALandlineValidator::class, // Saudi Arabia
        'SE' => SELandlineValidator::class, // Sweden
        'TR' => TRLandlineValidator::class, // Turkey
        'ZH' => ZHLandlineValidator::class, // China
    ],

    /*
     * If you want to use rules like 'required|ValidPhone' in your validations, you can change it to true.
     */
    'using_container' => false,

    /*
     * The list of country names.
     *
     * If any country name is missing from this list, you can add your country name to this array.
     */
    'countries' => [
        'AF' => 'Afghanistan',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BR' => 'Brazil',
        'BN' => 'Brunei',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CR' => 'Costa Rica',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GR' => 'Greece',
        'GD' => 'Grenada',
        'GT' => 'Guatemala',
        'GN' => 'Guinea',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HN' => 'Honduras',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KR' => 'South Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Laos',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LY' => 'Libya',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MG' => 'Madagascar',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MX' => 'Mexico',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PA' => 'Panama',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'QA' => 'Qatar',
        'RO' => 'Romania',
        'RU' => 'Russia',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'ZA' => 'South Africa',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syria',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TH' => 'Thailand',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    ],
];
