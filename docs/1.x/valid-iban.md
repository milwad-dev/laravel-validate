## ValidIban

Sometimes you need to validate Iban(International Bank Account Number) code. You can use the `ValidIban` rule:

```php
use Milwad\LaravelValidate\Rules\ValidIban;

return [
    'iban' => ['required', new ValidIban()], // iban => SC74MCBL01031234567890123456USD
];
```

Also, You can use the `Country` class and add a list of countries to the `ValidIban` rule. By doing this your IBAN must belong
to one of the countries you pass to the validation class:

```php
use Milwad\LaravelValidate\Rules\ValidIban;
use Milwad\LaravelValidate\Utils\Country;

return [
    'iban' => ['required', new ValidIban(Country::IRAN, Country::SEYCHELLES)], // iban => SC74MCBL01031234567890123456USD
];
```
