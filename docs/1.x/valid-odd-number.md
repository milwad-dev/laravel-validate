## ValidOddNumber

If you may to validation odd numbers, you can use `ValidOddNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidOddNumber;

return [
    'number' => ['required', new ValidOddNumber()], // number => 4321
];
```
