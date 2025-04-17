## ValidLandlineNumber

If you want to validate the landline number, you can use the `ValidLandlineNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;

return [
    'landline-number' => ['required', new ValidLandlineNumber()], // landline-number => 09120000000
];
```

Also `ValidLandlineNumber` have the ability to validate landline number with specific country code:

```php
use Milwad\LaravelValidate\Rules\ValidLandlineNumber;
use Milwad\LaravelValidate\Utils\Country;

return [
    'landline-number' => ['required', new ValidLandlineNumber(Country::GERMANY)], // landline-number => 09120000000
];
```

> **Note**  
> If you want to know which country's codes are supported by the `ValidLandlineNumber` Rule, you can search your country
> on this [Countries Landline Number](#support-countries-landline-number) list.

<a name="support-countries-landline-number"></a>
## Support Countries Landline Number

- ✅ IRAN
- ✅ GERMANY

