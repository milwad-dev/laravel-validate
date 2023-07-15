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
> on this [Countries Phone Number](#support-countries) list.

<a name="support-countries"></a>

## Support Countries Phone Number

✅ IRAN <br>
✅ ENGLAND <br>
✅ NIGER <br>
✅ SAUDI_ARABIA <br>
✅ GERMANY <br>
✅ GREECE <br>
✅ SPAIN <br>
✅ FRANCE <br>
✅ INDIA <br>
✅ INDONESIA <br>
✅ ITALY <br>
✅ JAPAN <br>
✅ KOREAN <br>
✅ RUSSIA <br>
✅ SWEDEN <br>
✅ TURKEY <br>
✅ CHINA <br>
