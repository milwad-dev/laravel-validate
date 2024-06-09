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
    'phone-country' => [
        'DE' => DEPhoneValidator::class,
        'EN' => ENPhoneValidator::class,
        'ES' => ESPhoneValidator::class,
        'FR' => FRPhoneValidator::class,
        'GR' => GRPhoneValidator::class,
        'ID' => IDPhoneValidator::class,
        'IN' => INPhoneValidator::class,
        'IR' => IRPhoneValidator::class,
        'IT' => ITPhoneValidator::class,
        'JA' => JAPhoneValidator::class,
        'KO' => KOPhoneValidator::class,
        'NE' => NEPhoneValidator::class,
        'RU' => RUPhoneValidator::class,
        'SA' => SAPhoneValidator::class,
        'SE' => SEPhoneValidator::class,
        'TR' => TRPhoneValidator::class,
        'ZH' => ZHPhoneValidator::class,
    ],
];
