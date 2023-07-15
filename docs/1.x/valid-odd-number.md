## ValidOddNumber

If you want to validate odd numbers, you can use `ValidOddNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidOddNumber;

return [
    'number' => ['required', new ValidOddNumber()], // number => 4321
];
```
