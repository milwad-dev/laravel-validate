## ValidOddNumber

If you want to validate the odd numbers, you can use the `ValidOddNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidOddNumber;

return [
    'number' => ['required', new ValidOddNumber()], // number => 4321
];
```
