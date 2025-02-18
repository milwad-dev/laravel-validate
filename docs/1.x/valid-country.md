## ValidCountry

If you want to validate the country name, you can use the `ValidCountry` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCountry;

return [
    'country' => ['required', new ValidCountry()], // country => United Arab Emirates
];
```

Also, you can validate country name by key like "AE":

```php
use Milwad\LaravelValidate\Rules\ValidCountry;

return [
    'country' => ['required', new ValidCountry(validByKey: true)], // country => "AE"
];
```

For see the list of country name, you can open `config/laravel-validate.php`, and go to `countries` key:

```php
/*
 * The list of country names.
 *
 * If any country name is missing from this list, you can add your country name to this array.
 */
'countries' => [...],
```

> If any country name is missing from this list, you can add your country name to this array.
