# Laravel validate
***
Laravel validate is a package for validate faster & easier.
You can validate data easier.

# Requirements
***
- PHP >= 8.0

# Installation
***
```
composer require milwad/laravel-validate
```

# Usage
```
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

return [
    'phone' => ['required', new ValidPhoneNumber()],
];
```

# Rules
| #   | Rule name                  | Usage                                                       |
|-----|----------------------------|-------------------------------------------------------------|
| 1   | ValidBitcoinAddress        | Validate bitcoin address                                    |
| 2   | ValidCapitalCharWithNumber | Validate String for ex (MILWAD-84)                          |
| 3   | ValidDiscordUsername       | Validate username discord for ex (Milwad#2134)              |
| 4   | ValidEmoji                 | Validate emoji for ex (😍)                                  |
| 5   | ValidHashtag               | Validate hashtag for ex (#milwad)                           |
| 6   | ValidIpAddressIPV4         | Validate ip address IPV4                                    |
| 7   | ValidIpAddressIPV6         | Validate ip address IPV6                                    |
| 8   | ValidPhoneNumber           | Validate phone number for ex (09366000000)                  |
| 9   | ValidPort                  | Validate port value for ex (8080)                           |
| 10  | ValidSlug                  | Validate slug for ex (milwad-dev)                           |
| 11  | ValidStrongPassword        | Validate password for ex (Milwad123!)                       |
| 12  | ValidUrl                   | Validate url for ex (https://www.google.com)                |
| 13  | ValidUsername              | Validate username for ex (milwad)                           |
| 14  | ValidUuid                  | Validate uuid for ex (123e4567-e89b-12d3-a456-426655440000) |

# License
* This package is created and modified by <a href="https://github.com/milwad-dev" target="_blank">Milwad Khosravi</a> for Laravel >= 9 and is released under the MIT License.

