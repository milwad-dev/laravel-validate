## ValidEvenNumber

If you want to validate even numbers, you can use the `ValidEvenNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidEvenNumber;

return [
    'number' => ['required', new ValidEvenNumber()], // number => 1024
];
```

> Consider installing the `gmp` extension to significantly enhance performance when working with large numbers. It can greatly optimize your calculations and improve efficiency.
