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

**Laravel Validate** adds 45+ ready-to-use validation rules to Laravel: phone and landline numbers per country, IBAN, credit cards, crypto addresses, slugs, case styles, JWTs, ULIDs, strong passwords and more. Every rule ships with translated error messages in 25 languages.

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Milwad\LaravelValidate\Utils\Country;

$request->validate([
    'phone'    => ['required', new ValidPhoneNumber(Country::GERMANY)],
    'password' => ['required', new ValidStrongPassword()],
]);
```

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Available Rules](#available-rules)
- [Configuration](#configuration)
  - [String-based rules (`using_container`)](#string-based-rules-using_container)
  - [Custom phone & landline validators](#custom-phone--landline-validators)
  - [Singular & plural rules](#singular--plural-rules)
- [Localization](#localization)
- [Related Packages](#related-packages)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)
- [Support the Project](#support-the-project)

## Requirements

- PHP **8.2** or higher
- Laravel **11**, **12** or **13**
- PHP extensions: `bcmath`, `ctype`

Older Laravel versions are supported by older releases:

| Version | L6                 | L7                 | L8                 | L9                 | L10                | L11                | L12                | L13                |
|---------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.5     | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                | :x:                |
| 1.6     | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                |
| 1.7     | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :x:                | :x:                | :x:                |
| 1.8     | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                | :x:                |
| 1.9     | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 2.0     | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: |

## Installation

Install the package with Composer:

```bash
composer require milwad/laravel-validate
```

The service provider is registered automatically through Laravel package discovery.

Optionally, publish the config file:

```bash
php artisan vendor:publish --tag="laravel-validate-config"
```

## Usage

Every rule is a plain Laravel rule object. Create it with `new` and add it to your rules array, in a controller, a Form Request or `Validator::make()`:

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Rules\ValidSlug;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'slug'  => ['required', new ValidSlug()],
            'phone' => ['nullable', new ValidPhoneNumber()],
        ];
    }
}
```

Some rules take arguments, for example a country code for phone and landline numbers or a locale for singular/plural words:

```php
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;
use Milwad\LaravelValidate\Rules\ValidPlural;
use Milwad\LaravelValidate\Utils\Country;

return [
    'office_phone' => [new ValidLandlineNumber(Country::IRAN)],
    'collection'   => [new ValidPlural('en')],
];
```

Click any rule in the table below to see its full documentation and options.

## Available Rules

