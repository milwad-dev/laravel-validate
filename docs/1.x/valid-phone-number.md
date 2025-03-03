## ValidPhoneNumber

If you want to validate the phone number, you can use the `ValidPhoneNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

return [
    'phone-number' => ['required', new ValidPhoneNumber()], // phone-number => 09120000000
];
```

Also `ValidPhoneNumber` have the ability to validate phone number with specific country code:

```php
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Utils\Country;

return [
    'phone-number' => ['required', new ValidPhoneNumber(Country::GERMANY)], // phone-number => 09120000000
];
```

> **Note**  
> If you want to know which country's codes are supported by the `ValidPhoneNumbers` Rule, you can search your country
> on this [Countries Phone Number](#support-countries-phone-number) list.

<a name="support-countries-phone-number"></a>
## Support Countries Phone Number

- ✅ IRAN
- ✅ ENGLAND
- ✅ NIGER
- ✅ SAUDI_ARABIA
- ✅ GERMANY
- ✅ GREECE
- ✅ SPAIN
- ✅ FRANCE
- ✅ INDIA
- ✅ INDONESIA
- ✅ ITALY
- ✅ JAPAN
- ✅ KOREAN
- ✅ RUSSIA
- ✅ SWEDEN
- ✅ TURKEY
- ✅ CHINA
- ✅ CAMEROON
