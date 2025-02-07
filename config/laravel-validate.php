<?php

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
     * If you want to use rules like 'required|ValidPhone' in your validations, you can change it to true.
     */
    'using_container' => false,
];
