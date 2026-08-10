# Laravel Validate

<img src="https://banners.beyondco.de/Laravel%20Validate.png?theme=dark&packageManager=composer+require&packageName=milwad%2Flaravel-validate&pattern=circuitBoard&style=style_1&description=Help+to+write+easy+%26+faster+advance+validation+for+Laravel&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="laravel-validate-banner">

[![PHP Version Require](https://img.shields.io/packagist/dependency-v/milwad/laravel-validate/php)](https://packagist.org/packages/milwad/laravel-validate)
[![Latest Stable Version](https://img.shields.io/packagist/v/milwad/laravel-validate.svg?style=flat-square)](https://packagist.org/packages/milwad/laravel-validate)
[![Total Downloads](https://img.shields.io/packagist/dt/milwad/laravel-validate.svg?style=flat-square)](https://packagist.org/packages/milwad/laravel-validate)
[![License](https://img.shields.io/packagist/l/milwad/laravel-validate)](https://packagist.org/packages/milwad/laravel-validate)
[![Passed Tests](https://github.com/milwad-dev/laravel-validate/actions/workflows/run-tests.yml/badge.svg)](https://github.com/milwad-dev/laravel-validate/actions/workflows/run-tests.yml)
[![Quality Score](https://img.shields.io/scrutinizer/g/milwad-dev/laravel-validate.svg?style=flat-square)](https://scrutinizer-ci.com/g/milwad-dev/laravel-validate)
[![Check Imports](https://github.com/milwad-dev/laravel-validate/actions/workflows/imports.yml/badge.svg?branch=1.x)](https://github.com/milwad-dev/laravel-validate/actions/workflows/imports.yml)
[![Ask DeepWiki](https://deepwiki.com/badge.svg)](https://deepwiki.com/milwad-dev/laravel-validate)
[![MadeWithLaravel.com shield](https://madewithlaravel.com/storage/repo-shields/4333-shield.svg)](https://madewithlaravel.com/p/laravel-validate/shield-link)

# Introduction

***
The `Laravel-Validate` package enhanced Laravel validation capabilities with custom rules and methods for simplified and efficient validation
logic. <br>
You can validate data more easily. The `Laravel Validate` has lots of rule classes for validation. <br>
This package supports localization and can be used for most languages. <br>
(If some language didn't support, you can create <a href="https://github.com/milwad-dev/laravel-validate/pulls">PR</a> for new language)

[AI Documentation](https://deepwiki.com/milwad-dev/laravel-validate)

# Requirements

***

- ```PHP >= 8.0```
- ```Laravel >= 9.0```

| GitHub | L6                 | L7                 | L8                 | L9                 | L10                | L11                | L12                | L13                |
|--------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.5    | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                | :x:                |
| 1.6    | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                |
| 1.7    | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                |
| 1.8    | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                | :x:                |
| 1.9    | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 2.0    | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: |

# Installation

You can install the package with Composer.

```bash
composer require milwad/laravel-validate
```

# Publish

If you want to publish a config file, you can run the following command on your terminal:

```shell
php artisan vendor:publish --tag="laravel-validate-config"
```

If you want to publish a lang file for a custom validation message, you can run this command in the terminal:

```shell
php artisan vendor:publish --tag="validate-lang-{$lang}"
```

You can replace `$lang` with your language name, for example:

```shell
php artisan vendor:publish --tag="validate-lang-en"
```

You can see the [Support Languages](#support-languages) section if you don't know the language's name.

# Configurations

If you may use rules with a string like `ValidPhone`, you need to change the config option to `true`:

```php
/*
 * If you want to use rules like 'required|ValidPhone' in your validations, you can change it to true.
 */
'using_container' => false,
```

If `using_container` is set to true, you might have rules like this:

```php
'phone_number' => 'required|ValidPhone',
```

And `ValidPhone` would be a class that is resolved via the service container to check the validity of the phone number.

# Usage

You can use `Laravel-Validate Rules` very simply. You can use the `new` keyword before the rule name.

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

return [
    'phone' => ['required', new ValidPhoneNumber()],
];
```

# Rules
| #  | Rule name                                                                                                                        | Usage                                                                 |
|----|----------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------|
| 1  | [ValidBase64](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-base64.md)                                  | Validate base64 for ex (bWlsd2Fk)                                     |
| 2  | [ValidBitcoinAddress](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-bitcoin-address.md)                 | Validate bitcoin address for ex (1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY)  |
| 3  | [ValidCamelCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-camel-case.md)                           | Validate camel case for ex (milwadDev)                                |
| 4  | [ValidCapitalCharWithNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-capital-char-with-number.md) | Validate string for ex (MILWAD-84)                                    |
| 5  | [ValidCarNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-car-number.md)                           | Validate car number for ex (KA01AB1234)                               |
| 6  | [ValidCartNumberIran](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-cart-number-iran.md)                | Validate card number for ex (1234123412341234)                        |
| 7  | [ValidCountry](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-country.md)                                | Validate country name for ex (United Arab Emirates)                   |
| 8  | [ValidCreditCard](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-credit-card.md)                         | Validate credit card for ex (4111111111111111)                        |
| 9  | [ValidDiscordUsername](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-discord-username.md)               | Validate Discord username for ex (Milwad#2134)                        |
| 10 | [ValidDomain](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-domain.md)                                  | Validate domain name for ex (github.com)                              |
| 11 | [ValidDuplicate](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-duplicate.md)                            | Validate duplicate string/number for ex (1123456)                     |
| 12 | [ValidDuplicateCharacter](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-duplicate-character.md)         | Validate duplicate characters for ex (1,2,3,4,5,6,7,8,9)              |
| 13 | [ValidEvenNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-even-number.md)                         | Validate number is even for ex (1024)                                 |
| 14 | [ValidHashtag](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-hashtag.md)                                | Validate hashtag for ex (#milwad)                                     |
| 15 | [ValidHexColor](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-hex-color.md)                             | Validate hex color for ex (#fcba03)                                   |
| 16 | [ValidHtmlTag](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-html-tag.md)                               | Validate HTML tags for ex (<h1></h1>)                                 |
| 17 | [ValidIban](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-iban.md)                                      | Validate IBAN for ex (IR062960000000100324200001)                     |
| 18 | [ValidImei](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-imei.md)                                      | Validate IMEI phone for ex (354809104295874)                          |
| 19 | [ValidIpAddressIPV4](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ip-address-ipv4.md)                  | Validate IPv4 address for ex (129.144.50.56)                          |
| 20 | [ValidIpAddressIPV6](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ip-address-ipv6.md)                  | Validate IPv6 address for ex (2001:db8:3333:4444:5555:6666:7777:8888) |
| 21 | [ValidIranPostalCode](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-iran-postal-code.md)                | Validate Iran postal code for ex (3354355599)                         |
| 22 | [ValidJalaliDate](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-jalali-date.md)                         | Validate Jalali date for ex (1384/8/25)                               |
| 23 | [ValidJwt](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-jwt.md)                                        | Validate JWT token                                                    |
| 24 | [ValidKebabCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-kebab-case.md)                           | Validate kebab case for ex (milwad-dev)                               |
| 25 | [ValidLandlineNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-landline-number.md)                 | Validate landline number                                              |
| 26 | [ValidLatitude](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-latitude.md)                              | Validate latitude for ex (50.1109)                                    |
| 27 | [ValidLongitude](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-longitude.md)                            | Validate longitude for ex (51.377225156511855)                        |
| 28 | [ValidNameDaysWeek](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-name-days-week.md)                    | Validate day of week (monday)                                         |
| 29 | [ValidNationalCard](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-national-card.md)                     | Validate national card for ex (015016437)                             |
| 30 | [ValidNoHtml](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-no-html.md)                                 | Validate string without HTML                                          |
| 31 | [ValidOddNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-odd-number.md)                           | Validate number is odd for ex (4321)                                  |
| 32 | [ValidPascalCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-pascal-case.md)                         | Validate PascalCase for ex (MilwadDev)                                |
| 33 | [ValidPattern](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-pattern.md)                                | Validate custom pattern                                               |
| 34 | [ValidPhoneNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-phone-number.md)                       | Validate phone number for ex (09366000000)                            |
| 35 | [ValidPort](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-port.md)                                      | Validate port value for ex (8080)                                     |
| 36 | [ValidSlashEndOfString](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-slash-end-of-string.md)           | Validate string ending with slash (milwad/)                           |
| 37 | [ValidSlug](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-slug.md)                                      | Validate slug for ex (milwad-dev)                                     |
| 38 | [ValidSnakeCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-snake-case.md)                           | Validate snake_case for ex (milwad_dev)                               |
| 39 | [ValidStrongPassword](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-strong-password.md)                 | Validate password for ex (Milwad123!)                                 |
| 40 | [ValidUlid](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ulid.md)                                      | Validate ULID                                                         |
| 41 | [ValidUrl](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-url.md)                                        | Validate URL for ex (https://www.google.com)                          |
| 42 | [ValidUsername](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-username.md)                              | Validate username for ex (milwad)                                     |
| 43 | [ValidUuid](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-uuid.md)                                      | Validate UUID for ex (123e4567-e89b-12d3-a456-426655440000)           |
| 44 | [ValidVatId](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-vatid.md)                                    | Validate VAT ID (EU format)                                           |

<a name="support-languages"></a>

# Support Languages

If a language is not supported, you can make <a href="https://github.com/milwad-dev/laravel-validate/issues/new/choose">issue</a> to add it. <br>
Also, you can make <a href="https://github.com/milwad-dev/laravel-validate/pulls">PR</a> to add it.

- [x] Arabic (ar)
- [x] Azerbaijani (az)
- [x] Bangla (bn)
- [x] Catalan (ca)
- [x] Dutch (nl)
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

# Adding Custom Phone Country Validator

If you need to add a custom phone number validator for a specific country, follow the steps below.

### 1. Create Your Custom Validator Class

First, you need to create a custom validator class that implements the `Milwad\LaravelValidate\Utils\CountryPhoneValidator` contract. This contract
ensures that your custom validator adheres to the required structure and functionality.

```php
namespace App\Validators;

use Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class CustomPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate the phone number for the custom country.
     */
    public function validate(string $phoneNumber): bool
    {
        // Implement the phone number validation logic for your country
        // Example: Check if the phone number matches a specific pattern
        return preg_match('/^\+1234\d{10}$/', $phoneNumber);
    }
}
```

### 2. Add the Validator to the Configuration File

Once you've created the custom validator class, add it to the configuration file (`config/laravel-validate.php`) under the `'phone-country'` array.

For example, if you're adding a validator for the country `XY`:

```php
'phone-country' => [
    // Existing validators...
    'XY' => \App\Validators\CustomPhoneValidator::class, // Custom country
],
```

This tells the system to use your custom validator for phone numbers from country `XY`.

### 3. Validation Usage

Once your custom validator is set up, you can use it in your application like any other validator:

```php
return [
    'phone_ir' => [new ValidPhoneNumber('XY')],
];
```

# License

* This package is created and modified by <a href="https://github.com/milwad-dev" target="_blank">Milwad Khosravi</a> for Laravel over more than 9 and
  has been released under the MIT License.

# Contributing

This project exists thanks to all the people who contribute. [CONTRIBUTING](https://github.com/milwad-dev/laravel-validate/graphs/contributors)

<a href="https://github.com/milwad-dev/laravel-validate/graphs/contributors"><img src="https://opencollective.com/laravel-validate/contributors.svg?width=890&button=false" /></a>

# Security

If you've found a security bug, please email [milwad.dev@gmail.com](mailto:milwad.dev@gmail.com) instead of using the issue tracker.

# Star History

[![Star History Chart](https://star-history.dera.page/svg?repos=milwad-dev/laravel-validate&type=Date)](https://star-history.dera.page/#milwad-dev/laravel-validate&Date)

# Donate

If this package is helpful for you, you can buy a coffee for me :) ❤️

- Iraninan Gateway: https://daramet.com/milwad_khosravi
- Paypal Gateway: SOON
- MetaMask Wallet: `0xf208a562c5a93DEf8450b656c3dbc1d0a53BDE58`