| #  | Rule name                                                                                                                        | Usage                                                                 |
|----|----------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------|
| 1  | [ValidBase64](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-base64.md)                                  | Validate base64 for ex (bWlsd2Fk)                                     |
| 2  | [ValidBitcoinAddress](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-bitcoin-address.md)                 | Validate bitcoin address for ex (1KFHE7w8BhaENAswwryaoccDb6qcT6DbYY)  |
| 3  | [ValidCamelCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-camel-case.md)                           | Validate camel case for ex (milwadDev)                                |
| 4  | [ValidCapitalCharWithNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-capital-char-with-number.md) | Validate string for ex (MILWAD-84)                                    |
| 5  | [ValidCarNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-car-number.md)                           | Validate car number for ex (KA01AB1234)                               |
| 6  | [ValidCartNumberIran](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-cart-number-iran.md)                | Validate card number for ex (1234123412341234)                        |
| 7  | [ValidCountry](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-country.md)                                | Validate country name for ex (United Arab Emirates)                   |
| 8  | [ValidCountryCode](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-country-code.md)                       | Validate ISO 3166-1 country code for ex (US or USA)                   |
| 9  | [ValidCreditCard](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-credit-card.md)                         | Validate credit card for ex (4111111111111111)                        |
| 10 | [ValidDiscordUsername](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-discord-username.md)               | Validate Discord username for ex (Milwad#2134)                        |
| 11 | [ValidDomain](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-domain.md)                                  | Validate domain name for ex (github.com)                              |
| 12 | [ValidDuplicate](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-duplicate.md)                            | Validate duplicate string/number for ex (1123456)                     |
| 13 | [ValidDuplicateCharacter](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-duplicate-character.md)         | Validate duplicate characters for ex (1,2,3,4,5,6,7,8,9)              |
| 14 | [ValidEthereumAddress](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ethereum-address.md)               | Validate Ethereum address with EIP-55 checksum for ex (0x5aAeb6053F3E94C9b9A09f33669435E7Ef1BeAed) |
| 15 | [ValidEvenNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-even-number.md)                         | Validate number is even for ex (1024)                                 |
| 16 | [ValidHashtag](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-hashtag.md)                                | Validate hashtag for ex (#milwad)                                     |
| 17 | [ValidHexColor](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-hex-color.md)                             | Validate hex color for ex (#fcba03)                                   |
| 18 | [ValidHtmlTag](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-html-tag.md)                               | Validate HTML tags for ex (<h1></h1>)                                 |
| 19 | [ValidIban](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-iban.md)                                      | Validate IBAN for ex (IR062960000000100324200001)                     |
| 20 | [ValidImei](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-imei.md)                                      | Validate IMEI phone for ex (354809104295874)                          |
| 21 | [ValidIpAddressIPV4](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ip-address-ipv4.md)                  | Validate IPv4 address for ex (129.144.50.56)                          |
| 22 | [ValidIpAddressIPV6](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ip-address-ipv6.md)                  | Validate IPv6 address for ex (2001:db8:3333:4444:5555:6666:7777:8888) |
| 23 | [ValidIranPostalCode](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-iran-postal-code.md)                | Validate Iran postal code for ex (3354355599)                         |
| 24 | [ValidJalaliDate](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-jalali-date.md)                         | Validate Jalali date for ex (1384/8/25)                               |
| 25 | [ValidJwt](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-jwt.md)                                        | Validate JWT token                                                    |
| 26 | [ValidKebabCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-kebab-case.md)                           | Validate kebab case for ex (milwad-dev)                               |
| 27 | [ValidLandlineNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-landline-number.md)                 | Validate landline number                                              |
| 28 | [ValidLatitude](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-latitude.md)                              | Validate latitude for ex (50.1109)                                    |
| 29 | [ValidLongitude](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-longitude.md)                            | Validate longitude for ex (51.377225156511855)                        |
| 30 | [ValidNameDaysWeek](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-name-days-week.md)                    | Validate day of week (monday)                                         |
| 31 | [ValidNationalCard](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-national-card.md)                     | Validate national card for ex (015016437)                             |
| 32 | [ValidNoHtml](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-no-html.md)                                 | Validate string without HTML                                          |
| 33 | [ValidOddNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-odd-number.md)                           | Validate number is odd for ex (4321)                                  |
| 34 | [ValidPascalCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-pascal-case.md)                         | Validate PascalCase for ex (MilwadDev)                                |
| 35 | [ValidPattern](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-pattern.md)                                | Validate custom pattern                                               |
| 36 | [ValidPhoneNumber](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-phone-number.md)                       | Validate phone number for ex (09366000000)                            |
| 37 | [ValidPlural](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-plural.md)                                  | Validate plural word for ex (cameras)                                 |
| 38 | [ValidPort](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-port.md)                                      | Validate port value for ex (8080)                                     |
| 39 | [ValidSingular](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-singular.md)                              | Validate singular word for ex (camera)                                |
| 40 | [ValidSlashEndOfString](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-slash-end-of-string.md)           | Validate string ending with slash (milwad/)                           |
| 41 | [ValidSlug](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-slug.md)                                      | Validate slug for ex (milwad-dev)                                     |
| 42 | [ValidSnakeCase](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-snake-case.md)                           | Validate snake_case for ex (milwad_dev)                               |
| 43 | [ValidStrongPassword](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-strong-password.md)                 | Validate password for ex (Milwad123!)                                 |
| 44 | [ValidUlid](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-ulid.md)                                      | Validate ULID                                                         |
| 45 | [ValidUrl](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-url.md)                                        | Validate URL for ex (https://www.google.com)                          |
| 46 | [ValidUsername](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-username.md)                              | Validate username for ex (milwad)                                     |
| 47 | [ValidUuid](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-uuid.md)                                      | Validate UUID for ex (123e4567-e89b-12d3-a456-426655440000)           |
| 48 | [ValidVatId](https://github.com/milwad-dev/laravel-validate/blob/1.x/docs/1.x/valid-vatid.md)                                    | Validate VAT ID (EU format)                                           |

## Configuration

After publishing, the config file lives at `config/laravel-validate.php`.

### String-based rules (`using_container`)

By default, rules are used as objects. If you prefer Laravel's string syntax, enable `using_container`:

```php
'using_container' => true,
```

Every rule is then registered under its class name, so you can write:

```php
'phone_number' => 'required|ValidPhoneNumber',
```

### Custom phone & landline validators

`ValidPhoneNumber` and `ValidLandlineNumber` accept a country code. The built-in codes are listed under `phone-country` and `landline-country` in the config file. You can add your own country, or replace an existing one.

**1. Create a validator class** that implements the matching interface:

```php
namespace App\Validators;

use Milwad\LaravelValidate\Utils\CountryPhoneValidator\CountryPhoneValidator;

class XYPhoneValidator implements CountryPhoneValidator
{
    public function validate($value): bool
    {
        return (bool) preg_match('/^\+1234\d{10}$/', $value);
    }
}
```

For landline numbers, implement `Milwad\LaravelValidate\Utils\CountryLandlineValidator\CountryLandlineValidator` instead.

**2. Register it** in `config/laravel-validate.php`:

```php
'phone-country' => [
    // Existing validators...
    'XY' => \App\Validators\XYPhoneValidator::class,
],
```

**3. Use it:**

```php
return [
    'phone' => [new ValidPhoneNumber('XY')],
];
```

### Singular & plural rules

`ValidSingular` and `ValidPlural` use the locale passed to the rule. If you pass none, they use `grammatical-number-locale` from the config, and if that is `null`, your app's `app.locale`.

Most languages are checked with [`doctrine/inflector`](https://github.com/doctrine/inflector). German needs an extra package:

```bash
composer require cijic/phpmorphy
```

To support another language, add a class that implements `Milwad\LaravelValidate\Utils\GrammaticalNumber\GrammaticalNumberChecker` to the `grammatical-number` config array.

<a name="support-languages"></a>

## Localization

Error messages are translated into these languages:

| Language            | Code    | Language            | Code    |
|---------------------|---------|---------------------|---------|
| Arabic              | `ar`    | Japanese            | `ja`    |
| Azerbaijani         | `az`    | Korean              | `ko`    |
| Bangla              | `bn`    | Kurdish (Sorani)    | `ku_so` |
| Catalan             | `ca`    | Macedonian          | `mk`    |
| Chinese             | `zh_CN` | Persian             | `fa`    |
| Dutch               | `nl`    | Portuguese (Brazil) | `pt_BR` |
| English             | `en`    | Russian             | `ru`    |
| French              | `fr`    | Sinhala             | `si`    |
| German              | `de`    | Spanish             | `es`    |
| Greek               | `el`    | Swedish             | `sv`    |
| Hindi               | `hi`    | Turkish             | `tr`    |
| Indonesian          | `id`    | Ukrainian           | `uk`    |
| Italian             | `It`    |                     |         |

To customize the messages, publish the language file into your app's `lang` directory:

```bash
php artisan vendor:publish --tag="validate-lang-en"
```

Replace `en` with any code from the table above.

Is your language missing? [Open an issue](https://github.com/milwad-dev/laravel-validate/issues/new/choose) or send a [pull request](https://github.com/milwad-dev/laravel-validate/pulls) that adds it.

## Related Packages

- [Laravel Validate Filament](https://github.com/milwad-dev/laravel-validate-filament): brings these rules to Filament forms as chainable field methods.

## Contributing

Contributions are welcome: new rules, country validators, translations and bug fixes. Run the test suite before you open a pull request:

```bash
composer test
```

This project exists thanks to all the people who [contribute](https://github.com/milwad-dev/laravel-validate/graphs/contributors).

<a href="https://github.com/milwad-dev/laravel-validate/graphs/contributors"><img src="https://opencollective.com/laravel-validate/contributors.svg?width=890&button=false" alt="Contributors" /></a>

## Security

If you find a security issue, please email [milwad.dev@gmail.com](mailto:milwad.dev@gmail.com) instead of using the issue tracker.

## License

Laravel Validate is created by [Milwad Khosravi](https://github.com/milwad-dev) and released under the [MIT License](LICENSE).

## Star History

[![Star History Chart](https://star-history.dera.page/svg?repos=milwad-dev/laravel-validate&type=Date)](https://star-history.dera.page/#milwad-dev/laravel-validate&Date)

## Support the Project

If this package helps you, you can buy me a coffee ❤️

- Iranian gateway: https://daramet.com/milwad_khosravi
- MetaMask wallet: `0xf208a562c5a93DEf8450b656c3dbc1d0a53BDE58`
