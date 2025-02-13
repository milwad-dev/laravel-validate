## ValidOddNumber

If you want to validate the odd numbers, you can use the `ValidOddNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidOddNumber;

return [
    'number' => ['required', new ValidOddNumber()], // number => 4321
];
```

> Consider installing the `gmp` extension to significantly enhance performance when working with large numbers. It can greatly optimize your calculations and improve efficiency.
