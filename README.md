# Laravel validate
[![Latest Stable Version](http://poser.pugx.org/milwad/laravel-validate/v)](https://packagist.org/packages/milwad/laravel-validate)
[![Total Downloads](http://poser.pugx.org/milwad/laravel-validate/downloads)](https://packagist.org/packages/milwad/laravel-validate)
[![Latest Unstable Version](http://poser.pugx.org/milwad/laravel-validate/v/stable)](https://packagist.org/packages/milwad/laravel-validate)
[![License](http://poser.pugx.org/milwad/laravel-validate/license)](https://packagist.org/packages/milwad/laravel-validate)
[![PHP Version Require](http://poser.pugx.org/milwad/laravel-validate/require/php-7.3)](https://packagist.org/packages/milwad/laravel-validate)

***
Laravel validate is a package for validate faster & easier. <br>
You can validate data easier, Laravel validate have lots of rule class for validation. <br>
This package support localization and you can use for most of the language (if some language didn't support you can merge request for new language)

# Requirements
***
- PHP >= 7.3
- Laravel >= 8.0

# Installation
***
```
composer require milwad/laravel-validate
```

# Usage
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
| 22  | ValidCartNumberIran        | Validate cart number for ex (1234123412341234)                           |
| 23  | ValidBase64                | Validate base64 for ex (bWlsd2Fk)                                        |
| 24  | ValidJwt                   | Validate jwt                                                             |

# License
* This package is created and modified by <a href="https://github.com/milwad-dev" target="_blank">Milwad Khosravi</a> for Laravel upper more than 8 and is released under the MIT License.

# Contributing
This project exists thanks to all the people who contribute. [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md)

# Security
If you've found a bug regarding security please mail [milwad.dev@gmail.com](mailto:milwad.dev@gmail.com) instead of using the issue tracker.