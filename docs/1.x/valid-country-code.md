## ValidCountryCode

If you want to validate an [ISO 3166-1](https://en.wikipedia.org/wiki/ISO_3166-1) country code, you can use the `ValidCountryCode` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCountryCode;

return [
    'country' => ['required', new ValidCountryCode()], // country => US
];
```

By default, the rule accepts alpha-2 codes (`US`, `NL`, `IR`). To validate alpha-3 codes (`USA`, `NLD`, `IRN`), pass the format:

```php
return [
    'country' => ['required', new ValidCountryCode(ValidCountryCode::ALPHA3)], // country => USA
];
```

The check is case-insensitive, so `us` and `US` both pass. Only the 249 officially assigned ISO 3166-1 codes are accepted. User-assigned codes such as `XK` (Kosovo) and reserved codes such as `UK` and `EU` are rejected.

With `using_container` enabled, you can use the string form:

```php
return [
    'country' => 'required|ValidCountryCode',        // alpha-2
    'country_iso3' => 'required|ValidCountryCode:alpha3', // alpha-3
];
```

> **Note**
> To validate a country *name* such as `United Arab Emirates`, use [`ValidCountry`](valid-country.md).
