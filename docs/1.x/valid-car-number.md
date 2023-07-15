## ValidCarNumber

If you may to validation car number, you can use `ValidCarNumber` rule:

```php
use Milwad\LaravelValidate\Rules\ValidCarNumber;

return [
    'car-number' => ['required', new ValidCarNumber()], // car-number => KA01AB1234
];
```
