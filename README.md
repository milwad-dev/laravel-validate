# Laravel Validate

<img src="https://banners.beyondco.de/Laravel%20Validate.png?theme=dark&packageManager=composer+require&packageName=milwad%2Flaravel-validate&pattern=circuitBoard&style=style_1&description=Help+to+write+easy+%26+faster+advance+validation+for+Laravel&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="laravel-validate-banner">

[![PHP Version Require](http://poser.pugx.org/milwad/laravel-validate/require/php)](https://packagist.org/packages/milwad/laravel-validate)
[![Latest Stable Version](http://poser.pugx.org/milwad/laravel-validate/v)](https://packagist.org/packages/milwad/laravel-validate)
[![Total Downloads](http://poser.pugx.org/milwad/laravel-validate/downloads)](https://packagist.org/packages/milwad/laravel-validate)
[![License](http://poser.pugx.org/milwad/laravel-validate/license)](https://packagist.org/packages/milwad/laravel-validate)
[![Passed Tests](https://github.com/milwad-dev/laravel-validate/actions/workflows/run-tests.yml/badge.svg)](https://github.com/milwad-dev/laravel-validate/actions/workflows/run-tests.yml)
[![Quality Score](https://img.shields.io/scrutinizer/g/milwad-dev/laravel-validate.svg?style=flat-square)](https://scrutinizer-ci.com/g/milwad-dev/laravel-validate)

***
Laravel validate is a package for validation faster & easier. <br>
You can validate data easier, Laravel validate have lots of rule class for validation. <br>
This package support localization and you can use it for most of the language. <br>
(If some language didn't support, you can <a href="https://github.com/milwad-dev/laravel-validate/pulls">PR</a> for new language)

# Requirements
***
- ```PHP >= 8.0```
- ```Laravel >= 9.0```
- ```Morilog-Jalali >= 3.x```


| GitHub    | L6                 | L7                 | L8                 | L9                 | L10                |
|-----------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.5       | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 1.6       | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: |
| 1.7       | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: |

# Installation
You can install the package with Composer.

```bash
composer require milwad/laravel-validate
```

# Publish
If you want to publish a lang file for a custom validation message you can run this command in the terminal:

```shell
php artisan vendor:publish --tag="validate-lang-{$lang}"
```

You can replace `$lang` with your lang name, for ex:

```shell
php artisan vendor:publish --tag="validate-lang-en"
```

If you don't know about langs name you can go [Support Languages](#support-languages)

# Usage
You can use `Laravel-Validate Rules` very simply. You can use the `new` keyword before the rule name.

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

return [
    'phone' => ['required', new ValidPhoneNumber()],
];
```

# Rules

| #   | Rule name                  | Usage                                                                    |
|-----|----------------------------|--------------------------------------------------------------------------|
| 1   | ValidBitcoinAddress        | Validate bitcoin address for ex (1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY)     |
| 2   | ValidCapitalCharWithNumber | Validate String for ex (MILWAD-84)                                       |
| 3   | ValidDiscordUsername       | Validate username discord for ex (Milwad#2134)                           |
| 4   | ValidHashtag               | Validate hashtag for ex (#milwad)                                        |
| 5   | ValidIpAddressIPV4         | Validate ip address IPV4 for ex (129.144.50.56)                          |
| 6   | ValidIpAddressIPV6         | Validate ip address IPV6 for ex (2001:db8:3333:4444:5555:6666:7777:8888) |
| 7   | ValidPhoneNumber           | Validate phone number for ex (09366000000)                               |
| 8   | ValidPort                  | Validate port value for ex (8080)                                        |
| 9   | ValidSlug                  | Validate slug for ex (milwad-dev)                                        |
| 10  | ValidImei                  | Validate imei phone for ex (354809104295874)                             |
| 11  | ValidStrongPassword        | Validate password for ex (Milwad123!)                                    |
| 12  | ValidUrl                   | Validate url for ex (https://www.google.com)                             |
| 13  | ValidUsername              | Validate username for ex (milwad)                                        |
| 14  | ValidUuid                  | Validate uuid for ex (123e4567-e89b-12d3-a456-426655440000)              |
| 15  | ValidHexColor              | Validate hex color for ex (#fcba03)                                      |
| 16  | ValidHtmlTag               | Validate html tags for ex (``<h1></h1>``)                                |
| 17  | ValidNationalCard          | Validate national card for ex (015016437)                                |
| 18  | ValidCarNumber             | Validate car number for ex (KA01AB1234)                                  |
| 19  | ValidNameDaysWeek          | Validate day week for ex (monday)                                        |
| 20  | ValidEvenNumber            | Validate number is even for ex (1024)                                    |
| 21  | ValidOddNumber             | Validate number is odd for ex (4321)                                     |
| 22  | ValidSlashEndOfString      | Validate write slash at the string for ex (milwad/)                      |
| 23  | ValidCartNumberIran        | Validate cart number for ex (1234123412341234)                           |
| 24  | ValidBase64                | Validate base64 for ex (bWlsd2Fk)                                        |
| 25  | ValidJwt                   | Validate jwt                                                             |
| 26  | ValidJalaliDate            | Validate jajali date for ex (1384/8/25)                                  |
| 27  | ValidDuplicateCharacter    | Validate duplicate characters for ex (1,2,3,4,5,6,7,8,9)                 |
| 28  | ValidPattern               | Validate texts with specific pattern 🔥 for ex (4444-4444-4444)          |
| 29  | ValidDuplicate             | Validate duplicate string, numbers for ex (1123456)                      |
| 30  | ValidUlid                  | Validate ulid for ex (01ARZ3NDEKTSV4RRFFQ69G5FAV)                        |
| 31  | ValidDomain                | Validate domain name for ex (github.com)                                 |
| 32  | ValidCamelCase             | Validate camel case for ex (milwadDev)                                   |
| 33  | ValidPascalCase            | Validate pascal case for ex (MilwadDev)                                  |
| 34  | ValidKebabCase             | Validate kebab case for ex (milwad-dev)                                  |
| 35  | ValidSnakeCase             | Validate snake case for ex (milwad_dev)                                  |
| 36  | ValidVatId                 | Validate european VAT ID ex (EL123456789123)                             |
| 37  | ValidIban                  | Validate IBAN ex (IR062960000000100324200001)                            |
| 38  | ValidIranPostalCode        | Validate Iran postal code ex (3354355599)                |

# Rules

### ValidPattern

Sometimes you need to validate text with a pattern, For example, you want to validate a text like (4444-4444-4444).
If you want to check the length of the text is separate after `-` is 4, You can use this Rule:

```php
use Milwad\LaravelValidate\Rules\ValidPattern;

return [
    'numbers' => ['required', new ValidPattern(4, '-')],
];
```

### ValidIban

Sometimes you need to validate Iban(International Bank Account Number) code. You can use the `ValidIban` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIban;

return [
    'iban' => ['required', new ValidIban()], // iban => SC74MCBL01031234567890123456USD
];
```

Also, You can use the `Country` class and add a list of countries to the `ValidIban` rule. By doing this your IBAN must belong
to one of the countries you pass to the validation class:

```php
use Milwad\LaravelValidate\Rules\ValidIban;
use Milwad\LaravelValidate\Utils\Country;

return [
    'iban' => ['required', new ValidIban(Country::IRAN, Country::SEYCHELLES)], // iban => SC74MCBL01031234567890123456USD
];
```

<a name="support-languages"></a>
# Support Languages

If a language is not supported, you can make <a href="https://github.com/milwad-dev/laravel-validate/issues/new/choose">issue</a> to add it. <br>
Also, you can make <a href="https://github.com/milwad-dev/laravel-validate/pulls">PR</a> to add it.

- [x] Arabic (ar)
- [x] Azerbaijani (az)
- [x] Catalan (ca)
- [x] German (de)
- [x] Greek (el)
- [x] English (en)
- [x] Spanish (es)
- [x] Persian (fa)
- [x] French (fr)
- [x] Hindi (hi)
- [x] Indonesian (id)
- [x] Italian (It)
- [x] Japanese (ja)
- [x] Korean (ko)
- [x] Kurdish Sorani (ku_so)
- [x] Português Brasil (pt_BR)
- [x] Russian (ru)
- [x] Sinhala (si)
- [x] Swedish (sv)
- [x] Turkish (tr)
- [x] Ukrainian (uk)
- [x] Chinese (zh_CN)

# License
* This package is created and modified by <a href="https://github.com/milwad-dev" target="_blank">Milwad Khosravi</a> for Laravel upper more than 9 and is released under the MIT License.

# Contributing
This project exists thanks to all the people who contribute. [CONTRIBUTING](https://github.com/milwad-dev/laravel-validate/graphs/contributors)

<a href="https://github.com/milwad-dev/laravel-validate/graphs/contributors"><img src="https://opencollective.com/laravel-validate/contributors.svg?width=890&button=false" /></a>

# Security
If you've found a bug regarding security please mail [milwad.dev@gmail.com](mailto:milwad.dev@gmail.com) instead of using the issue tracker.

## Star History

[![Star History Chart](https://api.star-history.com/svg?repos=milwad-dev/laravel-validate&type=Date)](https://star-history.com/#milwad-dev/laravel-validate&Date)

