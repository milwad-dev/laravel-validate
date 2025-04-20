## ValidLandlineNumber

If you want to validate the landline number, you can use the `ValidLandlineNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;

return [
    'landline-number' => ['required', new ValidLandlineNumber()], // landline-number => +98212223343
];
```

Also, `ValidLandlineNumber` can validate landline numbers with a specific country code:

```php
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;
use Milwad\LaravelValidate\Utils\Country;

return [
    'landline-number' => ['required', new ValidLandlineNumber(Country::GERMANY)], // landline-number => +49301234567
];
```

> **Note**  
> If you want to know which country's codes are supported by the `ValidLandlineNumber` Rule, you can search your country
> on this [Countries Landline Number](#support-countries-landline-number) list.

<a name="support-countries-landline-number"></a>
## Support Countries Landline Number

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
